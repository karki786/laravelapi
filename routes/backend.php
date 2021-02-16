<?php

use Illuminate\Support\Facades\Route;

        Route::get('banner', 'Backend\BannerController@index');
        Route::get('banner/create', 'Backend\BannerController@create');
        Route::post('banner/store', 'Backend\BannerController@store');
        Route::get('banner/edit/{id}', 'Backend\BannerController@edit');
        Route::put('banner/update/{id}', 'Backend\BannerController@update');
        Route::get('banner/delete/{id}', 'Backend\BannerController@delete');