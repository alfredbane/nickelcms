<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'file' => 'installedcmsinfo.php',

  /*
   |--------------------------------------------------------------------------
   | Server Requirements
   |--------------------------------------------------------------------------
   |
   | This is the default Laravel server requirements, you can add as many
   | as your application require, we check if the extension is enabled
   | by looping through the array and run "extension_loaded" on it.
   |
   */
   'core' => [
       'minPhpVersion' => '7.0.0',
   ],
   'final' => [
       'key' => true,
       'publish' => false,
   ],
   'requirements' => [
       'php' => [
           'openssl',
           'pdo',
           'mbstring',
           'tokenizer',
           'mongodb',
           'JSON',
           'cURL',
       ],
       'apache' => [
           'mod_rewrite',
       ],
   ],

   /*
    |--------------------------------------------------------------------------
    | Folders Permissions
    |--------------------------------------------------------------------------
    |
    | This is the default Laravel folders permissions, if your application
    | requires more permissions just add them to the array list bellow.
    |
    */
    'permissions' => [
        'storage/framework/'     => '775',
        'storage/logs/'          => '775',
        'bootstrap/cache/'       => '775',
    ],

    'targetcollection' => 'users',


];
