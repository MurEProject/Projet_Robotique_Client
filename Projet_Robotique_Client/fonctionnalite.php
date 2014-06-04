<?php

	function connectSocket($host, $port){
	
	}
        
        //$byte_array = file_get_contents('image2.jpg');
        //$image = base64_encode($byte_array);
        
        //$data = base64_decode($image);
        //$im = imagecreatefromstring($data);
        //header('Content-Type: image/jpeg');
        //imagejpeg($im);
        //echo $image;
        
        $json = '{"a":"1testtststststststst/dauduadgazu56","b":2,"c":3,"d":4,"e":5}';
 
        //var_dump(json_decode($json));
        $test = json_decode($json);
        echo $test->{'a'};
        
?>

<!--<img src="/image.php"/> -->
