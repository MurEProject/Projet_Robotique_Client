$(function() {
  
	$(".left").click(function() {
		$.post('fonction.php',
		{ id: 1 ,
		  vitesse: document.getElementById('vitesse').value});
	});
	$(".right").click(function() {
		$.post('fonction.php',
		{ id: 2 ,
		  vitesse: document.getElementById('vitesse').value});
	});
	$(".down").click(function() {
		$.post('fonction.php',
		{ id: 3 ,
		  vitesse: document.getElementById('vitesse').value});
	});
	$(".up").click(function() {
		$.post('fonction.php',
		{ id: 4 ,
		  vitesse: document.getElementById('vitesse').value});
	});
	$(".stop").click(function() {
		$.post('fonction.php',
		{ id: 5 ,
		  vitesse: document.getElementById('vitesse').value});
	});
	$(".title-information").click(function() {
		$.post('fonction.php',
		{ id: 6 },
		function (data){
            obj = JSON.parse(data); //Parse les données json récupéréés pour qu'on puisse les lire
            //console.log(obj.coordoX);
			document.getElementById('x').value = obj.coordoX;
            document.getElementById('y').value = obj.coordoY;
		});
	});
    $(".ouvrir").click(function() {
                     $.post('fonction.php',
                            { id: 7 });
                     });
    $(".fermer").click(function() {
                     $.post('fonction.php',
                            { id: 8 });
                     });
    $(".monter").click(function() {
                     $.post('fonction.php',
                            { id: 9 });
                     });
    $(".descendre").click(function() {
                     $.post('fonction.php',
                            { id: 10 }
                            );
                     });
  
	/* Permet de rafraichir l'image de la camera toutes les secondes */ 
	function refresh() {
        $.post('fonction.php',
            { id: 14 },
            function (data){
               console.log(data);
               });
            });
	   var tmp = new Date();
	   var img = document.getElementById("cam");
	   img.src = img.src + '?' + tmp.getTime();
	}
 
	window.onload = function() {
  

	  setInterval(refresh,1000);


	 };
	/* Fin du rafraichissement d'image camÈra */
		
});
