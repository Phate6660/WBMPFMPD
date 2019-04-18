<head>
  <title>Web-Based Music Player for mpd</title>
  <meta charset="UTF-8">
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
  padding: 4px 8px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
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
  border: 2px solid #008CBA;
}

.button3:hover {
  background-color: #323234;
  color: white;
}

.button4 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button4:hover {
  background-color: #323234;
  color: white;
}

.button5 {
  background-color: white; 
  color: black; 
  border: 2px solid yellow;
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
  border: 2px solid yellow;
}

.button7:hover {
  background-color: #323234;
  color: white;
}

.button8 {
  background-color: white; 
  color: black; 
  border: 2px solid red;
}

.button8:hover {
  background-color: #323234;
  color: white;
}

.button9 {
  background-color: white; 
  color: black; 
  border: 2px solid red;
}

.button9:hover {
  background-color: #323234;
  color: white;
}

.button10 {
  background-color: white; 
  color: black; 
  border: 2px solid red;
}

.button10:hover {
  background-color: #323234;
  color: white;
}

.lyrics-container {
    width: auto;
    height: 450px;
    overflow: scroll;
    text-align:center;
}

.form-textbox {
	width: 325px !important;
}

.black_overlay {
  display: none;
  position: absolute;
  top: 0%;
  left: 0%;
  width: 100%;
  height: 100%;
  background-color: black;
  z-index: 1001;
  -moz-opacity: 0.8;
  opacity: .80;
  filter: alpha(opacity=80);
}

.white_content {
  text-align: center;
  display: none;
  position: absolute;
  top: 25%;
  left: 25%;
  width: 50%;
  height: 50%;
  padding: 12px;
  border: 12px solid #4CAF50;
  background-color: black;
  z-index: 1002;
  overflow: auto;
}

.controls { 
    height: 35px; 
    position: fixed; 
    bottom:0%;
    width:100%; 
    right: 0%;
    left: 0%;
    background-color: #393838; 
    opacity: 1;
    border-style: solid; 
    border-width: thin; 
    border-color: #FFFFFF; 
    width: auto;
}
</style>

<div style="border-style: solid; border-width: thin; border-color: #FFFFFF; width: auto;">
<p>
<form action="" method="post">
	<input type="submit" style="background-image:url(cover.png?<?php echo time() ?>); border:none; width:131px;height:131px; color:transparent; margin-right:15px; margin-left:15px; margin-bottom:15px;" value=" " name="button11" id="myImage"/>
</form>
 Click the album art to view and refresh the music status and album art.
</p>
<div>
<a>Created by: valley</a> <br/>
<a>With help from: /r/PHPhelp and Stack Overflow.</a>
</div>
<?php if (isset($_POST['button11'])) { $output = shell_exec('mpc'); echo "<pre>$output</pre>"; } ?>
<br/>
<div id="light" class="white_content">
	<?php shell_exec('mpc list Artist > artists.txt'); $file = "artists.txt"; $f = fopen($file, "r") or exit("| Unable to open file!"); while(!feof($f)) { echo fgets($f)."<br />"; } fclose($f); ?><a href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
</div>
<div id="fade" class="black_overlay"></div>
<div id="light2" class="white_content">
	<?php shell_exec('mpc list Album > albums.txt'); $file = "albums.txt"; $f = fopen($file, "r") or exit("| Unable to open file!"); while(!feof($f)) { echo fgets($f)."<br />"; } fclose($f); ?><a href="javascript:void(0)" onclick="document.getElementById('light2').style.display='none';document.getElementById('fade2').style.display='none'">Close</a>
</div>
<div id="fade2" class="black_overlay"></div>
<div id="light3" class="white_content">
	<?php shell_exec('mpc lsplaylists > playlists.txt'); $file = "playlists.txt"; $f = fopen($file, "r") or exit("| Unable to open file!"); while(!feof($f)) { echo fgets($f)."<br />"; } fclose($f); ?><a href="javascript:void(0)" onclick="document.getElementById('light3').style.display='none';document.getElementById('fade3').style.display='none'">Close</a>
</div>
<div id="fade3" class="black_overlay"></div>
</div>
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

<div id="toggleText" style="display: none">
	<form method="post">
	<input class="form-textbox cleardefault" type='text' name="artist" value="Please input what artist you'd like to listen to." /> <br/>
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

<div id="toggleText2" style="display: none">
	<form method="post">
	<input class="form-textbox cleardefault" type='text' name="album" value="Please input what album you'd like to listen to." /> <br/>
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

<div id="toggleText3" style="display: none">
	<form method="post">
	<input class="form-textbox cleardefault" type='text' name="playlist" value="Please input what playlist you'd like to listen to." /> <br/>
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

<div class="controls">
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

<form class="buttons" action="" method="post">
    <a class="button button6" id="displayText2" href="javascript:toggle2();">Play Album</a>
</form>

<form class="buttons" action="" method="post">
    <a class="button button7" id="displayText3" href="javascript:toggle3();">Play Playlist</a>
</form>

<form class="buttons" action="" method="post">
    <a class="button button8" href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">List Available Artists</a>
