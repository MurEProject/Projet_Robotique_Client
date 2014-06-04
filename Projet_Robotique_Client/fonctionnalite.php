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
        
        //$json = '{"a":"1testtststststststst/dauduadgazu56","b":2,"c":3,"d":4,"e":5}';
 
        //var_dump(json_decode($json));
        //$test = json_decode($json);
        //echo $test->{'a'};
        
?>

<!--<img src="/image.php"/> -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Web Speech API Demo</title>
    <style>
      body
      {
        max-width: 500px;
        margin: 2em auto;
        font-size: 20px;
      }
 
      h1
      {
        text-align: center;
      }
 
      .buttons-wrapper
      {
        text-align: center;
      }
 
      .hidden
      {
        display: none;
      }
 
      #transcription,
      #log
      {
        display: block;
        width: 100%;
        height: 5em;
        overflow-y: scroll;
        border: 1px solid #333333;
        line-height: 1.3em;
      }
 
      .button-demo
      {
        padding: 0.5em;
        display: inline-block;
        margin: 1em auto;
      }
    </style>
  </head>
  <body>
    <h1>Web Speech API</h1>
    <h2>Transcription</h2>
    <textarea id="transcription" readonly="readonly"></textarea>
 
    <span>Results:</span>
    <label><input type="radio" name="recognition-type" value="final" checked="checked" /> Final only</label>
    <label><input type="radio" name="recognition-type" value="interim" /> Interim</label>
 
    <h3>Log</h3>
    <div id="log"></div>
 
    <div class="buttons-wrapper">
      <button id="button-play-ws" class="button-demo">Play demo</button>
      <button id="button-stop-ws" class="button-demo">Stop demo</button>
      <button id="clear-all" class="button-demo">Clear all</button>
    </div>
    <span id="ws-unsupported" class="hidden">API not supported</span>
 
    <script>
      // Test browser support
      window.SpeechRecognition = window.SpeechRecognition       ||
                                 window.webkitSpeechRecognition ||
                                 null;
 
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
            if (event.results[i].isFinal) {
              transcription.textContent = event.results[i][0].transcript;
            } else {
              transcription.textContent += event.results[i][0].transcript;
            }
          }
        };
 
        // Listen for errors
        recognizer.onerror = function(event) {
          log.innerHTML = 'Recognition error: ' + event.message + '<br />' + log.innerHTML;
        };
 
        document.getElementById('button-play-ws').addEventListener('click', function() {
          // Set if we need interim results
          recognizer.interimResults = document.querySelector('input[name="recognition-type"][value="interim"]').checked;
 
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
    </script>
  </body>
</html>