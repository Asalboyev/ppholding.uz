<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\TranslationsController;
use App\Http\Controllers\LangsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SertificateController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale(), 'middleware' => 'locale'], function(){
    Route::get('/', [WebController::class, 'index'])->name('index');
    Route::get('/about', [WebController::class, 'about'])->name('about');
    Route::get('/catalog', [WebController::class, 'catalog'])->name('catalog');
    Route::get('/catalog/{id}', [WebController::class, 'catalogInner'])->name('catalog-inner');
    Route::get('/catalog/capsules/{type}', [WebController::class, 'catalogCapsules'])->name('catalog-capsules');
    Route::get('/catalog/{id}/all', [WebController::class, 'catalogAll'])->name('catalog-all');
    Route::get('/gallery', [WebController::class, 'gallery'])->name('gallery');
    Route::get('/news', [WebController::class, 'news'])->name('news');
    Route::get('/post/{id}', [WebController::class, 'post'])->name('post');
    Route::get('/product/{id}', [WebController::class, 'product'])->name('product');
    Route::get('/contacts', [WebController::class, 'contacts'])->name('contacts');
    Route::get('/career', [WebController::class, 'career'])->name('career');
    Route::get('/location', [WebController::class, 'location'])->name('location');
    Route::post('/applications', [WebController::class, 'applications'])->name('application');
});

Route::post('upload-image', [WebController::class, 'uploadImage'])->name('upload-image');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('catalog', CatalogController::class);
    Route::resource('applications', ApplicationsController::class);
    Route::resource('translations', TranslationsController::class);
    Route::post('/translations/search', [TranslationsController::class, 'search'])->name('translation.search');
    Route::resource('langs', LangsController::class);
    Route::resource('products', ProductController::class);
    Route::post('/file/upload', [HomeController::class, 'file_upload'])->name('file_upload');
    Route::resource('sertificates', SertificateController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('photos', PhotoController::class);
    Route::resource('news', PostController::class);

    Route::get('about', [AboutPageController::class, 'index'])->name('about.index');
    Route::post('about/update/{id}', [AboutPageController::class, 'update'])->name('about.update');
});

Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('admin');

// Language switching
Route::get('setlocale/{lang}', function ($lang) {
    $referer = Redirect::back()->getTargetUrl();
    $parse_url = parse_url($referer, PHP_URL_PATH);
    $segments = explode('/', $parse_url);

    if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {
        unset($segments[1]);
    }

    if ($lang != App\Http\Middleware\LocaleMiddleware::$mainLanguage){
        array_splice($segments, 1, 0, $lang);
    }

    $url = Request::root() . implode("/", $segments);

    if(parse_url($referer, PHP_URL_QUERY)){
        $url .= '?' . parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url);
})->name('setlocale');
