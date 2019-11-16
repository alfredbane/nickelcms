<?php

namespace NickelCms\Installer\Middlewares;

use Closure;

class CheckInstallerDBSession
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
        if( $request->session()->has('dbInstalled') ){

          return redirect()->route('cms.environment.createuser');

        }

        return $next($request);
    }
}
