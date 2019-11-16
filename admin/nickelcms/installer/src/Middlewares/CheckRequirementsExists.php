<?php

namespace NickelCms\Installer\Middlewares;

use Closure;
use NickelCms\Installer\Helpers\RequirementsCheckHelper;

class CheckRequirementsExists
{

    protected $requirements;

    public function __construct(RequirementsCheckHelper $reqhelper) {
      $this->requirements = $reqhelper;
    }

    /**
     * Check if requirements are complete.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {

      if( $this->checkRequirementsExists() ) {
        return $next($request);
      }
      return redirect()->route('cms.environment.requirements')->send();


    }

    /**
     * Check if after installation file exists.
     *
     * @return boolean
     */
    public function checkRequirementsExists()
    {

      $requirements = $this->requirements->check(
          config('installer.requirements')
      );

      if( isset($requirements['errors']) ) {
          return false;
      }

      return true;

    }
}
