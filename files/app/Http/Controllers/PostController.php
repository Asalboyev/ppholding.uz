<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('app.news.index', compact([
            'posts'
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
        return view('app.news.create', compact([
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
            'title.ru' => 'required',
            'desc.ru' => 'required',
            'img' => 'required'
        ]);

        $post = new Post;

        $post->title = $request->title;
        $post->desc = $request->desc;

        if(isset($request->img)) {
            $path = $request->file('img')->store('upload/images', 'public');
            $post->img = $path;
        }

        $post->save();

        return redirect()->route('news.index')->with(['message' => 'Successfully added!']);
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
        $post = Post::find($id);
        $languages = Lang::all();
        return view('app.news.edit', compact([
            'post',
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
            'title.ru' => 'required',
            'desc.ru' => 'required'
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->desc = $request->desc;

        if(isset($request->img)) {
            $path = $request->file('img')->store('upload/images', 'public');
            $post->img = $path;
        }

        $post->save();

        return redirect()->route('news.index')->with(['message' => 'Successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route('news.index')->with(['message' => 'Successfully deleted!']);
    }
}
