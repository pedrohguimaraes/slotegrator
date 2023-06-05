<?php

namespace Tresfaces\Slotegrator\Utils;

abstract class Rest
{
  protected const GET = 'GET';
  protected const POST = 'POST';
  protected const PUT = 'PUT';
  protected const DELETE = 'DELETE';

  /**
   * API URL Slotegrator
   * 
   * @var string
   */
  protected $url;

  /**
   * Create a new Rest instance
   * 
   * @param string $url
   */
  public function __construct($url)
  {
    $this->url = $url;
  }

  public function mergePoint($endpoint)
  {
    return $this->url .= $endpoint;
  }
}