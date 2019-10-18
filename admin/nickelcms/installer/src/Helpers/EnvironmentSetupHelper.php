<?php

namespace NickelCms\Installer\Helpers;

use Exception;
use Illuminate\Support\Facades\DB;
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

  /**
   * @var boolean
   */
  private $databaseExists;


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
    'APP_KEY=base64:SZ2HujojlvcIooHiDcajM38rTKaCgIZoAAkq13Y8O5w='."\n".
    'APP_DEBUG=true'."\n".
    'APP_LOG_LEVEL=debug'."\n".
    'APP_URL=http://localhost/nickelcms'."\n\n".
    'LOG_CHANNEL=stack'."\n\n".
    'DB_CONNECTION=mongodb'."\n".
    'DB_HOST='.$request->db_host."\n".
    'DB_PORT=27017'."\n".
    'DB_DATABASE='.$request->db_name."\n".
    'DB_USERNAME='.$request->db_user."\n".
    'DB_PASSWORD='.$request->db_passwrd."\n\n".
    'BROADCAST_DRIVER=log'."\n".
    'CACHE_DRIVER=file'."\n".
    'QUEUE_CONNECTION=sync'."\n".
    'SESSION_DRIVER=file'."\n".
    'SESSION_LIFETIME=120'."\n\n".
    'REDIS_HOST=127.0.0.1'."\n".
    'REDIS_PASSWORD=null'."\n".
    'REDIS_PORT=6379'."\n\n".
    'MAIL_DRIVER=smtp'."\n".
    'MAIL_HOST=smtp.mailtrap.io'."\n".
    'MAIL_PORT=2525'."\n".
    'MAIL_USERNAME=null'."\n".
    'MAIL_PASSWORD=null'."\n".
    'MAIL_ENCRYPTION=null'."\n\n".
    'AWS_ACCESS_KEY_ID='."\n".
    'AWS_SECRET_ACCESS_KEY='."\n".
    'AWS_DEFAULT_REGION=us-east-1'."\n".
    'AWS_BUCKET='."\n\n".
    'PUSHER_APP_ID='."\n".
    'PUSHER_APP_KEY='."\n".
    'PUSHER_APP_SECRET='."\n".
    'PUSHER_APP_CLUSTER=mt1'."\n\n".
    'MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"'."\n".
    'MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"';

    if(!$this->createEnvFromExample()) {
      return false;
    }

    try {

        $mongo = new \MongoDB\Client("mongodb://127.0.0.1:27017/");
        $databaseList = $mongo->listDatabases();

        foreach ($databaseList as $database) {
          if( $database->getName() == $request->db_name ) {
            $this->databaseExists = true;
          }
        }

        if( $this->databaseExists ) {

          file_put_contents($this->envPath, $envData);
          
        } else {

          $notification = array(
            'message' => 'Database does not exists',
            'alert-type' => 'error'
          );

          return redirect()->back()->with($notification)->send();
        }



    } catch (\MongoDB\Driver\Exception\ConnectionTimeoutException $mongoException) {

      $notification = array(
        'message' => $e->getMessage(),
        'alert-type' => 'error'
      );

      return redirect()->back()->with($notification);

    }

    return true;
  }

}

?>
