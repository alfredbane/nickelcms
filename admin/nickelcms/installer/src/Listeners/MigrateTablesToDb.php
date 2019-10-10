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
        // \Artisan::call('migrate', array('--force' => true));
        dd("Fitush");
    }
}
