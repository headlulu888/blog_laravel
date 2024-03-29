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

/**
 * Главная
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Регистрация
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Страница блога
 */
Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function() {
    Route::resource('posts', 'PostController')->names('blog.posts');
});

/**
 * Страница Админ/категории
 */
Route::group(['namespace' => 'Blog\Admin', 'prefix' => 'admin/blog'], function() {
    // BlogCategory
    $methods = ['index', 'edit', 'update', 'create', 'store'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.admin.categories');
    // BlogPost
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('blog.admin.posts');
});

// Коллекция
Route::group(['prefix' => 'digging_deeper',], function () {
    Route::get('collections', 'DiggingDeeperController@collections')
        ->name('digging_deeper.collections');
});

//Route::resource('rest', 'RestTestController')->names('restTest');