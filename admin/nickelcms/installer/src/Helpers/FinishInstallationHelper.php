<?php

namespace NickelCms\Installer\Helpers;

use Exception;

class FinishInstallationHelper {

  /**
   * File path for index public file.
   * @var string
   */
  private $indexPath;

  /**
   * File installer define.
   * @var string
   */
  private $installerVar;

  /**
   * File Marker define.
   * @var string
   */
  private $fileMarker;

  public function __construct()
  {

    $this->indexPath = public_path('index.php');

    $this->installerVar = "define ('CMS_INSTALLED', true);" ;

    $this->fileMarker = "define('LARAVEL_START', microtime(true))";

  }

  public function get_index_content() {
    return file_get_contents($this->indexPath);
  }

  /**
   * Check if installation global
   * exists in index.php
   *
   * @return boolean
   */
  public function exists_installation_global() {

    return strpos( $this->get_index_content(), $this->installerVar );

  }

   /**
    * Add the installation global in index.php
    * If the installation succeeds.
    *
    * @return integer
    */
  public function add_installation_global() {


    $FinalStringToAdd = "\n"."/**------------------------------------"."\n".
     "* Below string has been added by"."\n".
     "* NICKEL CMS INSTALLER v1.0"."\n".
     "* Kindly do not remove."."\n".
     "*"."\n".
     "*/"."\n".
     $this->installerVar."\n".
     "//------------------------------------//"."\n";

    $lines = file($this->indexPath);

    if( !$this->exists_installation_global() ) {

      $string_pos = array_filter( $lines, function($elt) {
        if ( strpos($elt, $this->fileMarker) !== FALSE )
          return $elt;
      });

      if( key( $string_pos ) !== null ) {
        $lines = $this->array_push_after($lines, array( $FinalStringToAdd ), key( $string_pos ));
      }

    }

    return file_put_contents($this->indexPath, $lines);
  }

  public function add_installation_files() {

    $installation_indicator_file_name = config('installer.file');
    $installation_indicator_file_path = storage_path('/app/public/'.$installation_indicator_file_name);

    $indicator_file = fopen($installation_indicator_file_path, 'w') or
    die('Cannot open file:  '.$installation_indicator_file_name);

    $fileText =
    "<?php"."\n".
    "/** ----------------------------------------------"."\n".
    "*     IMPORTANT : NICKEL CMS INSTALLER v1.0"."\n".
    "* ----------------------------------------------"."\n".
    "* This file has been added by nickel cms installer."."\n".
    "* Kindly do not remove the file in order to keep"."\n".
    "* the cms preserved and working."."\n"."*/";

    fwrite($indicator_file, $fileText);

    fclose($indicator_file);

  }

   /**
    * @return array
    * @param array $src
    * @param array $in
    * @param int|string $pos
    */
    public function array_push_after($src,$in,$pos){
        if(is_int($pos)) $R=array_merge(array_slice($src,0,$pos+1), $in, array_slice($src,$pos+1));
        else{
            foreach($src as $k=>$v){
                $R[$k]=$v;
                if($k==$pos)$R=array_merge($R,$in);
            }
        }return $R;
    }

}
