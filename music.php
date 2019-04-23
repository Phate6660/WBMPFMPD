<head>
  <title>Web-Based Music Player for mpd</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="music-style.css" />
  <link rel='shortcut icon' type='image/x-icon' href='favicon.png' />
</head>

<div style="border-style: solid; border-width: thin; border-color: #FFFFFF; width: auto;">
<p>
<form action="" method="post">
	<input type="submit" style="background-image:url(cover.png?<?php echo time() ?>); border:none; width:131px;height:131px; color:transparent; margin-right:15px; margin-left:15px; margin-bottom:15px;" value=" " name="button99" id="myImage"/>
</form>
<span style="float: left">
	 <a style="border-style: solid; border-width: thin; border-color: #FFFFFF; width: auto;">&nbspClick the album art to refresh the music status, album art, and lyrics.&nbsp</a>
	 <br/>
	 <?php 
	 $state = shell_exec('mpc | cut -d "[" -f2 | cut -d "]" -f1 | tr [A-Z] [a-z] | sed -e \'s/^./\U&/g; s/ ./\U&/g\' | grep Paused');
	 $state2 = shell_exec('mpc | cut -d "[" -f2 | cut -d "]" -f1 | tr [A-Z] [a-z] | sed -e \'s/^./\U&/g; s/ ./\U&/g\' | grep Playing');
	 $progress = shell_exec('mpc | grep "\[" | cut -c 18-29 | sed \'s/ *//g\'| sed \'s/(//g\'');
	 $date = shell_exec('mpc -f "%date%" | head -n1');
	 $genre = shell_exec('mpc -f "%genre%" | head -n1 | cut -f1 -d";"');
	 $song = shell_exec('mpc -f "%title%" | head -n1');
	 $album = shell_exec('mpc -f "%album%" | head -n1');
	 $artist = shell_exec('mpc -f "%artist%" | head -n1');
	 $output = "♫ Now $state$state2 ♫ <br />" . PHP_EOL .
			   "Progress: $progress <br />" . PHP_EOL .
			   "Year: $date <br />" . PHP_EOL .
			   "Genre: $genre <br />" . PHP_EOL .
			   "Song: $song <br />" . PHP_EOL .
			   "Album: $album <br />" . PHP_EOL .
			   "Artist: $artist <br />";
	echo "$output";
	?>
</span>
<span style="float: right; margin-right:15px; border-style: solid; border-width: thin; border-color: #FFFFFF; width: auto;">
<?php 
$time = shell_exec('date +"%I:%M %p | %A %d, %B of %Y"');
echo "&nbspTime and Date: $time&nbsp";
?>
</span>
<br/>
</p>
<div>
<br/>
<br/>
<br/>
<br/>
<span style="float: right; margin-right:15px">
Created by: valley <a class="links" href="https://www.reddit.com/user/Valley6660/" title="My Reddit account.">[1]</a> <a class="links" href="https://github.com/Phate6660/" title="My Github account.">[2]</a>
</span>
<br/>
<span style="float: right; margin-right:15px">
With help from: <a class="links" href="https://www.reddit.com/r/PHPhelp">/r/PHPhelp</a> and <a class="links" href="https://www.stackoverflow.com">Stack Overflow</a>
</span>
</div>
<br/>
<br/>
<div id="light" class="white_content">
	<?php shell_exec('mpc list Artist > artists.txt'); $file = "artists.txt"; $f = fopen($file, "r") or exit("| Unable to open file!"); while(!feof($f)) { echo fgets($f)."<br />"; } fclose($f); ?>
	<a class="button button-link" href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
</div>
<div id="fade" class="black_overlay"></div>
<div id="light2" class="white_content">
	<?php shell_exec('mpc list Album > albums.txt'); $file = "albums.txt"; $f = fopen($file, "r") or exit("| Unable to open file!"); while(!feof($f)) { echo fgets($f)."<br />"; } fclose($f); ?>
	<a class="button button-link" href="javascript:void(0)" onclick="document.getElementById('light2').style.display='none';document.getElementById('fade2').style.display='none'">Close</a>
