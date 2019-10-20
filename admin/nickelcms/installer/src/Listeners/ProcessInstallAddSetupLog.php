<?php

namespace NickelCms\Installer\Listeners;

use NickelCms\Installer\Helpers\FinishInstallationHelper;
use NickelCms\Installer\Events\FinishInstallationEvent;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class ProcessInstallAddSetupLog
{

    /**
     * @var FinishInstallationHelper
     */
    public $finishinstallhelper;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(FinishInstallationHelper $finishinstallhelper)
    {
      $this->finishinstallhelper = $finishinstallhelper;
    }

    /**
     * Handle the event.
     *
     * @param  FinishInstallationEvent  $event
     * @return void
     */
    public function handle(FinishInstallationEvent $event)
    {

        $this->finishinstallhelper->add_installation_global();

        $this->finishinstallhelper->add_installation_files();


    }
}
