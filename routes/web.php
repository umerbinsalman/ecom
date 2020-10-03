<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register.index');
Route::post('/register','Auth\RegisterController@register')->name('register');
Route::get('/login','Auth\LoginController@showLoginForm')->name('login.index');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth']],function(){

    Route::get('dashboard',function(){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/tag','TagController@index')->name('tag.index');
    Route::post('/tag','TagController@store')->name('tag.store');
    Route::get('/tag/list','TagController@list')->name('tag.list');
    Route::get('/tag/data','TagController@data')->name('tag.data');
    Route::get('/tag/{id}','TagController@editIndex')->name('tag.edit.index');
    Route::post('/tag/{id}','TagController@update')->name('tag.update');

    Route::get('/category','CategoryController@index')->name('category.index');
    Route::post('/category','CategoryController@store')->name('category.store');
    Route::get('/category/list','CategoryController@list')->name('category.list');
    Route::get('/category/data','CategoryController@data')->name('category.data');
    Route::get('/category/{id}','CategoryController@editIndex')->name('category.edit.index');
    Route::post('/category/{id}','CategoryController@update')->name('category.update');


    Route::get('/product/list','ProductController@list')->name('product.list');
    Route::get('/product/data','ProductController@data')->name('product.data');
    Route::get('/product/{id}','ProductController@editIndex')->name('product.edit.index');
    Route::post('/product/{id}','ProductController@update')->name('product.update');
    Route::get('/product','ProductController@index')->name('product.index')->middleware('umer');
    Route::post('/product','ProductController@store')->name('product.store')->middleware('umer');
});


