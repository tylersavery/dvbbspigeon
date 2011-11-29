<script type="text/javascript">
	
$(document).ready(function(){
		
	loadPlayer();	
	//playPause();
		
});
	
	var urls = new Array();
    var mp3_urls = new Array();
	var ogg_urls = new Array();
	
	var next = 0;
	
	<?php
	$i = 0;
	foreach($this->audios as $audio){
		echo "mp3_urls[". $i ."] = '". $audio->get_permalink() ."';\n\t\t";
		echo "ogg_urls[". $i ."] = '". $audio->get_ogg_permalink() ."';\n\t\t";
		$i++;
	}
	?>
	
	
	function loadPlayer() {
        var audioPlayer = new Audio();
        audioPlayer.controls="controls";
        audioPlayer.addEventListener('ended',nextSong,false);
        audioPlayer.addEventListener('error',errorFallback,true);
        document.getElementById("player").appendChild(audioPlayer);
        
		var canPlayMp3 = !!audioPlayer.canPlayType && "" != audioPlayer.canPlayType('audio/mpeg');
		var canPlayOgg = !!audioPlayer.canPlayType && "" != audioPlayer.canPlayType('audio/ogg; codecs="vorbis"');
		
		if(canPlayMp3){
			urls = mp3_urls;
		} else if(canPlayOgg){
			urls = ogg_urls;
		} else {
			alert("CAN'T PLAY AUDIO");
		}
		
		//nextSong();
		
    }
	
    function nextSong() {
		
        if(urls[next]!=undefined) {
            var audioPlayer = document.getElementsByTagName('audio')[0];
            if(audioPlayer!=undefined) {
				
                audioPlayer.src=urls[next];
                
				audioPlayer.load();
                audioPlayer.play();
                next++;
				
            } else {
                loadPlayer();
            }
        } else {
            pickSong(0);
        }
		
		return false;
    }
	
    function errorFallback() {
		//alert("ERROR");
        // nextSong();
    }
	
    function playPause() {
        var audioPlayer = document.getElementsByTagName('audio')[0];
        if(audioPlayer!=undefined) {
            if (audioPlayer.paused) {
                audioPlayer.play();
            } else {
                audioPlayer.pause();
            }
        } else {
            loadPlayer();
        }
		
		return false;
	
    }
	
    function pickSong(num) {
        next = num;
		//playPause();
        nextSong();
		
		return false;
    }	
	
	
</script>


<div id="player"></div>


<a href='#' onclick='playPause()'>Play / Pause!</a>
<a href='#' onclick='nextSong()'>Next!</a>



<?
$i = 0;
foreach($this->audios as $audio): ?>
	<div onclick="pickSong(<?= $i; ?>)"><?= $audio->get_title();?></div>
<?
$i++;
endforeach; ?>

