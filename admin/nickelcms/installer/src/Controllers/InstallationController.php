<?php

namespace NickelCms\Installer\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstallationController extends Controller
{

  /**
   * Where to check if installer file exists.
   *
   * @var string
   */
  protected $installedFile = '' ;


  /**
   * Create a new controller instance.
   *
   * @return string
   */
  public function __construct()
  {

     $this->middleware("checkinstall");

  }

  /**
   * Display installation init page.
   *
   * @return \Illuminate\View\View
   */
   public function index(){
     return view('nickelcms::pages.welcome');
   }

}
