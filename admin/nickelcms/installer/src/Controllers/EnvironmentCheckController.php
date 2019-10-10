<?php

namespace NickelCms\Installer\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use NickelCms\Installer\Helpers\EnvironmentSetupHelper;

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

    return $this->envsetuphelper->updateAndSaveEnv($request);

  }



}
