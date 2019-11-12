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

    'final' => [
        'key' => true,
        'publish' => false,
    ],

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
         'apacheVersion' => '2.4.29',
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
         'server' => [
             'mod_rewrite',
         ],
         'mongodb' => [
             'version',
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

    'cdnimages' => [
        'logo' => 'https://res.cloudinary.com/nickelcdn/image/upload/v1572677102/Imagelogo_ksh9cv.png'
    ],


    /*
    |--------------------------------------------------------------------------
     | Footer links
     |--------------------------------------------------------------------------
     |
     | Footer links for installer screens. These are the links
     | provided to user in order to have quick access to certain
     | pages.
     |
     */

    'footerlinks' => [

      'docs' => [
        'url' => '#',
        'target' => ''
      ],

      'github' => [
        'url' => 'https://github.com/alfredbane/nickelcms',
        'target' => '_blank'
      ],

      'bug report' => [
        'url' => '#',
        'target' => ''
      ],
    ],

    'sessionvar' => [
      'user' => 'userCreated',
      'database' => 'dbInstalled'
    ]



];
