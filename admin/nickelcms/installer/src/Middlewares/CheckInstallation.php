<?php

namespace NickelCms\Installer\Middlewares;

use Closure;

class CheckInstallation
{
    /**
     * Check if already installed.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      if(strpos(\Request::route()->getName(), 'cms.') === 0) {
        return ( !$this->cmsInstanceExists() ) ? $next($request)
        : redirect()->route('home')->send();
      } else {
        return ( $this->cmsInstanceExists() ) ? $next($request)
        : redirect()->route('cms.environment.installer');

      }

    }

    /**
     * Check if after installation file exists.
     *
     * @return string
     */
    public function cmsInstanceExists()
    {

      if( env('DB_DATABASE') === 'laravel' ){
        return false;
      }

      if( !defined('CMS_INSTALLED') || !CMS_INSTALLED ) {
        return false;
      }

      return file_exists( storage_path( 'app/public/'.config('installer.file') ) );

    }
}
