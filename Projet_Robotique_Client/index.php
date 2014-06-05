<!doctype html>
<html>

	<head>
	 <meta charset="utf-8" />
     <title>Robot</title>
     <link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body>
     <script src="js/jquery.js"></script>
     <script src="js/mon-js.js"></script>


	<h1>Robot</h1>
	<div id="contenu">
        <div id="panel-direction-camera">
            <div class="title-direction-camera">Orienter cam</div>
            <label class="camera-gauche" >Gauche</label>
            <label class="camera-centrer" >Centrer</label>
            <label class="camera-droite" >Droite</label>
        </div>
<textarea id="transcription" readonly="readonly"></textarea>

<h3>Log</h3>
<div id="log"></div>

<div class="buttons-wrapper">
<button id="button-play-ws" class="button-demo">Play demo</button>
<button id="button-stop-ws" class="button-demo">Stop demo</button>
<button id="clear-all" class="button-demo">Clear all</button>
</div>
<span id="ws-unsupported" class="hidden">API not supported</span>

		<div id="camera">
		   <p>Photo de la camera à mettre : rafraichissement toutes les 2 secondes </p>
		  <!-- Image rafraichie -->
		  <IMG class="cam" id="cam" SRC="http://146.19.17.134/image2.jpg" ALT="cam" TITLE="cam">
		</div>
		<div id="information">
			<div class="title-information">Informations</div>	
			<label>Vitesse</label><input type="range" min="50" max="200" value="100" id="vitesse" name="vitesse"/>
			<label>Coordo X</label><input type="text" id="x" name="x" value="">
			<label>Coordo Y</label><input type="text" id="y" name="y" value="">
			<div class="title-information">Rafraichir GPS</div>
			
		</div>		
		
		<div id="panel-direction">
			<div class="title-direction">Controler</div>
			<div class="direction">
			 <IMG class="up" SRC="img/up.png" ALT="up" TITLE="up">
			 <BR>
			 <IMG class="left" SRC="img/left.png" ALT="left" TITLE="left">
			 <IMG class="stop" SRC="img/stop.png" ALT="stop" TITLE="stop">
			 <IMG class="right" SRC="img/right.png" ALT="right" TITLE="right">
			 <BR>
			 <IMG class="down" SRC="img/down.png" ALT="down" TITLE="down">	 
		    </div>
			
		</div>

        <div id="panel-pince">
            <div class="title-pince">Pince</div>
                <label class="ouvrir" >Ouvrir</label>
                <label class="fermer" >Fermer</label>
                <label class="monter" >Monter</label>
                <label class="descendre" >Descendre</label>
        </div>
    <div id="panel-batterie" class="batterie">
        <IMG  id="img-batterie" SRC="img/batterie_chargt_100_2.png"  ALT="Etat batterie" TITLE="Etat batterie">
    </div>
	</div>

	</body>

</html>


