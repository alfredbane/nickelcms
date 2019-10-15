<?php

namespace NickelCms\Installer\Controllers;

use Illuminate\Routing\Controller;
use NickelCms\Installer\Requests\DatabaseStoreRequest;

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
  public function update(DatabaseStoreRequest $request) {

    $this->envsetuphelper->updateAndSaveEnv($request);

    event(new DbDetailsUpdated());

    return redirect()->route('cms.createuser');

  }



}
