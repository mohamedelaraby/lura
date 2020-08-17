<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
/**
 *  Number of pagintaion records loads
 *  @param integer PAGINATION_COUNT
 */
define('PAGINATION_COUNT',10);

Route::group(['namespace' => 'Manage\Admin', 'middleware' => 'guest:admin'], function () {

    // Admin Authuntication
    Route::get('login', 'AdminController@index')->name('admin.get_login');
    Route::post('login', 'AdminController@login')->name('admin.login');
});


Route::group(['namespace' => 'Manage\Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

    ##########################[ Begin Language routes ]########################

    Route::group(['prefix' => 'language','namespace' =>'Language'], function(){

        Route::get('/','LanguageController@index')->name('admin.languages');
        Route::get('create','LanguageController@create')->name('admin.languages.create');
        Route::post('store','LanguageController@store')->name('admin.languages.store');

    });

    ##########################[ End Language routes ]#########################
});




//  Translation
Route::get('locale/{locale}','TransController@locale');
