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

Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {

    // Admin Authuntication
    Route::get('login', 'AdminController@index')->name('admin.get_login');
    Route::post('login', 'AdminController@login')->name('admin.login');
});


Route::group(['namespace' => 'Admin'], function () {
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

    ##########################[ Begin Language routes ]########################

    Route::group(['prefix' => 'language'], function(){

        Route::get('/','LanguageController@index')->name('admin.languages');
        Route::get('create','LanguageController@create')->name('admin.languages.create');
        Route::post('store','LanguageController@store')->name('admin.languages.store');
        Route::get('edit/{id}','LanguageController@edit')->name('admin.languages.edit');
        Route::post('update/{id}','LanguageController@update')->name('admin.languages.update');
        Route::get('delete/{id}','LanguageController@delete')->name('admin.languages.delete');

    });
    ##########################[ End Language routes ]#########################


    ##########################[ Begin Main Category routes ]########################

    Route::group(['prefix' => 'maincategory'], function(){

        Route::get('/','MainCategoryController@index')->name('admin.maincategory');
        Route::get('create','MainCategoryController@create')->name('admin.maincategory.create');
        Route::post('store','MainCategoryController@store')->name('admin.maincategory.store');
        Route::get('edit/{id}','MainCategoryController@edit')->name('admin.maincategory.edit');
        Route::post('update/{id}','MainCategoryController@update')->name('admin.maincategory.update');
        Route::get('delete/{id}','MainCategoryController@delete')->name('admin.maincategory.delete');

    });

    ##########################[ End Main Category routes ]#########################
});




//  Translation
Route::get('locale/{locale}','TransController@locale');
