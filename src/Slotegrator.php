<?php

namespace Tresfaces\Slotegrator;

use Tresfaces\Slotegrator\Utils\Params;
use Tresfaces\Slotegrator\Adapters\RequestGuzzle;
use Tresfaces\Slotegrator\Adapters\RequestAdapter;
use Tresfaces\Slotegrator\Utils\Rest;

class Slotegrator extends Rest
{
  
  /**
   * Headers params for requests
   * 
   * @var array $headers
   */
  public $headers;


  /**
   * Merchant Key
   * 
   * @var string
   */
  public $merchantKey;


  /**
   * Merchant Id
   * 
   * @var string
   */
  public $merchantId;
  
  /**
   * Create a new Slotegrator instance
   * 
   * @param string $url
   * @param string $merchantKey
   * @param string $merchantId
   */
  public function __construct($url, $merchantKey, $merchantId)
  {
    $this->merchantKey = $merchantKey;
    $this->merchantId = $merchantId;
    parent::__construct($url);
  }

  /**
   * Return game list
   * 
   * @return array
   */
  public function games(array $request = [])
  {
    try{
      $this->headers = Params::credentials($this->merchantKey, $this->merchantId, $request);
      
      $client = new RequestAdapter(new RequestGuzzle());
      $response = $client->request(self::GET, self::mergePoint('/games'), [
        'headers' => $this->headers,
        'query' => $request
      ]);

      return $response;
    }catch(\Exception $e){
      return $e->getMessage();
    }
  }

  /** 
   * Return game lobby
   * 
   * @return array $request
   */
  public function lobby(array $request)
  {
    try{
      $this->headers = Params::credentials($this->merchantKey, $this->merchantId, $request);

      $client = new RequestAdapter(new RequestGuzzle());
      $response = $client->request(self::GET, self::mergePoint('/games/lobby'), [
        'headers' => $this->headers,
        'query' => $request
      ]);

      return $response;
    }catch(\Exception $e){
      return $e->getMessage();
    }
  }

  /**
   * Init selected game
   * 
   * @param array $request
   * 
   * @return array
   */
  public function gameInit(array $request)
  {
    try{
      $this->headers = Params::credentials($this->merchantKey, $this->merchantId, $request);

      $client = new RequestAdapter(new RequestGuzzle());
      $response = $client->request(self::POST, self::mergePoint('/games/init'), [
        'headers' => $this->headers,
        'form_params' => $request
      ]);

      return $response;
    }catch(\Exception $e){
      return $e->getMessage();
    }
  }

  /**
   * Init demo selected game
   * 
   * @param array $request
   * 
   * @return array
   */
  public function gameInitDemo(array $request)
  {
    try{
      $this->headers = Params::credentials($this->merchantKey, $this->merchantId, $request);

      $client = new RequestAdapter(new RequestGuzzle());
      $response = $client->request(self::POST, $this->mergePoint('/games/init-demo'), [
        'headers' => $this->headers,
        'form_params' => $request
      ]);

      return $response;
    }catch(\Exception $e){
      return $e->getMessage();
    }
  }
}