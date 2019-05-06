<?php

namespace OpenMedia\ComposerIntegration;

interface CacheInterface {

  public function setItem($key, $data);

  public function getItem($key);

}
