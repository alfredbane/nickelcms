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

  /**
   * @var boolean
   */
  private $databaseExists;

  /**
   * @var boolean
   */
  private $collectionAlreadyExists;


  public function __construct( Request $request )
  {

    $this->envPath = base_path('.env');
    $this->envExamplePath = base_path('.env.example');

  }

  /**
   * Get the content of the .env file.
   *
   * @return string
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
   * Create mongo DB connection.
   *
   * @return new MongoDB\Client connection
   */

  public function mongoConnection ($request) {

    if( !empty($request->db_user) ) {

      $mongoClientAddress = "mongodb://".$request->db_user.':'.$request->db_passwrd.'@'
      .$request->db_host.':'.$request->db_host_port.'/';

    } else {

      $mongoClientAddress = "mongodb://".$request->db_host.':'.$request->db_host_port.'/';

    }

    return new \MongoDB\Client($mongoClientAddress);

  }

  /**
   * Check if Requested DB exists.
   *
   * @param Illuminate\Http\Request
   * @return boolean
   *
   */

  public function mongoHasDatabase ($request) {

    $mongoConnection = $this->mongoConnection($request) ;
    $databaseList = $mongoConnection->listDatabases();

    foreach ($databaseList as $database) {
      if( $database->getName() == $request->db_name ) {
        return true;
      }
    }

    return false;

  }

  /**
   * Check if Requested DB does not
   * have preinstalled collections.
   *
   * @param Illuminate\Http\Request
   * @return boolean
   *
   */

  public function mongoDatabaseHasCollection ($request) {

    $mongoConnection = $this->mongoConnection($request) ;

    $database = $mongoConnection->selectDatabase($request->db_name);

    $collectionList = $database->listCollections();

    foreach ($collectionList as $item) {
      if( $item->getName() === 'users' ) {
        return true;
      }
    }

    return false;

  }


  /**
   * Edit and save the ENV.
   *
   * @return mixed
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
    'DB_PORT='.$request->db_host_port."\n".
    'DB_DATABASE='.$request->db_name."\n".
    'DB_USERNAME='.$request->db_user."\n".
    'DB_PASSWORD='.$request->db_passwrd."\n".
    'DB_PREFIX='.$request->db_prefix."\n\n".
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
    
    if( $this->mongoHasDatabase($request) ) {

      if( !$this->mongoDatabaseHasCollection($request) ) {

        file_put_contents($this->envPath, $envData);

      } else {

        $notification = array(
          'message' => 'Looks like collections already exists. Clean database and start again',
          'alert-type' => 'error'
        );

        return redirect()->back()->with($notification)->send();

      }

    } else {

      $notification = array(
        'message' => 'Database does not exists. Please try again with different Database OR create a new one.',
        'alert-type' => 'error'
      );

      return redirect()->back()->with($notification)->send();
    }

    return true;

  }

}

?>
