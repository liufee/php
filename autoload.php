<?php
spl_autoload_register(function($className){
	$path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
	$file = __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.$path.'.php';
	if(is_file($file)) require $file;
});