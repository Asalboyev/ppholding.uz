<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::orderBy('id', 'desc')->paginate(10);
        return view('app.partners.index', compact([
            'partners'
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
        return view('app.partners.create', compact([
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

        $partner = new Partner;

        $partner->desc = $request->desc;
        if(isset($request->img)) {
            $path = $request->file('img')->store('upload/images', 'public');
            $partner->img = $path;
        }

        $partner->save();

        return redirect()->route('partners.index')->with(['message' => 'Successfully added!']);
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
        $partner = Partner::find($id);
        $languages = Lang::all();
        return view('app.partners.edit', compact([
            'languages',
            'partner'
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
        $partner = Partner::find($id);

        $partner->desc = $request->desc;
        if(isset($request->img)) {
            $path = $request->file('img')->store('upload/images', 'public');
            $partner->img = $path;
        }

        $partner->save();

        return redirect()->route('partners.index')->with(['message' => 'Successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Partner::find($id)->delete();

        return redirect()->route('partners.index')->with(['message' => 'Successfully deleted!']);
    }
}
