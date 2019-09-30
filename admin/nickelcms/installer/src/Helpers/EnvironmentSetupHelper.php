<?php

namespace NickelCms\Installer\Helpers;

use Exception;
use Illuminate\Http\Request;

class EnvironmentSetupHelper {

  /**
   * @var string
   */
  private $envPath;

  /**
   * @var string
   */
  private $envExamplePath;

  public function __construct()
  {

    $this->envPath = base_path('.env');
    $this->envExamplePath = base_path('.env.example');

  }

  /**
   * Get the content of the .env file.
   *
   * @return void
   */
  public function createEnvFromExample()
  {
    if (! file_exists($this->envPath)) {
      if (file_exists($this->envExamplePath)) {
          copy($this->envExamplePath, $this->envPath);
      } else {
          touch($this->envPath);
      }
    }
    return file_get_contents($this->envPath);
  }

  /**
   * Edit and save the ENV.
   *
   * @return void
   */
  public function updateAndSaveEnv(Request $request)
  {
    $envData =
    'APP_NAME=Laravel'."\n".
    'APP_ENV=local'."\n".
    'APP_KEY='."\n".
    'APP_DEBUG=true'."\n".
    'APP_URL=http://localhost'."\n".
    'LOG_CHANNEL=stack'."\n\n".
    'DB_CONNECTION=mysql'."\n".
    'DB_HOST='.$request->db_host."\n" .
    'DB_PORT=3306'."\n".
    'DB_DATABASE='.$request->db_name."\n";

    if($this->createEnvFromExample()) {

      try {

        file_put_contents($this->envPath, $envData);

      } catch (Exception $e) {

      }

    }
    return "done";

  }

}

?>
