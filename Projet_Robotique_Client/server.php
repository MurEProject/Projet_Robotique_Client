<?php
require_once("config.php");
// set some variables

// don't timeout!
set_time_limit(0);
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
// bind socket to port
$result = socket_bind($socket, HOST, PORT) or die("Could not bind to socket\n");
echo "Socket créée ";
for ($i = 1; $i <= 10; $i++) {
	// start listening for connections
	$result = socket_listen($socket, 3) or die("Could not set up socket listener\n");

	// accept incoming connections
	// spawn another socket to handle communication
	$spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
	// read client input
	$input = socket_read($spawn, 1024) or die("Could not read input\n");
	// clean up input string
	//$input = trim($input);
	$input = unserialize($input);
	
	if(isset($input['GPS'])){
		$message = array( 'GPS' => '15');
		var_dump($message);
		$message= serialize($message);
		socket_write($spawn, $message, strlen ($message)) or die("Could not write output\n");
		echo "<br>TEST";
	}
	else{
		echo "<br>Commande éxécutée : ".$input['direction']." Vitesse: ".$input['vitesse']."";
	}
	socket_close($spawn);
}
socket_close($socket);

?>