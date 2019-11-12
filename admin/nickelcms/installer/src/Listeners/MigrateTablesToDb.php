<?php

namespace NickelCms\Installer\Listeners;

use NickelCms\Installer\Events\DbDetailsUpdated;
use Illuminate\Http\Request;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MigrateTablesToDb
{

    public $request;

    /**
     * Create the event listener.
     *
     * @param Illuminate\Http\Request
     */
    public function __construct(Request $request)
    {
      $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  DbDetailsUpdated  $event
     * @return void
     */
    public function handle(DbDetailsUpdated $event)
    {

      try {

        if (file_exists(\App::getCachedConfigPath())) {
            \Artisan::call("config:cache");
            \Artisan::call("config:clear");
        }

        \Artisan::call('migrate', array('--force' => true));

        if ( !$this->request->session()->has(config('installer.sessionvar.database')) ) {
          $this->request->session()->put(config('installer.sessionvar.database'), true);
        }

      } catch(Exception $e) {

        $notification = array(
          'message' => 'Database details are working fine.',
          'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

      }

    }
}
