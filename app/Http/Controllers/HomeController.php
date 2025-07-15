<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function file_upload(Request $request) {
        if ($request->ajax()) {

            $file = $request->file('file');
            $avatar = uniqid().".".$file->getClientOriginalExtension();
            $file->move(public_path().'/images',$avatar);
            $img_types = ['png', 'jpg', 'jpeg'];
            return response()->json([
                'file_type' => in_array($file->getClientOriginalExtension(), $img_types) ? 'img' : 'file',
                'file_name' => $avatar,
            ]);
        }
    }
}
