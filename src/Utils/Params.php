<?php

namespace Tresfaces\Slotegrator\Utils;

class Params
{
  /**
   * Generates the credentials to perform the requests of Slotegrator
   * 
   * @param string $merchantKey
   * @param string $merchandId
   * @param array $requestParams
   */
  public static function credentials($merchantKey, $merchantId, $requestParams = [])
  {

    $time = time();
    $nonce = md5(uniqid(mt_rand(), true));

    $headers = [
      'X-Merchant-Id' => $merchantId,
      'X-Timestamp' => $time, 
      'X-Nonce' => $nonce
    ];

    $mergedParams = array_merge($requestParams, $headers);
    ksort($mergedParams);
    $hashString = http_build_query($mergedParams);
    $XSign = hash_hmac('sha1', $hashString, $merchantKey);

    return [
      'X-Merchant-Id' => $merchantId,
      'X-Nonce' => $nonce,
      'X-Sign' => $XSign,
      'X-Timestamp' => $time,
    ];
  }
}