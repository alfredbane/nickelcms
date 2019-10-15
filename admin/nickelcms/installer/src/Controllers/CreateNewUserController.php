<?php

namespace NickelCms\Installer\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CreateNewUserController extends Controller
{

  public function __construct() {
    
  }
  /**
   * Display the Environment setup page.
   *
   * @return \Illuminate\View\View
   */
  public function index() {
    return view('nickelcms::pages.createuser');
  }
}
