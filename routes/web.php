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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
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
    Route::get('about', [\App\Http\Controllers\AboutPageController::class, 'index'])->name('about.index');
//    Route::post('about/store', [\App\Http\Controllers\AboutPageController::class, 'store'])->name('about.store');
    Route::post('about/update/{id}', [\App\Http\Controllers\AboutPageController::class, 'update'])->name('about.update');
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

//Переключение языков
Route::get('setlocale/{lang}', function ($lang) {
    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {

        unset($segments[1]); //удаляем метку
    }

    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    if ($lang != App\Http\Middleware\LocaleMiddleware::$mainLanguage){
        array_splice($segments, 1, 0, $lang);
    }

    //формируем полный URL
    $url = Request::root().implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('setlocale');
