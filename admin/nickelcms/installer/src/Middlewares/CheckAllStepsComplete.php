<?php

namespace NickelCms\Installer\Middlewares;

use Closure;

class CheckAllStepsComplete
{
    /**
     * Check if all the steps are complete.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      if( ! $request->session()->has('dbInstalled') &&
      ! $request->session()->has('userCreated') ){

          return redirect()->route('cms.environment.installer');

      }

      return $next($request);

    }

}
