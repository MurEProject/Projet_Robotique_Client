<?php

	require_once("config.php");
	
	$message = null;
	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	// connect to server
	$result = socket_connect($socket, HOST, PORT) or die("Could not connect to server\n");  
	// send string to server
	
	if($_POST['id']==1)
	{
		$message = array( 'pince' => 'ouvrir', 'vitesse' => $_POST['vitesse']);
	}
	else if($_POST['id']==2)
	{
		$message = array( 'pince' => 'descendre', 'vitesse' => $_POST['vitesse']);
	}
	else if($_POST['id']==3)
	{
		$message = array( 'direction' => 'recule', 'vitesse' => $_POST['vitesse']);
	}
	else if($_POST['id']==4)
	{
		$message = array( 'direction' => 'avancer', 'vitesse' => $_POST['vitesse']);
	}
	else if($_POST['id']==5)
	{
		$message = array( 'direction' => 'stop', 'vitesse' => $_POST['vitesse']);
	}
	else if($_POST['id']==6)
	{
		$message = array( 'GPS' => 'true');
                $message = json_encode($message);
                $message = $message."\r\n";
        //echo $message;
                $test = socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
        
                //if($test !== false ){
                    //echo $test;
                //$message ="test";
               $result = socket_read ($socket, 1024) or die("Could not read server response\n");
                echo $result;
                //}

                //echo $result;
                //$test = json_decode($result);
                //$message = $test['coordoX'];
                //$message = "tzt";
	}
	
	
	if(isset($message['GPSS'])){
		
		$message= serialize($message);	// Permet de passer un array
		socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
		
		// get server response
		$result = socket_read ($socket, 1024) or die("Could not read server response\n");
		// clean up input string
		//$input = trim($input);
		$result = unserialize($result);
		
		if(isset($result['GPS'])){
			
			echo $result['GPS'];
		}
	}
        else if($_POST['id']==6){
            
                //$result = socket_read ($socket, 1024) or die("Could not read server response\n");
                //echo $result;
        }
	else{
		//$message= serialize($message);
                $message = json_encode($message);
                echo $message;
		socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
	}
	
	
?>