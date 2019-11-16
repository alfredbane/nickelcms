<?php

namespace NickelCms\Installer\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use NickelCms\Installer\Models\User;
use NickelCms\Installer\Helpers\FinishInstallationHelper;
use NickelCms\Installer\Events\FinishInstallationEvent;
use NickelCms\Installer\Events\DbDetailsUpdated;

class CreateNewUserController extends Controller
{

  public $afterFinishInstall;

  public function __construct(FinishInstallationHelper $afterFinishInstall) {

    $this->middleware("checkinstall");
    $this->middleware("checkDbIfUserInstalled");
    $this->middleware("checkIfRequirementsExists");

    $this->afterFinishInstall = $afterFinishInstall;

  }

  /**
   * Display the create user page.
   *
   * @return \Illuminate\View\View
   */
  public function index() {


    return view('nickelcms::pages.createuser');

  }

  /**
   * Store the user in database.
   *
   * @return
   */
  public function store(Request $request) {

    event(new DbDetailsUpdated());

    User::create($request->all());

    if ( !$request->session()->has(config('installer.sessionvar.user')) ) {
      $request->session()->put(config('installer.sessionvar.user'), true);
    }

    event(new FinishInstallationEvent());

    $notification = array(
      'message' => 'Finishing up installation.',
      'alert-type' => 'success'
    );

    return redirect()->route('cms.environment.finalizeinstall')
                    ->with($notification);

  }

}
