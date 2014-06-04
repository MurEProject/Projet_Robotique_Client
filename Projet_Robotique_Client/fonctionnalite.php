<?php

	function connectSocket($host, $port){
	
	}
        
        $byte_array = file_get_contents('image2.jpg');
        $image = base64_encode($byte_array);
        
        $data = base64_decode($image);
        $im = imagecreatefromstring($data);
        header('Content-Type: image/jpeg');
        imagejpeg($im);
        //echo $image;
?>

<img src="/image.php"/>