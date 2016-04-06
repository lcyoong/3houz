<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


// Route model binding
Route::model('user', 'App\User');
Route::model('property', 'App\Property');
Route::model('property_picture', 'App\Picture');

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/', 'SearchController@index');
    Route::post('/search', 'SearchController@search');
    Route::get('/search', 'SearchController@search');
    Route::get('/property_detail/{property}', 'SearchController@propertyDetail');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/login/{provider}', 'Auth\AuthController@getSocialAuth');
    Route::get('/login/callback/{provider}', 'Auth\AuthController@getSocialAuthCallback');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/password/edit', 'Auth\PasswordController@edit');
        Route::post('/password/edit', 'Auth\PasswordController@update');

        Route::get('/home', 'HomeController@index');
        Route::get('/dashboard', 'HomeController@index');

        Route::get('/user/edit', 'UserController@editOwn');
        Route::post('/user/edit', 'UserController@update');

        Route::group(['middleware' => 'permission:manage-users'], function () {
            Route::get('/user', 'UserController@index');
            Route::post('/user/search', 'UserController@search');
            Route::get('/user/{user}/edit', 'UserController@edit');
        });

        Route::get('/property', 'PropertyController@index');
        Route::get('/myproperty', 'PropertyController@listOwn');
        Route::post('/property/search', 'PropertyController@search');
        Route::get('/property/create', 'PropertyController@create');
        Route::post('/property/create', 'PropertyController@store');
        Route::get('/property/{property}/edit', 'PropertyController@edit');
        Route::post('/property/edit', 'PropertyController@update');
        Route::get('/property/{property}/delete', 'PropertyController@delete');
        Route::post('/property/delete', 'PropertyController@destroy');

        Route::get('/property/{property}/images', 'PropertyPictureController@create');
        Route::post('/property/pictures', 'PropertyPictureController@store');
        Route::get('/property/pictures/{property_picture}/edit', 'PropertyPictureController@edit');
        Route::post('/property/pictures/edit', 'PropertyPictureController@update');
        Route::post('/property/pictures/{property_picture}/delete', 'PropertyPictureController@destroy');


    });

    Route::get('property-pic/{image}', function ($image) {

        //do so other checks here if you wish
        if (!File::exists($image=storage_path("app/property/pictures/{$image}"))) {
            abort(404);
        }

        return Image::make($image)->response(); //will ensure a jpg is always returned
    });

});
