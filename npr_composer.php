<?php

/**
  * @package Custom Plugin
  *
  * Plugin Name: NPR Composer Integration
  * Description: Utility functions and integration with the NRP Composer API.
  * Author: Open Media Foundation
  * Version: 1.0
  */

require __DIR__ . '/vendor/autoload.php';

use OpenMedia\ComposerIntegration\Environment;
use OpenMedia\ComposerIntegration\CacheWPObjectCache;
use OpenMedia\ComposerIntegration\Resource\Widget;

function npr_comopser_get_schedule_day($ucs) {
  $cache = new CacheWPObjectCache(); 
  $resource = new Widget($cache, $ucs);
  $json = $resource->getWidgetDay();
  return json_decode($json);
}

function npr_comopser_get_playlist($ucs) {
  $cache = new CacheWPObjectCache(300);
  $resource = new Widget($cache, $ucs);
  $json = $resource->getWidgetTracks();
  return json_decode($json);
}
