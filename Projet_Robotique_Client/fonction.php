<?php

	require_once("config.php");
	
	$message = null;    //Initialisation du message
    
    if(isset($_POST)){
    
            /************** Création de la socket *******************/
            // create socket
            $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
            // connect to server
            $result = socket_connect($socket, HOST, PORT) or die("Could not connect to server\n");  
            // send string to server



            /*********************************** Début du traitement **********************************/

            /************** Tourner à gauche *******************/
            if($_POST['id']==1)
            {
                $message = array( 'direction' => 'gauche', 'vitesse' => $_POST['vitesse'], 'pince' => '');
            }
            /************** Tourner à droite *******************/
            else if($_POST['id']==2)
            {
                $message = array( 'direction' => 'droite', 'vitesse' => $_POST['vitesse'], 'pince' => '');
            }
            /************** Reculer *******************/
            else if($_POST['id']==3)
            {
                $message = array( 'direction' => 'recule', 'vitesse' => $_POST['vitesse'], 'pince' => '');
            }
            /************** Avancer *******************/
            else if($_POST['id']==4)
            {
                $message = array( 'direction' => 'avance', 'vitesse' => $_POST['vitesse'], 'pince' => '');
            }
            /************** STOP *******************/
            else if($_POST['id']==5)
            {
                $message = array( 'direction' => 'stop', 'vitesse' => $_POST['vitesse'], 'pince' => '');
            }
            /************** GPS *******************/
            else if($_POST['id']==6)
            {
                $message = array( 'GPS' => 'true');
                $message = json_encode($message);
                $test = socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
                
            }
            /************** Ouvrir Pince *******************/
            else if($_POST['id']==7)
            {
                $message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'pince' => 'ouvrir');
            }
            /************** Fermer pince *******************/
            else if($_POST['id']==8)
            {
                $message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'pince' => 'fermer');
            }
            /************** Monter pince *******************/
            else if($_POST['id']==9)
            {
                $message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'pince' => 'monter');
            }
            /************** Descendre pince *******************/
            else if($_POST['id']==10)
            {
                $message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'pince' => 'descendre');
            }
            /************** Tourner camera gauche *******************/
            else if($_POST['id']==11)
            {
                $message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'camera' => 'gauche');
            }
            /************** Tourner camera droite *******************/
            else if($_POST['id']==12)
            {
                $message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'camera' => 'centre');
            }
            /************** Tourner camera centre *******************/
            else if($_POST['id']==13)
            {
                $message = array( 'direction' => '', 'vitesse' => $_POST['vitesse'], 'camera' => 'droite');
            }
            /************** Envoie de la commande vocale *******************/
            else if($_POST['id']==15)
            {
                $voix = $_POST['texte'];
                $message = array( 'direction' => $voix, 'vitesse' => $_POST['vitesse'], 'camera' => '', 'vocale' => $voix);
            }
            /************** Envoie de l'état de batterie *******************/
            else if($_POST['id']==16)
            {
                $message = array( 'Batterie' => 'true');
                $message = json_encode($message);
                socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
            }
            /************** Modification de la vitesse de baterie *******************/
            else if($_POST['id']==17)
            {
                $message = array( 'vitesseMoteur' => $_POST['vitesse']);
            }
        
	
            /************** Lecture des infos pour batterie ou GPS *******************/
            if(($_POST['id']==6) || ($_POST['id']==16)) //Batterie ou GPS
            {
                $result = socket_read ($socket, 2048) or die("Could not read server response\n");
                echo $result;
                
            }
            else if($_POST['id']==17)
            {
                $message = json_encode($message);
                //echo $message;
                socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
                
                $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
                // connect to server
                $result = socket_connect($socket, HOST, PORT) or die("Could not connect to server\n");
                
                //envoie de la deuxiéme socket
                $test = array( 'Batterie' => 'true');
                $test = json_encode($test);
                //echo $message;
                socket_write($socket, $test, strlen($test)) or die("Could not send data to server\n");
                
            }
            /* CAPTEUR */
            else if($_POST['id']==18)
            {
                $message = array( 'capteur' => 'true');
                $message = json_encode($message);
                socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
                $resultCapteur = socket_read ($socket, 2048) or die("Could not read server response\n");
                echo $resultCapteur;
                
            }	/* FIN CAPTEUR */
            else{
                        $message = json_encode($message);
                        echo $message;
                        socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
            }
    
        
    }
    else{
        echo "erreur";
    }
	
?>