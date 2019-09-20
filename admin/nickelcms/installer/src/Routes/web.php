<?php

// dd(config('installer.file'));
// Controllers within the "\NickelCms\Installer\Controllers" namespace
Route::group(['namespace' => '\NickelCms\Installer\Controllers'], function() {

    //Get '/' after checking if CMS installed.
    Route::get('/',['uses'=>'loadSiteController@index'])->name('home');

    //Get installer but check if not already installed.
    Route::get('/installer',['uses' => 'InstallationController@index'])->name('cms.installer');

});
