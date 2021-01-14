<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'IndexController@index');
Route::get('/artikel', 'ArtikelController@index')->name('artikel');
Route::get('/artikel/{artikel:slug}', 'ArtikelController@show');
Route::get('/artikel/karesidenan/{karesidenan:nama}', 'ArtikelController@show_karesidenan');
Route::get('/artikel/kota/{kota:nama}', 'ArtikelController@show_kota');
Route::get('/artikel/kategori/{kategori:nama}', 'ArtikelController@show_kategori');


Route::get('/karesidenan', 'ArtikelController@karesidenan')->name('karesidenan');

Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact/store', 'ContactController@store');

Route::get('/about', 'AboutController@index')->name('about');
Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/medsos', 'MedsosController@admin');
    Route::get('/medsos/{medsos:id}/edit', 'MedsosController@edit');
    Route::patch('/medsos/{medsos:id}/edit', 'MedsosController@update');

    Route::get('/dashboard/artikel', 'ArtikelController@admin')->name('admin_artikel');
    Route::get('/dashboard/artikel/create', 'ArtikelController@create')->name('new_artikel');
    Route::get('/dashboard/artikel/create/{id}', 'ArtikelController@getKota');
    Route::post('/dashboard/artikel/upload', 'ArtikelController@upload')->name('ckeditor.image-upload');
    Route::post('/dashboard/artikel/store', 'ArtikelController@store');
    Route::delete('/dashboard/artikel/{artikel:id}/delete', 'ArtikelController@destroy');
    Route::get('/dashboard/artikel/{artikel:id}/edit', 'ArtikelController@edit');
    Route::patch('/dashboard/artikel/{artikel:id}/edit', 'ArtikelController@update');

    Route::get('/message', 'ContactController@admin');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/pengguna', 'PenggunaController@index')->name('pengguna');
});
Auth::routes();
