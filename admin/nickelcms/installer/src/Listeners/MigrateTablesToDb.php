<?php

namespace NickelCms\Installer\Listeners;

use NickelCms\Installer\Events\DbDetailsUpdated;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MigrateTablesToDb
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

      } catch(Exception $e) {

        $notification = array(
          'message' => 'Database details are working fine.',
          'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

      }

    }
}
