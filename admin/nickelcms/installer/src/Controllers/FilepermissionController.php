<?php

namespace NickelCms\Installer\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use NickelCms\Installer\Helpers\PermissionsCheckHelper;

class FilepermissionController extends Controller
{
  /**
   * @var PermissionsCheckHelper
   */
  protected $permissions;

  /**
   * @param PermissionsCheckHelper $checker
   */
  public function __construct(PermissionsCheckHelper $checker)
  {
      $this->permissions = $checker;
  }

  /**
   * Display the permissions check page.
   *
   * @return \Illuminate\View\View
   */
  public function permissions()
  {
      $permissions = $this->permissions->check(
          config('installer.permissions')
      );
      return view('nickelcms::pages.filepermissionscheck', compact('permissions'));
  }
}
