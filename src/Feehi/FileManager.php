<?php

/**
 * @author lf
 * @copyright 2016
 */

namespace Feehi;

class FileManager{
    
    public $path;
    private $subPath = '';
    
    public function __construct($path='./')
    {
        $this->path = $path;
    }
    
    public function listDir($level=0, $sign='-')
    {
    	$this->_listDir($this->path);
    }

    private function _listDir($path, $level=0, $sign='-')
    {
	    $it = new \FileSystemIterator($path);
	    foreach ($it as $value) {
		    if( $value->isDir() ){
			    echo $value->getPathname()."\n";
			    $this->_listDir($path.DIRECTORY_SEPARATOR.$value->getFilename(), $level++);
		    }else{
			    echo str_repeat($sign, $level).$value->getFilename()."\n";
		    }
	    }
    }

    public function cp($destination)
    {
    	if(!is_dir($destination)){
    		mkdir($destination, 0777, true);
    		chmod($destination, 0777);
    	}
        echo "Coping files, please wait a moment.\n";
    	$this->_cp($this->path, $destination);
        echo "Copy finished\n";
    }

    private function _cp($source, $destination)
    {
    	$it = new \FileSystemIterator($source);
	    foreach ($it as $value) {
		    if( $value->isDir() ){
                $directory = $destination.DIRECTORY_SEPARATOR.$value->getFilename();
			    mkdir($directory);
                echo "Created directory $directory\n";
			    chmod($destination.DIRECTORY_SEPARATOR.$value->getFilename(), 0777);
			    $this->_cp($source.DIRECTORY_SEPARATOR.$value->getFilename(), $destination.DIRECTORY_SEPARATOR.$value->getFilename());
		    }else{
		    	$file = $value->getFilename();
                $desti = $destination.DIRECTORY_SEPARATOR.$file;
			    copy($source.DIRECTORY_SEPARATOR.$file, $desti);
                echo "Copied file $desti\n";
		    }
	    }
    }
    
}


?>