# php
A library for php

##Introduction
This is a php lib, contains common php tools

##Tools
1. Http Request(get and post)

##Install
1. Use Composer install(recommended)
```
  1.create composer.json require feehi/standard
   eg:
   {
        "require": {
            "feehi/standard" : "*"
        }
   }
   if chinese goes eg:
   {
        "require": {
            "feehi/standard" : "*"
        },
        "repositories": [
            {"type": "composer", "url": "http://packagist.phpcomposer.com"},
            {"packagist": false}
        ]
   }
  2.run command "composer update"
   ![composer-install-feehi-standard](http://img10.qiniudn.com/nodeblog/2015-12-31-03-42-14.png)
```

##Usage
1. Http request
```
  <?php
  require "vendor/autoload.php";

  use Feehi\Http;

  $http = new Http();
  $res = $http->get("http://blog.feehi.com");
  $res = $http->post("http://blog.feehi.com", ['username'=>'xxx','password'=>'yyy']);
  var_dump($res);
  ![feehi-standard-http-eg](http://img10.qiniudn.com/nodeblog/2015-12-31-03-49-58.png)
```