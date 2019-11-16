<?php

namespace NickelCms\Installer\Controllers;

use Illuminate\Routing\Controller;
use NickelCms\Installer\Requests\DatabaseStoreRequest;

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

    $this->middleware("checkinstall");
    $this->middleware("checkDbIfInstalled");
    $this->middleware("checkIfRequirementsExists");
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
   * @return void
   */
  public function update(DatabaseStoreRequest $request) {

    $this->envsetuphelper->updateAndSaveEnv($request);

    return redirect()->route('cms.environment.createuser');

  }



}
