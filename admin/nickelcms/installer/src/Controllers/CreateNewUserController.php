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

    event(new FinishInstallationEvent());
    
    return redirect()->route('cms.installer')
                    ->with('success','Category created successfully');

  }

}
