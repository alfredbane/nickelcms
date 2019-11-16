<?php

namespace NickelCms\Installer\Helpers;


class RequirementsCheckHelper
{
    /**
     * Minimum PHP Version Supported (Override is in installer.php config file).
     *
     * @var _minPhpVersion
     */
    private $_minPhpVersion = '7.0.0';

    /**
     * Minimum Apache / Nginx Version Supported (Override is in installer.php config file).
     *
     * @var _serverVersion
     */
    private $_serverVersion;

    /**
     * Check for the server requirements.
     *
     * @param array $requirements
     * @return array
     */
    public function check(array $requirements)
    {

      $results = [];

      foreach ($requirements as $type => $requirement) {

        switch ($type) {

          // check php requirements
          case 'php':
            foreach ($requirements[$type] as $requirement) {
              $results['requirements'][$type][$requirement] = true;
              if (! extension_loaded($requirement)) {
                  $results['requirements'][$type][$requirement] = false;
                  $results['errors'] = true;
              }
            }
          break;

          // check apache requirements
          case 'server':
            foreach ($requirements[$type] as $requirement) {
              // if function doesn't exist we can't check apache modules
              if (function_exists('apache_get_modules')) {
                $results['requirements'][$type][$requirement] = true;
                if (! in_array($requirement, apache_get_modules())) {
                    $results['requirements'][$type][$requirement] = false;
                    $results['errors'] = true;
                }
              }
            }
          break;

          // check mongo DB
          case 'mongodb':
          foreach ($requirements[$type] as $requirement) {
            $results['requirements'][$type][$requirement] = true;
          }
          break;

        }

      }
      return $results;

    }


    /**
     * Check PHP version requirement.
     *
     * @return array
     */
    public function checkPHPversion(string $minPhpVersion = null)
    {
      $minVersionPhp = $minPhpVersion;
      $currentPhpVersion = $this->getPhpVersionInfo();
      $supported = false;
      if ($minPhpVersion == null) {
          $minVersionPhp = $this->getMinPhpVersion();
      }
      if (version_compare($currentPhpVersion['version'], $minVersionPhp) >= 0) {
          $supported = true;
      }
      $phpStatus = [
          'full' => $currentPhpVersion['full'],
          'current' => $currentPhpVersion['version'],
          'minimum' => $minVersionPhp,
          'supported' => $supported,
      ];
      return $phpStatus;
    }

    /**
     * Check Server Support.
     *
     * @return string
     */
    public function checkServerVersion()
    {

      $currentServerVersion = $this->getServerInfo();

      $supported = false;

      if( empty($currentServerVersion) ) {
        return $supported;
      }
      return $currentServerVersion;

    }


    /**
     * Get current Php version information.
     *
     * @return array
     */
    private static function getPhpVersionInfo()
    {
        $currentVersionFull = PHP_VERSION;
        preg_match("#^\d+(\.\d+)*#", $currentVersionFull, $filtered);
        $currentVersion = $filtered[0];
        return [
            'full' => $currentVersionFull,
            'version' => $currentVersion,
        ];
    }

    /**
     * Get Server version ID.
     *
     * @return string _minServerVersion
     */
    protected function getServerInfo()
    {
      return $_SERVER['SERVER_SOFTWARE'] ?
      $_SERVER['SERVER_SOFTWARE'] : '';
    }

    /**
     * Get minimum PHP version ID.
     *
     * @return string _minPhpVersion
     */
    protected function getMinPhpVersion()
    {
        return $this->_minPhpVersion;
    }


}
