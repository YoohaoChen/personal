<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {return view('home');});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/image/{name}', 'AssetController@getImage');
Route::resource('photo', 'PhotoController');

Route::get('/contact', function () {return view('contact');})->name('contact');
Route::post('/contact', 'HomeController@contact');

Route::get('/about', function () {return view('about');})->name('about');

Route::get('/photography', function() {return view('photography');})->name('photography');
//Route::get('/show', 'Test\HelloController@show');

Route::get('/program', function() {return view('program');})->name('program');

Route::get('/music', function() {return view('music');})->name('music');

Route::group(['namespace' => 'Test', 'prefix' => 'test'], function () {
    Route::get('/show', 'HelloController@show');
    Route::post('/editortest', 'HelloController@editor');

    Route::get('/test', function () {
        $article = file_get_contents('/home/yoohao/Desktop/aa.html');
        return view('test.test', ['article' => $article]);
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {return view('admin.index');});
    Route::get('/index', function () {return view('admin.index');});

    Route::get('/album', function () {
        $data = DB::table('albums')->get();
//        return response()->json($data);
        return view('admin.album', ['albums' => $data]);});
    Route::post('/albumupdate', 'PostController@albumUpdate');
    Route::post('/album', 'PostController@album');

    //　获取到相册列表
    Route::get('/albumslist', function () {
        $data = DB::table('albums')->get();
        return response()->json($data);
    });
    // 图集
    Route::get('/photos', function () {
        return view('admin.photos');
    });
    Route::post('/photos', 'PostController@getPhotos');

    // 文章
    Route::get('/articles', function () {
        $articles = DB::table('articles')/*->leftJoin('article_tags', 'articles.id', '=', 'article_tags.article_id')*/->get();
        return view('admin.article', ['articles' => $articles]);
    });
    Route::get('/newarticle', function () {
        $modules = DB::table('modules')->get();
        return view('admin.newarticle', ['modules' => $modules]);
    });
    Route::post('/newarticle', 'PostController@newArticle');
    Route::get('/updatearticle/{id}', function ($id) {
        $article = DB::table('articles')->where('id', '=', $id)->get();
        if (isset($article[0]->id)) {
            $modules = DB::table('modules')->get();
            return view('admin.updatearticle', ['modules' => $modules, 'article' => $article]);
        }
        return response(404);
    });
    Route::post('/updatearticle', 'PostController@updateArticle');

    Route::post('/editorupload', 'PostController@editorUpload');

    // 模块
    Route::get('/newmodule', function () {return view('admin.newmodule');});
    Route::post('/newmodule', 'PostController@newModule');
    Route::get('/modulelist', function () {return view('admin.modulelist');});
});

Auth::routes();
