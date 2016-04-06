<?php

Route::group(array('middleware' => 'auth'), function() {
    Route::group(array('prefix' => config('lcgallery.prefix')), function() {
        Route::get('gallery/list/{id?}', ['middleware'=>'acl:gallery','uses'=>'LcgalleryController@listGallery']);
        Route::get( 'gallery/add/{id?}', ['middleware'=>'acl:gallery','uses'=>'LcgalleryController@addGallery']);
        Route::post('gallery/add', ['middleware'=>'acl:gallery','uses'=>'LcgalleryController@storeGallery']);
        Route::get('gallery/edit/{id?}', ['middleware'=>'acl:gallery','uses'=>'LcgalleryController@editGallery']);
        Route::post('gallery/edit', ['middleware'=>'acl:gallery','uses'=>'LcgalleryController@storeGallery']);

        Route::get('gallery/pic/list/{id?}', ['middleware'=>'acl:gallery','uses'=>'LcgalleryController@listPictures']);
        Route::get('gallery/pic/add/{id}', ['middleware'=>'acl:gallery','uses'=>'LcgalleryController@addPicture']);
        Route::post('gallery/pic/add', ['middleware'=>'acl:gallery','uses'=>'LcgalleryController@upload']);
        Route::get('gallery/pic/edit/{id}', ['middleware'=>'acl:gallery','uses'=>'LcgalleryController@editPicture']);
        Route::post('gallery/pic/edit', ['middleware'=>'acl:gallery','uses'=>'LcgalleryController@storePicture']);
        Route::get('gallery/pic/remove/{id}', ['middleware'=>'acl:gallery','uses'=>'LcgalleryController@unstorePicture']);
    });
});

Route::get('gallery-image/{gal}/{image}', function($gal, $image){

    //do so other checks here if you wish
    if(!File::exists( $image=storage_path("app/images/gallery/{$gal}/{$image}") )) abort(404);

    return Image::make($image)->response('jpg'); //will ensure a jpg is always returned
});
