<?php

namespace Tresfaces\Slotegrator\Adapters;
use Tresfaces\Slotegrator\Contracts\RequestContract;

final class RequestAdapter
{
  private $requestClient;

  /**
   * Dependency contract
   * 
   * @param RequestContract $requestClient
   */
  public function __construct(RequestContract $requestClient)
  {
    $this->requestClient = $requestClient;
  }

  /**
   * Request method
   * 
   * @param string $method
   * @param string $url
   * @param array $options
   */
  public function request($method, $url, $options)
  {
    return $this->requestClient->request($method, $url, $options);
  }
}