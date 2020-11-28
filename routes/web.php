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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//管理者
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        // adminログイン（get post)
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
    });

    //ログアウト(get)
    Route::middleware('auth:admin')->group(function () {
        Route::get('logout', 'LoginController@logout')->name('logout');
    //管理者top(get)
        Route::get('', 'IndexController@index')->name('top');
    });    

    // ユーザ管理は管理者(admin)のみ実行できる。
    Route::middleware('auth:admin')->prefix('user')->group(function () {
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('/create', 'UserController@store');
        Route::get('/{id}/delete', 'UserController@delete')->name('user.delete');
        Route::post('/{id}/delete', 'UserController@destroy');
    });

    // 入居者管理は管理者(admin)のみ実行できる。
    Route::middleware('auth:admin')->prefix('residents')->group(function () {
        Route::get('/', 'ResidentsController@index')->name('residents.index');
        Route::get('/create', 'ResidentsController@create')->name('residents.create');
        Route::post('/create', 'ResidentsController@store');
        Route::get('/{id}/show', 'ResidentsController@show')->name('residents.show');
        Route::get('/{id}/edit', 'ResidentsController@edit')->name('residents.edit');
        Route::post('/{id}/edit', 'ResidentsController@update');
    });

    //ADL管理
    Route::middleware('auth:admin')->prefix('adl')->group(function () {
        Route::get('/{id}/edit', 'AdlController@edit')->name('adl.edit');
        Route::post('/{id}/edit', 'AdlController@update')->name('adl.update');
    });
});

// 投稿管理
Route::prefix('post')->group(function () {
    Route::get('/', 'PostController@index')->name('post.index');
    Route::post('/', 'PostController@search')->name('post.search');
    Route::get('/{id}/show', 'PostController@show')->name('post.show');
    Route::get('/create', 'PostController@create')->name('post.create');
    Route::post('/create', 'PostController@store')->name('post.store');
    Route::get('/{id}/edit', 'PostController@edit')->name('post.edit');
    Route::post('/{id}/edit', 'PostController@update')->name('post.update');
    Route::get('/{id}/delete', 'PostController@delete')->name('post.delete');
    Route::delete('/{post}', 'PostController@destroy');
// 確認管理
    Route::get('/{id}/check', 'CheckController@check')->name('post.check');
    Route::post('/{id}/check', 'CheckController@unCheck')->name('post.uncheck');

});

// 検索
