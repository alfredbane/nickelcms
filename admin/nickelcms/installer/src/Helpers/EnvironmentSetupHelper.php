<?php

namespace NickelCms\Installer\Helpers;

use Exception;
use DB;
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
    'APP_KEY=base64:SZ2HujojlvcIooHiDcajM38rTKaCgIZoAAkq13Y8O5w='."\n".
    'APP_DEBUG=true'."\n".
    'APP_URL=http://localhost'."\n\n".
    'LOG_CHANNEL=stack'."\n\n".
    'DB_CONNECTION=mysql'."\n".
    'DB_HOST='.$request->db_host."\n".
    'DB_PORT=3306'."\n".
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

      // Create connection
      $db_connection_9802 = mysqli_connect($request->db_host, $request->db_user,
      $request->db_passwrd, $request->db_name);

      if($db_connection_9802) {

        file_put_contents($this->envPath, $envData);

      }

      // // Reload the cached config
      // if (file_exists(\App::getCachedConfigPath())) {
      //     \Artisan::call("config:cache");
      // }
      //
      // \Artisan::call('migrate', array('--force' => true));
      //
      // $notification = array(
      //   'message' => 'Database details are working fine.',
      //   'alert-type' => 'success'
      // );
      //
      // return redirect()->back()->with($notification);

      return true;

    } catch (Exception $e) {

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