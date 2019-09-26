<?php

return [

    'file' => 'installedcmsinfo',

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
           'JSON',
           'cURL',
       ],
       'apache' => [
           'mod_rewrite',
       ],
   ],
   
];