</div>
<div id="fade2" class="black_overlay"></div>
<div id="light3" class="white_content">
	<?php shell_exec('mpc lsplaylists > playlists.txt'); $file = "playlists.txt"; $f = fopen($file, "r") or exit("| Unable to open file!"); while(!feof($f)) { echo fgets($f)."<br />"; } fclose($f); ?>
	<a class="button button-link" href="javascript:void(0)" onclick="document.getElementById('light3').style.display='none';document.getElementById('fade3').style.display='none'">Close</a>
</div>
<div id="fade3" class="black_overlay"></div>
</div>

// This is the start of the "Music Tree". It goes "Artists -> Albums -> Songs".
<div id="light4" class="white_content">
	<a class="button button11" href="javascript:void(0)" onclick="document.getElementById('light5').style.display='block';document.getElementById('fade5').style.display='block'">Artist 1</a><br/>
	<a class="button button11" href="javascript:void(0)" onclick="document.getElementById('light7').style.display='block';document.getElementById('fade7').style.display='block'">Artist 2</a><br/>
	<a class="button button-link" href="javascript:void(0)" onclick="document.getElementById('light4').style.display='none';document.getElementById('fade4').style.display='none'">Close</a>
</div>
<div id="fade4" class="black_overlay"></div>
<div id="light5" class="white_content">
	<a class="button button11" href="javascript:void(0)" onclick="document.getElementById('light6').style.display='block';document.getElementById('fade6').style.display='block'">Album 1 From Artist 1</a><br/>
	<a class="button button-link" href="javascript:void(0)" onclick="document.getElementById('light5').style.display='none';document.getElementById('fade5').style.display='none'">Close</a>
</div>
<div id="light7" class="white_content">
	<a class="button button11" href="javascript:void(0)" onclick="document.getElementById('light8').style.display='block';document.getElementById('fade8').style.display='block'">Album 1 From Artist 2</a><br/>
	<a class="button button-link" href="javascript:void(0)" onclick="document.getElementById('light7').style.display='none';document.getElementById('fade7').style.display='none'">Close</a>
</div>
<div id="light6" class="white_content">
	<a onclick="XXX.paused?XXX.play():XXX.pause()"><audio id="XXX" src="/path/to/song1"></audio>Song 1 of Album 1 of Artist 1</a><br/>
	<a onclick="XXY.paused?XXY.play():XXY.pause()"><audio id="XXY" src="/path/to/song2"></audio>Song 2 of Album 1 of Artist 1</a><br/>
	<a class="button button-link" href="javascript:void(0)" onclick="document.getElementById('light6').style.display='none';document.getElementById('fade6').style.display='none'">Close</a>
</div>
<div id="light8" class="white_content">
	<a onclick="XXZ.paused?XXZ.play():XXZ.pause()"><audio id="XXZ" src="/path/to/song1"></audio>Song 1 of Album 1 of Artist 2</a><br/>
	<a class="button button-link" href="javascript:void(0)" onclick="document.getElementById('light8').style.display='none';document.getElementById('fade8').style.display='none'">Close</a>
</div>
// This is the end of the "Music Tree".
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
    <button class="button button1" type="submit" name="button">Play/Pause Music (mpd)</button>
</form>

<form class="buttons" action="" method="post">
    <a class="button button11" href="javascript:void(0)" onclick="document.getElementById('light4').style.display='block';document.getElementById('fade4').style.display='block'">Play Song (Web Server)</a>
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
// JS for show/hiding divs. START
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
// JS for show/hiding divs. END

// JS for clearing default text in input boxes. START
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

function cancelEventSafari() {
    return false;        
}

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

function disableTestLinks() {
  var pageLinks = document.getElementsByTagName('a');
  for (var i=0; i<pageLinks.length; i++) {
    if (pageLinks[i].href.match(/[^#]#$/)) {
      addEvent(pageLinks[i], 'click', knackerEvent, false);
    }
  }
}

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
// JS for clearing default text in input boxes. END
</script>