</form>

<form class="buttons" action="" method="post">
    <a class="button button9" href="javascript:void(0)" onclick="document.getElementById('light2').style.display='block';document.getElementById('fade2').style.display='block'">List Available Albums</a>
</form>

<form class="buttons" action="" method="post">
    <a class="button button10" href="javascript:void(0)" onclick="document.getElementById('light3').style.display='block';document.getElementById('fade3').style.display='block'">List Available Playlists</a>
</form>


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

/*
 * Clear Default Text: functions for clearing and replacing default text in
 * <input> elements.
 *
 * by Ross Shannon, http://www.yourhtmlsource.com/
 */

addEvent(window, 'load', init, false);

function init() {
    var formInputs = document.getElementsByTagName('input');
    for (var i = 0; i < formInputs.length; i++) {
        var theInput = formInputs[i];
        
        if (theInput.type == 'text' && theInput.className.match(/\bcleardefault\b/)) {  
            /* Add event handlers */          
            addEvent(theInput, 'focus', clearDefaultText, false);
            addEvent(theInput, 'blur', replaceDefaultText, false);
            /* Save the current value */
            if (theInput.value != '') {
                theInput.defaultText = theInput.value;
            }
        }
    }
}

function clearDefaultText(e) {
    var target = window.event ? window.event.srcElement : e ? e.target : null;
    if (!target) return;
    
    if (target.value == target.defaultText) {
        target.value = '';
    }
}

function replaceDefaultText(e) {
    var target = window.event ? window.event.srcElement : e ? e.target : null;
    if (!target) return;
    
    if (target.value == '' && target.defaultText) {
        target.value = target.defaultText;
    }
}

function addEvent(element, eventType, lamdaFunction, useCapture) {
    if (element.addEventListener) {
        element.addEventListener(eventType, lamdaFunction, useCapture);
        return true;
    } else if (element.attachEvent) {
        var r = element.attachEvent('on' + eventType, lamdaFunction);
        return r;
    } else {
        return false;
    }
}

/* 
 * Kills an event's propagation and default action
 */
function knackerEvent(eventObject) {
    if (eventObject && eventObject.stopPropagation) {
        eventObject.stopPropagation();
    }
    if (window.event && window.event.cancelBubble ) {
        window.event.cancelBubble = true;
    }
    
    if (eventObject && eventObject.preventDefault) {
        eventObject.preventDefault();
    }
    if (window.event) {
        window.event.returnValue = false;
    }
}

/* 
 * Safari doesn't support canceling events in the standard way, so we must
 * hard-code a return of false for it to work.
 */
function cancelEventSafari() {
    return false;        
}

/* 
 * Cross-browser style extraction, from the JavaScript & DHTML Cookbook
 * <http://www.oreillynet.com/pub/a/javascript/excerpt/JSDHTMLCkbk_chap5/index5.html>
 */
function getElementStyle(elementID, CssStyleProperty) {
    var element = document.getElementById(elementID);
    if (element.currentStyle) {
        return element.currentStyle[toCamelCase(CssStyleProperty)];
    } else if (window.getComputedStyle) {
        var compStyle = window.getComputedStyle(element, '');
        return compStyle.getPropertyValue(CssStyleProperty);
    } else {
        return '';
    }
}

/* 
 * CamelCases CSS property names. Useful in conjunction with 'getElementStyle()'
 * From <http://dhtmlkitchen.com/learn/js/setstyle/index4.jsp>
 */
function toCamelCase(CssProperty) {
    var stringArray = CssProperty.toLowerCase().split('-');
    if (stringArray.length == 1) {
        return stringArray[0];
    }
    var ret = (CssProperty.indexOf("-") == 0)
              ? stringArray[0].charAt(0).toUpperCase() + stringArray[0].substring(1)
              : stringArray[0];
    for (var i = 1; i < stringArray.length; i++) {
        var s = stringArray[i];
        ret += s.charAt(0).toUpperCase() + s.substring(1);
    }
    return ret;
}

/*
 * Disables all 'test' links, that point to the href '#', by Ross Shannon
 */
function disableTestLinks() {
  var pageLinks = document.getElementsByTagName('a');
  for (var i=0; i<pageLinks.length; i++) {
    if (pageLinks[i].href.match(/[^#]#$/)) {
      addEvent(pageLinks[i], 'click', knackerEvent, false);
    }
  }
}

/* 
 * Cookie functions
 */
function createCookie(name, value, days) {
    var expires = '';
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        var expires = '; expires=' + date.toGMTString();
    }
    document.cookie = name + '=' + value + expires + '; path=/';
}

function readCookie(name) {
    var cookieCrumbs = document.cookie.split(';');
    var nameToFind = name + '=';
    for (var i = 0; i < cookieCrumbs.length; i++) {
        var crumb = cookieCrumbs[i];
        while (crumb.charAt(0) == ' ') {
            crumb = crumb.substring(1, crumb.length); /* delete spaces */
        }
        if (crumb.indexOf(nameToFind) == 0) {
            return crumb.substring(nameToFind.length, crumb.length);
        }
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, '', -1);
}
</script>
