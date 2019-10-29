<?php

namespace NickelCms\Installer\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use NickelCms\Installer\Models\User;
use NickelCms\Installer\Helpers\FinishInstallationHelper;
use NickelCms\Installer\Events\FinishInstallationEvent;

class CreateNewUserController extends Controller
{

  public $afterFinishInstall;

  public function __construct(FinishInstallationHelper $afterFinishInstall) {

    $this->middleware("checkinstall");
    $this->middleware("checkDbIfUserInstalled");

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

    User::create($request->all());

    if ( !$request->session()->has('userCreated') ) {
      $request->session()->put('userCreated', true);
    }

    $notification = array(
      'message' => 'Finishing up installation.',
      'alert-type' => 'success'
    );

    return redirect()->route('cms.environment.finalizeinstall')
                    ->with($notification)->send();

  }

}
