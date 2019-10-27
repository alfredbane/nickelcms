<?php

/*
|--------------------------------------------------------------------------
| Installer Routes
|--------------------------------------------------------------------------
|
| Here installer routs are written to install your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Controllers within the "\NickelCms\Installer\Controllers" namespace
Route::group(['namespace' => '\NickelCms\Installer\Controllers'], function() {

    //Get '/' after checking if CMS installed.
    Route::get('/',['uses'=>'loadSiteController@index'])->name('home');

    Route::group(['middleware' => ['web']], function() {

        //Get installer but check if not already installed.
        Route::get('/installer',['uses' => 'InstallationController@index'])->name('cms.environment.installer');

        // Check if system has thlaravel redirect to url dependencies.
        Route::get('/requirements', ['uses' => 'RequirementCheckController@requirements'])->name('cms.environment.requirements');

        // Check if system has the dependencies.
        Route::get('/filepermissions', ['uses' => 'FilepermissionController@permissions'])->name('cms.environment.permissions');

        // Prepare system environment.
        Route::get('/environment', ['uses' => 'EnvironmentCheckController@index'])->name('cms.environment.settings');

        // Prepare system environment.
        Route::post('/updatedetails', ['uses' => 'EnvironmentCheckController@update'])->name('cms.environment.settings.update');

        // Create first user .
        Route::get('/createauser', ['uses' => 'CreateNewUserController@index'])->name('cms.environment.createuser');

        // Store first user .
        Route::post('/storeuser', ['uses' => 'CreateNewUserController@store'])->name('cms.environment.storeuser');

        // Finish installation.
        Route::get('/finalsetup', ['uses' => 'FinishInstallationController@index'])->name('cms.environment.finalizeinstall');

        // Finish installation.
        Route::get('/savefiles', ['uses' => 'FinishInstallationController@finishInstallerSetup'])->name('cms.environment.finishInstall');

    });
});
