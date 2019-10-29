<?php

namespace NickelCms\Installer\Traits;

/**
 * This trait is created to
 * add a mongodb connection check
 * database and collection check
 *
 * @since nickel v1.0
 *
 */

trait MongoDBConnectionTrait
{
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
    $mongoHasDatabase = false;

    foreach ($databaseList as $database) {
      if( $database->getName() === $request->db_name ) {
        $mongoHasDatabase = true;
      }
    }

    return $mongoHasDatabase;

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
    $mongoDatabaseHasCollection = false;

    foreach ($collectionList as $item) {
      if( $item->getName() === 'users' ) {
        $mongoDatabaseHasCollection = true;
      }
    }

    return $mongoDatabaseHasCollection;

  }
}

?>
