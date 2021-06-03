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


Route::group(['middleware' => ['web']], function () {
    
    Route::get('header', 'Controller@header');
    Route::get('home', 'Controller@home');
    Route::get('footer', 'Controller@footer');
    
    
    Route::get('services', 'Controller@services');    
    Route::get('careers', 'Controller@careers');
    Route::get('contact', 'Controller@contact');
    

    Route::post('sendMessage', 'Controller@sendMessage');
    
    
    
});
