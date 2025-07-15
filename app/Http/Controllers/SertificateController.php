<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Sertificate;
use Illuminate\Http\Request;

class SertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sertificates = Sertificate::orderBy('id', 'desc')->paginate(10);
        return view('app.sertificates.index', compact([
            'sertificates'
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
        return view('app.sertificates.create', compact([
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

        $sertificate = new Sertificate;

        $sertificate->desc = $request->desc;
        if(isset($request->img)) {
            $path = $request->file('img')->store('upload/images', 'public');
            $sertificate->img = $path;
        }

        $sertificate->save();

        return redirect()->route('sertificates.index')->with(['message' => 'Successfully added!']);
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
        $sertificate = Sertificate::find($id);
        $languages = Lang::all();
        return view('app.sertificates.edit', compact([
            'languages',
            'sertificate'
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

        $sertificate = Sertificate::find($id);

        $sertificate->desc = $request->desc;
        if(isset($request->img)) {
            $path = $request->file('img')->store('upload/images', 'public');
            $sertificate->img = $path;
        }

        $sertificate->save();

        return redirect()->route('sertificates.index')->with(['message' => 'Successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sertificate::find($id)->delete();

        return redirect()->route('sertificates.index')->with(['message' => 'Successfully deleted!']);
    }
}
