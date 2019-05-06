<?php

namespace OpenMedia\ComposerIntegration\Resource;

use OpenMedia\ComposerIntegration\CacheInterface;
use OpenMedia\ComposerIntegration\Environment;

abstract class ResourceBase {
  public function __construct(CacheInterface $cache, $ucs) {
    $this->cache = $cache;
    $this->ucs = $ucs;
  }
  public function getDefaultParams() {
    return array(
      'format' => 'json',
      'hide_amazon' => FALSE,
      'hide_itunes' => FALSE,
      'hide_arkiv' => FALSE,
    );
  }
  public function makeCall($resource, array $params = array()) {
    $data = $this->cache->getItem($resource);
    if (empty($data)) {
      try {
        $base = Environment::getUrlStem();
        $query = http_build_query($params);
        $url = $base . $resource . '?' . $query;
        $data = file_get_contents($url);
        $this->cache->setItem($resource, $data);
      }
      catch(\Exception $e) {
        // Log Exception
        print $e->getMessage();
      }
    }
    return $data;
  }
}
