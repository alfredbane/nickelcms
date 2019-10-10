<?php


// Controllers within the "\NickelCms\Installer\Controllers" namespace
Route::group(['namespace' => '\NickelCms\Installer\Controllers'], function() {

   //Get '/' after checking if CMS installed.
    Route::get('/',['uses'=>'loadSiteController@index'])->name('home');

    Route::group(['middleware' => ['web']], function() {
      //Get installer but check if not already installed.
      Route::get('/installer',['uses' => 'InstallationController@index'])->name('cms.installer');

      // Check if system has the dependencies.
      Route::get('/requirements', ['uses' => 'RequirementCheckController@requirements'])->name('cms.requirements');

      // Check if system has the dependencies.
      Route::get('/filepermissions', ['uses' => 'FilepermissionController@permissions'])->name('cms.permissions');

      // Prepare system environment.
      Route::get('/environment', ['uses' => 'EnvironmentCheckController@index'])->name('cms.environment');

      // Prepare system environment.
      Route::post('/updatedetails', ['uses' => 'EnvironmentCheckController@update'])->name('cms.environment.update');

      Route::get('/setupdatabase', function(){
        echo "OOO hellooo chal geya";
      })->name('cms.environment');


    });
});