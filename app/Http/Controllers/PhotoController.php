<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('id', 'desc')->paginate(10);
        return view('app.photos.index', compact([
            'photos'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Lang::all();
        return view('app.photos.create', compact([
            'languages'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required'
        ]);

        $photos = new Photo;

        $photos->desc = $request->desc;
        if(isset($request->img)) {
            $path = $request->file('img')->store('upload/images', 'public');
            $photos->img = $path;
        }

        $photos->save();

        return redirect()->route('photos.index')->with(['message' => 'Successfully added!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::find($id);
        $languages = Lang::all();
        return view('app.photos.edit', compact([
            'languages',
            'photo'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);

        $photo->desc = $request->desc;
        if(isset($request->img)) {
            $path = $request->file('img')->store('upload/images', 'public');
            $photo->img = $path;
        }

        $photo->save();

        return redirect()->route('photos.index')->with(['message' => 'Successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Photo::find($id)->delete();

        return redirect()->route('photos.index')->with(['message' => 'Successfully deleted!']);
    }
}
