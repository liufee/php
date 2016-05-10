<?php
require "../autoload.php";

use Feehi\Http;

$http = new Http();
$res = $http->get("http://blog.feehi.com");
$res = $http->post("http://blog.feehi.com", ['username'=>'xxx','password'=>'yyy']);
file_put_contents('blog.html', $res);
var_dump($res);