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
  
    $(".camera-gauche").click(function() {
                            $.post('fonction.php',
                                   { id: 11 }
                                   );
                            });
    $(".camera-centrer").click(function() {
                             $.post('fonction.php',
                                    { id: 12 }
                                    );
                             });
    $(".camera-droite").click(function() {
                            $.post('fonction.php',
                                   { id: 13 }
                                   );
                            });
    $(".batterie").click(function() {
                       $.post('fonction.php',
                              { id: 16 },
                              function (data){
                              obj = JSON.parse(data);
                              valueBatterie = parseInt(obj.Batterie);
                              srcImg = "img/batterie_chargt_100_2.png";
                              if (valueBatterie == 100)
                              {
                              srcImg = "img/batterie_chargt_100_2.png";
                              }
                              else if  (valueBatterie < 100 && valueBatterie >= 75)
                              {
                              srcImg = "img/batterie_chargt_75_2.png";
                              }
                              else if  (valueBatterie < 75 && valueBatterie >= 50)
                              {
                              srcImg = "img/batterie_chargt_50_2.png";
                              }
                              else if  (valueBatterie < 50 && valueBatterie >= 25)
                              {
                              srcImg = "img/batterie_chargt_25_2.png";
                              }
                              document.getElementById('img-batterie').src = srcImg;
                              });
                       });
  
	/* Permet de rafraichir l'image de la camera toutes les secondes */ 
	function refresh() {
        $.post('fonction.php',
            { id: 14 },
            function (data){
                console.log(data);
               });
	   //var tmp = new Date();
	   //var img = document.getElementById("cam");
	   //img.src = img.src + '?' + tmp.getTime();
    };
 
	window.onload = function() {
  
        refresh();
	  //setInterval(refresh,1000);


	 };
	/* Fin du rafraichissement d'image camÈra */

  //**************************** Reconnaissance vocale *********************************/
  // Test browser support
  window.SpeechRecognition = window.SpeechRecognition||window.webkitSpeechRecognition ||null;
  
  if (window.SpeechRecognition === null) {
  document.getElementById('ws-unsupported').classList.remove('hidden');
  document.getElementById('button-play-ws').setAttribute('disabled', 'disabled');
  document.getElementById('button-stop-ws').setAttribute('disabled', 'disabled');
  } else {
  var recognizer = new window.SpeechRecognition();
  var transcription = document.getElementById('transcription');
  var log = document.getElementById('log');
  
  // Recogniser doesn't stop listening even if the user pauses
  recognizer.continuous = true;
  
  // Start recognising
  recognizer.onresult = function(event) {
  transcription.textContent = '';
  
  for (var i = event.resultIndex; i < event.results.length; i++) {
    transcription.textContent += event.results[i][0].transcript;
  }

    $.post('fonction.php',
            { id: 15,
             texte: transcription.textContent,
             vitesse: document.getElementById('vitesse').value
           }
            );
  };
  
  
  
  
  // Listen for errors
  recognizer.onerror = function(event) {
  log.innerHTML = 'Recognition error: ' + event.message + '<br />' + log.innerHTML;
  };
  
  document.getElementById('button-play-ws').addEventListener('click', function() {
                                                             // Set if we need interim results
                                                             
                                                             try {
                                                             recognizer.start();
                                                             log.innerHTML = 'Recognition started' + '<br />' + log.innerHTML;
                                                             } catch(ex) {
                                                             log.innerHTML = 'Recognition error: ' + ex.message + '<br />' + log.innerHTML;
                                                             }
                                                             });
  
  document.getElementById('button-stop-ws').addEventListener('click', function() {
                                                             recognizer.stop();
                                                             log.innerHTML = 'Recognition stopped' + '<br />' + log.innerHTML;
                                                             });
  
  document.getElementById('clear-all').addEventListener('click', function() {
                                                        transcription.textContent = '';
                                                        log.textContent = '';
                                                        });
  }

		
});
