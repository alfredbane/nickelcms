<?php

namespace NickelCms\Installer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\View;

use NickelCms\Installer\Middlewares\CheckInstallation;
use NickelCms\Installer\Middlewares\CheckInstallerDBSession;
use NickelCms\Installer\Middlewares\CheckInstallerUserAddSession;

use NickelCms\Installer\ViewComposers\DefaultClassComposer;

class InstallationServiceProvider extends ServiceProvider
{

    protected $listen = [

    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      // Publish config,lang files.
      $this->publishFiles();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        // Load routes from package routes.
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

        // Add a middleware to check cms installation.
        $router->aliasMiddleware('checkinstall', CheckInstallation::class);

        // Add a middleware to check if current function is already installed.
        $router->aliasMiddleware('checkDbIfInstalled', CheckInstallerDBSession::class);

        // Add a middleware to check if current function is already installed.
        $router->aliasMiddleware('checkDbIfUserInstalled', CheckInstallerUserAddSession::class);

        // Load views from package.
        $this->loadViewsFrom(__DIR__.'/../resources/Views', 'nickelcms');

        // Load default classes for views.
        View::composer('nickelcms::skeleton.mainframe',  DefaultClassComposer::class);


    }

    /**
     * Publish config file for the installer.
     * @source https://github.com/rashidlaasri/LaravelInstaller/
     *
     * @return void
     */
    protected function publishFiles()
    {
        $this->publishes([
            __DIR__.'/Config/installer.php' => config_path('installer.php'),
        ], 'nickelcms');

        // $this->publishes([
        //     __DIR__.'/assets' => resource_path('nicklecms/admin'),
        // ], 'nickelcms_assets');

    }
}
