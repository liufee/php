<?php
require_once __DIR__ . '/../../../../../../vendor/autoload.php';

use Feehi\Http;

$http = new Http( ['userAgent'=>'Feehi browser'] );
$result = $http->post("http://blog.feehi.com");
var_dump($result);