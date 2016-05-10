<?php
require "../autoload.php";

use Feehi\FileManager;

$obj = new FileManager('/Users/f/work/php/cms');
$obj->listDir();
$obj->cp("/Users/f/work/php/copydirectory/cms");
