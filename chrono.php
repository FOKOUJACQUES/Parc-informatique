<!doctype html>
<html>
<head>
	<title>Chronomètre</title>
	<meta charset="utf-8">
	<style type="text/css">
      .chronometre{
                   margin: auto ;
                   width: 300px;
                   text-align: center;
                  }

      .tim{
      	margin: auto;
      	width: 300px;
      	border: 1px solid rgba(0,0,0,0.5);
      	padding:5px 0;
      	text-align: center;
      	font-size: 1.5em;
      	font-family: digital;
      	margin-bottom: 10px;
         }
     
      button{
        background: #3498db;
        color: #fff;
        width: 70px;
        border-radius: 5px;   line-height: 1.5em;
        border: none
    }.start:hover {
        background-color: red;
        font-size: 20px;
    }.stop:hover {
        background-color: red;
        font-size: 20px;
    }.reset:hover {
        background-color: red;
        font-size: 20px;
    }
	</style>
</head>
<body>
<div class="chronometre">
  <div id="chronometer" class="tim">
  	<span id="hours">0 h</span> :
  	<span id="minutes">0 min</span> :
	<span id="seconds">0 s</span>
  </div>
  <button class="start" id="start" onclick="startChronometer()">Start</button>
  <button class="stop" id="stop" onclick="stopChronometer()">Stop</button>
  <button class="reset" id="reset" onclick="resetChronometer()">Reset</button>
</div>

<script>
let seconds = 0;
let minutes = 0;
let hours = 0;
let intervalId = null;

function pad(n) {
    return (n < 10) ? ("0" + n) : n;
}

function startChronometer() {
    seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
    
    document.getElementById("hours").innerHTML = pad(hours) + " h";
    document.getElementById("minutes").innerHTML = pad(minutes) + " min";
    document.getElementById("seconds").innerHTML = pad(seconds) + " s";
}

function stopChronometer() {
    clearInterval(intervalId);
}

function resetChronometer() {
    stopChronometer();
    seconds = 0;
    minutes = 0;
    hours = 0;
    document.getElementById("hours").innerHTML = pad(hours) + " h";
    document.getElementById("minutes").innerHTML = pad(minutes) + " min";
    document.getElementById("seconds").innerHTML = pad(seconds) + " s";
}

document.getElementById("start").addEventListener("click", function() {
    if (!intervalId) {
        intervalId = setInterval(startChronometer, 1000);
    }
});

document.getElementById("stop").addEventListener("click", function() {
    stopChronometer();
    intervalId = null;
});

document.getElementById("reset").addEventListener("click", function() {
    resetChronometer();
    intervalId = null;
});
</script>

</body>
</html>
