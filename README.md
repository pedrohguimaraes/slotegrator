# PHP Slotegrator
Biblioteca de integracão com API do Slotegrator

## Instalação
Para instalar esta dependência basta executar o comando abaixo:
```shell
composer require pedrohguimaraes/slotegrator
```
## Utilização

```php
<?php

require '../vendor/autoload.php';

use Tresfaces\Slotegrator\Slotegrator;

$slote = new Slotegrator(LINK, MERCHANT_KEY, MERCHANT_ID);

$request = [
  "perPage" => 0
];

echo $slote->games($request);