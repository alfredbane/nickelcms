<?php

namespace NickelCms\Installer\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use NickelCms\Installer\Events\FinishInstallationEvent;

class FinishInstallationController extends Controller
{

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct() {

      $this->middleware("checkinstall");

    }

    /**
     * Load the finish installation view.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
      return view('nickelcms::pages.finish');
    }

    public function finishInstallerSetup() {

      try {

        event(new FinishInstallationEvent());

        \Artisan::call('key:generate', ['--force'=> true]);

      } catch( Exception $e ) {

        echo $e->getMessage();

      }

      $notification = array(
        'message' => 'Welcome to nickel cms. Login to continue.',
        'alert-type' => 'success'
      );

      return redirect()->route('home')
                      ->with($notification)->send();

    }


}
