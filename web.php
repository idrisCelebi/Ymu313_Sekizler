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

Route::get('/index', 'HomeGetController@get_index_yonlendir');
Route::get('/', 'HomeGetController@get_index');
Route::get('/iletisim', 'HomeGetController@get_iletisim');
Route::get('/hakkimizda', 'HomeGetController@get_hakkimizda');
Route::get('/blog', 'HomeGetController@get_blog');
Route::get('/blog/blog-detay', 'HomeGetController@get_blog_detay');

Route::group(['prefix'=> 'admin'],function (){
    Route::get('/','AdminGetController@get_index');
    Route::get('/ayarlar','AdminGetController@get_ayarlar');
    Route::post('/ayarlar','AdminPostController@post_ayarlar');
    Route::get('/hakkimizda','AdminGetController@get_hakkimizda');
    Route::post('/hakkimizda','AdminPostController@post_hakkimizda');
    Route::get('/blog','AdminGetController@get_blog');
});





