<?php

namespace NickelCms\Installer\Middlewares;

use Closure;

class CheckInstallerUserAddSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( $request->session()->has('userCreated') ){

          return redirect()->route('cms.environment.finalizeinstall');

        }

        return $next($request);
    }
}
