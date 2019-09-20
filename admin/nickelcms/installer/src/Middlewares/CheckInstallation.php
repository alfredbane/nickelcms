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

      if( !$this->cmsInstanceExists() ){
        return redirect()->route('cms.installer');
      }

      return $next($request);

    }

    /**
     * If application is already installed.
     *
     * @return bool
     */
    public function cmsInstanceExists()
    {
      if( !defined('CMS_INSTALLED') || !CMS_INSTALLED ) {
        return false;
      }
      return file_exists( storage_path( config('installer.file') ) );
    }
}
