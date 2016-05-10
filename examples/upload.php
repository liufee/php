<?php 
require "../autoload.php";

use Feehi\upload;

if( $_SERVER['REQUEST_METHOD']=="POST" ){
        @ini_set('memory_limit', '256M');
	$upload = new upload([
        'maxSize' => 9999999,
        'allowTypes' => ['image/png', 'image/jpeg'],
	]);
	$arr = $upload->upload('/feehi/img');
	var_dump($arr);
        echo "<br>\n";
        if($arr === false) var_dump($upload->getErrors());
}

?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name='feehi[]'>
    <input type='file' name='feehi[]'>
    <input type="submit" value='确定'>
</form>
