<?php

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

Route::group([ 'namespace'=> 'Manage\Admin', 'middleware'=>'guest:admin'], function () {

    Route::get('/','AdminController@dashboard');

    // Admin Authuntication
    Route::get('login','LoginController@index');
});



