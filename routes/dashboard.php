<?php

use Illuminate\Support\Facades\Route;

// routes dashbord
Route::group(['prefix' => 'admin'],function (){
   Route::get('login','DashbordController@login')->name('admin.login');
   Route::post('post/login','DashbordController@postLogin')->name('admin.post.login');
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::group(['prefix' => 'admin','middleware' => 'auth:admin'],function (){
            Route::get('dashbord','DashbordController@dashbord')->name('admin.dashbord');
            Route::post('logout','DashbordController@logout')->name('admin.logout');

            // slider
            Route::resource('sliders','SliderController');

            // about
            Route::resource('about','AboutController');

            // category
            Route::resource('categories','CategoryController');

            // product
            Route::resource('products','ProductController');

            // works
            Route::resource('works','WorkController');

            // works
            Route::resource('news','NewsController');

            // works
            Route::resource('video','VideoController');

            // contacts
            Route::resource('contacts','ContactController');

             // message
            Route::resource('message','MessageController');

             // setting
             Route::resource('settings','SettingController');


        });
    });

?>
