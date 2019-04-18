<?php
$page = $_SERVER['PHP_SELF'];
$sec = "30";
?>
<head>
  <title>Web-Based Music Player for mpd</title>
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
  <link rel='shortcut icon' type='image/x-icon' href='favicon.png' />
</head>

<style>
html, body{
	margin: 0;
	padding: 0;
	background-color: #323234;
	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;
	color: #FFFFFF;
}
	
input {
  float: left;
}

.buttons {
  display: inline-block;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #323234;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #323234;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #323234;
  color: white;
}

.button4 {
  background-color: white; 
  color: black; 
  border: 2px solid magenta;
}

.button4:hover {
  background-color: #323234;
  color: white;
}

.button5 {
  background-color: white; 
  color: black; 
  border: 2px solid orange;
}

.button5:hover {
  background-color: #323234;
  color: white;
}

.button6 {
  background-color: white; 
  color: black; 
  border: 2px solid yellow;
}

.button6:hover {
  background-color: #323234;
  color: white;
}

.button7 {
  background-color: white; 
  color: black; 
  border: 2px solid black;
}

.button7:hover {
  background-color: #323234;
  color: white;
}

.lyrics-container {
    width: auto;
    height: 525px;
    overflow: scroll;
    text-align:center;
}

.form-textbox {
	width: 325px !important;
}
</style>

<div style="border-style: solid; border-width: thin; border-color: #FFFFFF; width: auto;">
<p>
<form action="" method="post">
	<input type="submit" style="background-image:url(cover.png?<?php echo time() ?>); border:none; width:131px;height:131px; color:transparent; margin-right:15px; margin-left:15px;" value=" " name="button8" id="myImage"/>
</form>
 Click the album art to view and refresh the music status and album art.
</p>
<?php if (isset($_POST['button8'])) { $output = shell_exec('mpc'); echo "<pre>$output</pre>"; } ?>

<?php if (isset($_POST['button'])) { exec('mpc toggle'); } ?>
<form class="buttons" action="" method="post">
    <button class="button button1" type="submit" name="button">Play/Pause Music</button>
</form>

<?php if (isset($_POST['button2'])) { exec('mpc cdprev'); } ?>
<form class="buttons" action="" method="post">
    <button class="button button2" type="submit" name="button2">Restart Song</button>
</form>

<?php if (isset($_POST['button3'])) { exec('mpc prev'); } ?>
<form class="buttons" action="" method="post">
    <button class="button button3" type="submit" name="button3">Previous Song</button>
</form>

<?php if (isset($_POST['button4'])) { exec('mpc next'); } ?>
<form class="buttons" action="" method="post">
    <button class="button button4" type="submit" name="button4">Next Song</button>
</form>

<form class="buttons" action="" method="post">
    <a class="button button5" id="displayText" href="javascript:toggle();">Play Artist</a>
</form>
<div id="toggleText" style="display: none">
	<form method="post">
	<input class="form-textbox" type='text' name="artist" value="Please input what artist you'd like to listen to." /> <br/>
	</form>
	<?php
    if(isset($_REQUEST['artist'])){
		$artist = $_REQUEST['artist'];
        shell_exec("mpc clear");
        shell_exec("mpc find artist \"$artist\" | mpc add");
        shell_exec("mpc play");
    }
    ?>
</div>

<form class="buttons" action="" method="post">
    <a class="button button6" id="displayText2" href="javascript:toggle2();">Play Album</a>
</form>
<div id="toggleText2" style="display: none">
	<form method="post">
	<input class="form-textbox" type='text' name="album" value="Please input what album you'd like to listen to." /> <br/>
	</form>
	<?php
    if(isset($_REQUEST['album'])){
		$album = $_REQUEST['album'];
        shell_exec("mpc clear");
        shell_exec("mpc find album \"$album\" | mpc add");
        shell_exec("mpc play");
    }
    ?>
</div>

<form class="buttons" action="" method="post">
    <a class="button button7" id="displayText3" href="javascript:toggle3();">Play Playlist</a>
</form>
<div id="toggleText3" style="display: none">
	<form method="post">
	<input class="form-textbox" type='text' name="playlist" value="Please input what playlist you'd like to listen to." /> <br/>
	</form>
	<?php
    if(isset($_REQUEST['playlist'])){
		$playlist = $_REQUEST['playlist'];
        shell_exec("mpc clear");
        shell_exec("mpc load \"$playlist\"");
        shell_exec("mpc play");
    }
    ?>
</div>

<br/>
<a>Created by: valley</a> <br/>
<a>With help from: /r/PHPhelp and Stack Overflow.</a>
<br/>
<br/>
</div>

<h3 style="text-align:center">LYRICS</h3>
<div class="lyrics-container" name="lyrics">
<?php 
$artist = shell_exec('mpc -f %artist% | head -n1');
$artist = substr($artist, 0, -1);
$title = shell_exec('mpc -f %title% | head -n1');
$title = substr($title, 0, -1);
$title = str_replace("?", "", $title);
$title = str_replace("/", "", $title);
$file = "./lyrics/$artist - $title.txt";
$f = fopen($file, "r") or exit("| Unable to open file!");
while(!feof($f))
{
  echo fgets($f)."<br />";
}
fclose($f);
?>
</div>

<script>
setInterval(function() {
    var myImageElement = document.getElementById('myImage');
    myImageElement.src = 'cover.png?rand=' + Math.random();
}, 5000);

function toggle() {
	var ele = document.getElementById("toggleText");
	var text = document.getElementById("displayText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "Play Artist";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "Dismiss Input";
	}
} 

function toggle2() {
	var ele = document.getElementById("toggleText2");
	var text = document.getElementById("displayText2");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "Play Album";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "Dismiss Input";
	}
} 

function toggle3() {
	var ele = document.getElementById("toggleText3");
	var text = document.getElementById("displayText3");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "Play Playlist";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "Dismiss Input";
	}
} 
</script>
