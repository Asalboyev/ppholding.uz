<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\AboutPagePhoto;
use App\Models\Application;
use App\Models\Catalog;
use App\Models\Lang;
use App\Models\Partner;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Product;
use App\Models\Sertificate;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function index() {
        $partners = Partner::orderBy('id', 'desc')->get();
        $catalog = Catalog::orderBy('id', 'desc')->get();
        $catalog_for_footer = Catalog::take(5)->get();
        $langs = Lang::all();
        $translations = Translation::all();
        $lang = \App::getLocale();
        return view('welcome', compact([
            'langs',
            'translations',
            'lang',
            'catalog',
            'partners',
            'catalog_for_footer',
        ]));
    }

    public function about() {
        $langs = Lang::all();
        $translations = Translation::all();
        $lang = \App::getLocale();
        $about = AboutPage::find(1);
        $gallery1 = AboutPagePhoto::orderBy('id', 'desc')->take(4)->get();
        $gallery2 = AboutPagePhoto::orderBy('id', 'desc')->skip(4)->take(4)->get();
        $sertificates = Sertificate::orderBy('id', 'desc')->get();
        $catalog_for_footer = Catalog::take(5)->get();
        return view('about', compact([
            'langs',
            'translations',
            'lang',
            'sertificates',
            'catalog_for_footer',
            'about',
            'gallery1',
            'gallery2'
        ]));
    }

    public function catalog() {
        $catalog = Catalog::orderBy('id', 'desc')->get();
        $langs = Lang::all();
        $translations = Translation::all();
        $lang = \App::getLocale();
        $catalog_for_footer = Catalog::take(5)->get();
        return view('catalog', compact([
            'langs',
            'translations',
            'lang',
            'catalog_for_footer',
            'catalog'
        ]));
    }

    public function catalogInner($id) {
        $catalog_for_footer = Catalog::take(5)->get();
        $catalog = Catalog::findOrFail($id);
        $all = Catalog::orderBy('id', 'desc')->get()->except($id);
        $langs = Lang::all();

        // productlarni order bo‘yicha saralash
        $products = Product::where('catalog_id', $catalog->id)
            ->orderBy('order', 'asc')
            ->paginate(9);

        $translations = Translation::all();
        $lang = \App::getLocale();
        $products_count = count($catalog->products) >= 9 ? 9 : count($catalog->products);

        return view('catalog-inner', compact([
            'langs',
            'translations',
            'lang',
            'catalog',
            'all',
            'products',
            'products_count',
            'catalog_for_footer',
        ]));
    }

    public function catalogAll($id) {
        $catalog_for_footer = Catalog::take(5)->get();
        $catalog = Catalog::find($id);
        $all = Catalog::orderBy('id', 'desc')->get()->except($id);
        $langs = Lang::all();
        $translations = Translation::all();
        $lang = \App::getLocale();
        return view('catalog-all', compact([
            'langs',
            'translations',
            'lang',
            'catalog',
            'all',
            'catalog_for_footer',
        ]));
    }

    public function gallery() {
        $catalog_for_footer = Catalog::take(5)->get();
        $photos = Photo::all();
        $langs = Lang::all();
        $translations = Translation::all();
        $lang = \App::getLocale();
        return view('gallery', compact([
            'photos',
            'catalog_for_footer',
            'langs',
            'translations',
            'lang',
        ]));
    }

    public function news() {
        $catalog_for_footer = Catalog::take(5)->get();
        $langs = Lang::all();
        $translations = Translation::all();
        $lang = \App::getLocale();
        $news = Post::orderBy('id', 'desc')->paginate(12);
        return view('news', compact([
            'langs',
            'translations',
            'lang',
            'news',
            'catalog_for_footer',
        ]));
    }

    public function post($id) {
        $catalog_for_footer = Catalog::take(5)->get();
        $other = Post::orderBy('id', 'desc')->take(3)->get()->except($id);
        $langs = Lang::all();
        $translations = Translation::all();
        $lang = \App::getLocale();
        $post = Post::find($id);
        return view('post', compact([
            'langs',
            'translations',
            'lang',
            'post',
            'other',
            'catalog_for_footer',
        ]));
    }

    public function product($id) {
        $catalog_for_footer = Catalog::take(5)->get();
        $langs = Lang::all();
        $translations = Translation::all();
        $lang = \App::getLocale();
        $product = Product::find($id);
        $other = Product::all()->except($id);
        return view('product', compact([
            'langs',
            'translations',
            'lang',
            'product',
            'other',
            'catalog_for_footer',
        ]));
    }

    public function contacts() {
        $langs = Lang::all();
        $translations = Translation::all();
        $lang = \App::getLocale();
        $catalog_for_footer = Catalog::take(5)->get();
        return view('contacts', compact([
            'langs',
            'translations',
            'lang',
            'catalog_for_footer',
        ]));
    }

    public function career() {
        $langs = Lang::all();
        $translations = Translation::all();
        $lang = \App::getLocale();
        $catalog_for_footer = Catalog::take(5)->get();
        return view('career', compact([
            'langs',
            'translations',
            'lang',
            'catalog_for_footer',
        ]));
    }

    public function location() {
        $langs = Lang::all();
        $translations = Translation::all();
        $lang = \App::getLocale();
        $catalog_for_footer = Catalog::take(5)->get();
        return view('location', compact([
            'langs',
            'translations',
            'lang',
            'catalog_for_footer',
        ]));
    }

    public function applications(Request $request) {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|max:255',
            'name' => 'required|max:255'
        ]);

        if($validator->fails()) {
            return back()->with(['message' => 'Error! All fields are not filled!']);
        }

        $application = new Application;

        $application->name = $request->name;
        $application->email = $request->email;
        $application->phone_number = $request->phone_number;

        if(isset($request->cv)) {
            $path = $request->file('cv')->store('upload/CV', 'public');
            $application->cv = $path;
        }

        $application->save();

        if (isset($application->cv)) {
            Mail::send('mail', [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'cv' => asset($application->cv)
            ], function($message) {
                $message->to('licko37225021@gmail.com', 'to text')->subject('Запрос с сайта PPh');
                $message->from('shohijahonaxmetov@gmail.com', 'Сайт PPh');
            });
        } else {
            Mail::send('mail', [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number
            ], function($message) {
                $message->to('licko37225021@gmail.com', 'to text')->subject('Запрос с сайта PPh');
                $message->from('shohijahonaxmetov@gmail.com', 'Сайт PPh');
            });
        }



        return back()->with(['message' => 'Application has been sent!']);
    }

    public function uploadImage(Request $request) {
        if ($request->hasFile('upload')) {
            $fileName = time().'.'.$request->file('upload')->getClientOriginalExtension();

            $request->file('upload')->move(public_path('uploads'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/'.$fileName);
            $msg = 'Image upload successfully!';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
