<?php

namespace NickelCms\Installer\Middlewares;

use Closure;

class CheckDatabaseInstallation
{
  /**
   * Check if db is installed.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
    public function handle($request, Closure $next)
    {
        if( $this->dbInstanceExists() ) {
          return redirect()->route('cms.installer');
        }
        return $next($request);
    }

    /**
     * Check if after installation file exists.
     *
     * @return string
     */
    public function dbInstanceExists()
    {
        $checkInstance = \DB::getMongoDB()->listCollections();

        foreach (\DB::connection()->getMongoDB()->listCollections() as $collection) {
          if( $collection->getName() == 'users') {
            return true;
          }
        }

        return false;

    }


}
