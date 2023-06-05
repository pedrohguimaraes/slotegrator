<?php

namespace Tresfaces\Slotegrator\Contracts;

interface RequestContract
{
  /**
   * Request method
   * 
   * @param string $method
   * @param string $url
   * @param array $options
   */
  public function request($method, $url, $options);
}