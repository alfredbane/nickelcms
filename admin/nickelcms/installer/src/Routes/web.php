<?php


// Controllers within the "\NickelCms\Installer\Controllers" namespace
Route::group(['namespace' => '\NickelCms\Installer\Controllers'], function() {

   //Get '/' after checking if CMS installed.
    Route::get('/',['uses'=>'loadSiteController@index'])->name('home');

    Route::group(['middleware' => ['web']], function() {

      //Get installer but check if not already installed.
      Route::get('/installer',['uses' => 'InstallationController@index'])->name('cms.installer');

      // Check if system has thlaravel redirect to url dependencies.
      Route::get('/requirements', ['uses' => 'RequirementCheckController@requirements'])->name('cms.requirements');

      // Check if system has the dependencies.
      Route::get('/filepermissions', ['uses' => 'FilepermissionController@permissions'])->name('cms.permissions');

      // Prepare system environment.
      Route::get('/environment', ['uses' => 'EnvironmentCheckController@index'])->name('cms.environment');

      // Prepare system environment.
      Route::post('/updatedetails', ['uses' => 'EnvironmentCheckController@update'])->name('cms.environment.update');

      // Create first user .
      Route::get('/createauser', ['uses' => 'CreateNewUserController@index'])->name('cms.environment.createuser');

      // Store first user .
      Route::post('/storeuser', ['uses' => 'CreateNewUserController@store'])->name('cms.environment.storeuser');

      // Finish installation.
      Route::get('/finalsetup', ['uses' => 'FinnishInstallationController@index'])->name('cms.finalizeinstall');

    });
});
