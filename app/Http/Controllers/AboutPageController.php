<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\AboutPagePhoto;
use App\Models\Lang;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index() {
        $about = AboutPage::find(1);
        $languages = Lang::all();

        return view('app.about.index', compact([
            'languages',
            'about'
        ]));
    }

//    public function store(Request $request) {
//        $request->validate([
//            'desc1.ru' => 'required',
//            'desc2.ru' => 'required',
//            'desc3.ru' => 'required',
//            'done1.ru' => 'required',
//            'done2.ru' => 'required',
//            'done3.ru' => 'required',
//            'done1_text.ru' => 'required',
//            'done2_text.ru' => 'required',
//            'done3_text.ru' => 'required',
//        ]);
//
//        $about = new AboutPage();
//
//        $about->desc1 = $request->desc1;
//        $about->desc2 = $request->desc2;
//        $about->desc3 = $request->desc3;
//        $about->done1 = $request->done1;
//        $about->done2 = $request->done2;
//        $about->done3 = $request->done3;
//        $about->done1_text = $request->done1_text;
//        $about->done2_text = $request->done2_text;
//        $about->done3_text = $request->done3_text;
//
//        if(isset($request->video)) {
//            $path = $request->file('video')->store('upload/videos', 'public');
//            $about->video = $path;
//        }
//
//        if (isset($request->images_hidden)) {
//
//            foreach ($request->images_hidden as $item) {
//
//                $image = new AboutPagePhoto();
//
//                $image->img = $item;
//                $image->about_id = $about->id;
//
//                $image->save();
//            }
//        }
//
//        $about->save();
//
//        return redirect()->route('about.index')->with(['message' => 'Successfully added!']);
//    }

    public function update(Request $request, $id) {
        $request->validate([
            'desc1.ru' => 'required',
            'desc2.ru' => 'required',
            'desc3.ru' => 'required',
            'done1.ru' => 'required',
            'done2.ru' => 'required',
            'done3.ru' => 'required',
            'done1_text.ru' => 'required',
            'done2_text.ru' => 'required',
            'done3_text.ru' => 'required',
        ]);

        $about = AboutPage::find($id);

        $about->desc1 = $request->desc1;
        $about->desc2 = $request->desc2;
        $about->desc3 = $request->desc3;
        $about->done1 = $request->done1;
        $about->done2 = $request->done2;
        $about->done3 = $request->done3;
        $about->done1_text = $request->done1_text;
        $about->done2_text = $request->done2_text;
        $about->done3_text = $request->done3_text;

        if(isset($request->video)) {
            $path = $request->file('video')->store('upload/videos', 'public');
            $about->video = $path;
        }

        $about->save();

        if (isset($request->images_hidden)) {

            foreach ($request->images_hidden as $item) {

                $image = new AboutPagePhoto();

                $image->img = $item;

                $image->save();
            }
        }

        return redirect()->route('about.index')->with(['message' => 'Successfully updated!']);

    }
}
