<?php

namespace OpenMedia\ComposerIntegration;

use OpenMedia\ComposerIntegration\CacheInterface;

class CacheWPObjectCache implements CacheInterface {
  public function __construct($expire = 86400) {
    $this->expire = $expire;
  }

  public function setItem($key, $value) {
    return set_transient($key, $value, $this->expire);
  } 

  public function getItem($key) {
    return get_transient($key);
  }
} 
