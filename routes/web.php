<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addMessageController;
use App\Http\Controllers\FinalprodController;
use App\Http\Controllers\CatprodController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\HomepageController;



Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::get('/','HomepageController@index')->name('homepage');

    Route::get('abouts', 'HomepageController@about');
    Route::get('category', 'HomepageController@category');
    Route::get('category/{slug}','HomepageController@viewcategory');
    Route::get('category/{cate_slug}/{prod_slug}','HomepageController@productview')->name('productview');
    Route::get('work','HomepageController@work')->name('work');
    Route::get('work/{slug}','HomepageController@viewwork')->name('viewwork');
    Route::get('new','HomepageController@newss')->name('new');
    Route::get('new/{slug}','HomepageController@viewnewss')->name('viewnew');
    Route::get('video','HomepageController@video')->name('video');
    Route::get('contact','HomepageController@contact')->name('contact');
    Route::post('/','MessageController@store')->name('store');


});



