<?php

namespace OpenMedia\ComposerIntegration;

class Environment {
  protected static $url_stem = "https://api.composer.nprstations.org";
  protected static $version_string= 'v1'; 
  public static function getUrlStem() {
    return self::$url_stem . '/' . self::$version_string . '/';
  }
}
