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



     $this->installedFile = storage_path(config('installer.file'));

     if(defined('CMS_INSTALLED') && CMS_INSTALLED) {
       if(file_exists($this->installedFile)) {
        return redirect()->route('home')->send();
      }
     }

  }

  /**
   * Display installation init page.
   *
   * @return \Illuminate\View\View
   */
   public function index(){
     return view('nickelcms::welcome');
   }

}
