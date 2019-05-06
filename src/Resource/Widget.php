<?php

namespace OpenMedia\ComposerIntegration\Resource;

use OpenMedia\ComposerIntegration\Resource\ResourceBase;
use OpenMedia\ComposerIntegration\Environment;

class Widget extends ResourceBase {
  protected $resources = array(
    'day' => 'widget/{ucs}/day',
    'tracks' => 'widget/{ucs}/tracks'
  );
  public function getWidgetDay(array $params = array()) {
    $resource = str_replace('{ucs}', $this->ucs, $this->resources['day']);
    $default_params = $this->getDefaultParams();
    $params = array_merge($default_params, $params);
    return $this->makeCall($resource, $params);
  }
  public function getWidgetTracks(array $params = array()) {
    $resource = str_replace('{ucs}', $this->ucs, $this->resources['tracks']);
    $default_params = $this->getDefaultParams();
    $params = array_merge($default_params, $params);
    return $this->makeCall($resource, $params);
  }
} 
