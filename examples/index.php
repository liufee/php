<?php
require "../autoload.php";
$obj = new \Feehi\FileManager('/Users/f/work/php/cms');
$obj->listDir();
$obj->cp("/Users/f/work/php/copydirectory/cms");
