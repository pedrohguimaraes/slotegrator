```php
<?php

require '../vendor/autoload.php';

use Tresfaces\Slotegrator\Slotegrator;

$slote = new Slotegrator(LINK, MERCHANT_KEY, MERCHANT_ID);

$request = [
  "perPage" => 0
];

echo $slote->games($request);