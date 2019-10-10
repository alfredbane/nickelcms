<?php

namespace NickelCms\Installer\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use NickelCms\Installer\Helpers\EnvironmentSetupHelper;
use NickelCms\Installer\Events\DbDetailsUpdated;

class EnvironmentCheckController extends Controller
{

  /**
   * @var EnvironmentSetupHelper
   */
  protected $envsetuphelper;

  /**
   * @param EnvironmentSetupHelper $envsetuphelper
   */
  public function __construct(EnvironmentSetupHelper $envsetuphelper) {
    $this->envsetuphelper = $envsetuphelper;
  }

  /**
   * Display the Environment setup page.
   *
   * @return \Illuminate\View\View
   */
  public function index() {
    return view('nickelcms::pages.environmentsetup');
  }

  /**
   * Update the details in ENV file.
   *
   * @return \Illuminate\View\View
   */
  public function update(Request $request) {

    $this->envsetuphelper->updateAndSaveEnv($request);

    event(new DbDetailsUpdated());

    return \Redirect::to('/setupdatabase')->with('This is what happens');

  }



}
