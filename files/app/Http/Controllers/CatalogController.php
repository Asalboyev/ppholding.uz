<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Lang;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalog = Catalog::paginate(10);
        return view('app.catalog.index', compact([
            'catalog',
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
        return view('app.catalog.create', compact([
            'languages',
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
            'title.ru' => 'required|max:255',
            'desc.ru' => 'required',
            'img' => 'required'
        ]);

        $catalog = new Catalog;

        $catalog->title = $request->title;
        $catalog->desc = $request->desc;

        if(isset($request->img)) {
            $path = $request->file('img')->store('upload/images', 'public');
            $catalog->img = $path;
        }

        $catalog->save();

        return redirect()->route('catalog.index')->with(['message' => 'Successfully added!']);
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
        $languages = Lang::all();
        $catalog = Catalog::find($id);
        return view('app.catalog.edit', compact([
            'catalog',
            'languages'
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
        $request->validate([
            'title.ru' => 'required|max:255',
            'desc.ru' => 'required'
        ]);

        $catalog = Catalog::find($id);

        $catalog->title = $request->title;
        $catalog->desc = $request->desc;

        if(isset($request->img)) {
            $path = $request->file('img')->store('upload/images', 'public');
            $catalog->img = $path;
        }

        $catalog->save();

        return redirect()->route('catalog.index')->with(['message' => 'Successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Catalog::find($id)->delete();

        return redirect()->route('catalog.index')->with(['message' => 'Successfully deleted!']);
    }
}
