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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'WebController@welcome')->name('welcome');
Route::get('/catalogue', 'WebController@catalogue')->name('catalogue');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/comment', 'WebController@comment')->name('comment.create');

Route::prefix('home')->group(function() {
    Route::post('tag/create', 'TagController@create')->name('tag.create');
    Route::post('tag/update', 'TagController@update')->name('tag.update');
    Route::post('tag/delete{id}', 'TagController@delete')->name('tag.delete');

    Route::post('product/create', 'ProductController@create')->name('product.create');
    Route::post('product/delete{id}', 'ProductController@delete')->name('product.delete');
    Route::post('product/update{id}', 'ProductController@update')->name('product.update');
    Route::get('product/show={id}', 'ProductController@show')->name('product.show');
    Route::get('product/image/delete/{id}','ProductController@deleteFile')->name('image.delete');
});