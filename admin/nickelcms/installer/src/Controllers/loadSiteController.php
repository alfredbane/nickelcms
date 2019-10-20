<?php

namespace NickelCms\Installer\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loadSiteController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct() {

      $this->middleware("checkinstall");
      
    }

    /**
     * Create a new installer instance.
     *
     * @return mixed
     */
     public function index(){
       return "Logic to show site";
     }

}
