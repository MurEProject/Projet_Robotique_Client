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
		$message = array( 'direction' => 'gauche', 'vitesse' => $_POST['vitesse'], 'pince' => '');
	}
	else if($_POST['id']==2)
	{
		$message = array( 'direction' => 'droite', 'vitesse' => $_POST['vitesse'], 'pince' => '');
	}
	else if($_POST['id']==3)
	{
		$message = array( 'direction' => 'recule', 'vitesse' => $_POST['vitesse'], 'pince' => '');
	}
	else if($_POST['id']==4)
	{
		$message = array( 'direction' => 'avancer', 'vitesse' => $_POST['vitesse'], 'pince' => '');
	}
	else if($_POST['id']==5)
	{
		$message = array( 'direction' => 'stop', 'vitesse' => $_POST['vitesse'], 'pince' => '');
	}
	else if($_POST['id']==6)
	{
		$message = array( 'GPS' => 'true');
        $message = json_encode($message);
        //$message = $message."\r\n";
        $test = socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
        
	}
    else if($_POST['id']==7)
	{
		$message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'pince' => 'ouvrir');
	}
    else if($_POST['id']==8)
	{
		$message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'pince' => 'fermer');
	}
    else if($_POST['id']==9)
	{
		$message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'pince' => 'monter');
	}
    else if($_POST['id']==10)
	{
		$message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'pince' => 'descendre');
	}
	else if($_POST['id']==11)
	{
		$message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'camera' => 'gauche');
	}
	else if($_POST['id']==12)
	{
		$message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'camera' => 'centre');
	}
	else if($_POST['id']==13)
	{
		$message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'camera' => 'droite');
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
    else if($_POST['id']==6)
	{
        $result = socket_read ($socket, 1024) or die("Could not read server response\n");
        echo $result;
        
    }
	else{
		//$message= serialize($message);
                $message = json_encode($message);
                echo $message;
		socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
	}
	
	
?>
