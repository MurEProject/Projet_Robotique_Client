$(function() {
  
	$(".left").click(function() {
		$.post('fonction.php',
		{ id: 1 ,
		  vitesse: document.getElementById('vitesse').value},
		function (data){
			$(".info").html(data);
		});
	});
	$(".right").click(function() {
		$.post('fonction.php',
		{ id: 2 ,
		  vitesse: document.getElementById('vitesse').value},
		function (data){
			$(".info").html(data);
		});
	});
	$(".down").click(function() {
		$.post('fonction.php',
		{ id: 3 ,
		  vitesse: document.getElementById('vitesse').value},
		function (data){
			$(".info").html(data);
		});
	});
	$(".up").click(function() {
		$.post('fonction.php',
		{ id: 4 ,
		  vitesse: document.getElementById('vitesse').value},
		function (data){
			$(".info").html(data);
		});
	});
	$(".stop").click(function() {
		$.post('fonction.php',
		{ id: 5 ,
		  vitesse: document.getElementById('vitesse').value},
		function (data){
			$(".info").html(data);
		});
	});
	$(".title-information").click(function() {
		$.post('fonction.php',
		{ id: 6 },
		function (data){
			document.getElementById('x').value = data;
		});
	});
  
	/* Permet de rafraichir l'image de la camera toutes les secondes */ 
	function refresh() {
	   var tmp = new Date();
	   var img = document.getElementById("cam");
	   img.src = img.src + '?' + tmp.getTime();
	}
 
	window.onload = function() {
	  setInterval(refresh,1000);
	 };
	/* Fin du rafraichissement d'image caméra */
		
});
