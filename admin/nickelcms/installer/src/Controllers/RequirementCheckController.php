<?php

namespace NickelCms\Installer\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use NickelCms\Installer\Helpers\RequirementsCheckHelper;

class RequirementCheckController extends Controller
{

  /**
   * @var RequirementsChecker
   */
  protected $requirements;
  /**
   * @param RequirementsChecker $checker
   */
  public function __construct(RequirementsCheckHelper $checker)
  {
       $this->middleware("checkinstall");
      $this->requirements = $checker;
  }
  /**
   * Display the requirements page.
   *
   * @return \Illuminate\View\View
   */
  public function requirements()
  {
      $phpSupportInfo = $this->requirements->checkPHPversion(
          config('installer.core.minPhpVersion')
      );

      $serverVersionInfo = $this->requirements->checkServerVersion();

      $requirements = $this->requirements->check(
          config('installer.requirements')
      );

      return view('nickelcms::pages.requirementscheck', compact('requirements', 'phpSupportInfo', 'serverVersionInfo'));
  }

}
