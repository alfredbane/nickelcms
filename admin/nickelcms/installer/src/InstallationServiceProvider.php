<?php

namespace NickelCms\Installer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use NickelCms\Installer\Middlewares\CheckInstallation;

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

        // Load views from package.
        $this->loadViewsFrom(__DIR__.'/Views', 'nickelcms');
        

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
