<?php

namespace Tresfaces\Slotegrator\Adapters;

use Tresfaces\Slotegrator\Contracts\RequestContract;
use GuzzleHttp\Client;

final class RequestGuzzle implements RequestContract
{
  /**
   * Request method
   * 
   * @param string $method
   * @param string $url
   * @param array $options
   */
  public function request($method, $url, $options)
  {
    $client =  new Client();
    $response = $client->request($method, $url, $options);
    $body = $response->getBody();
    return $body->getContents();
  }
}