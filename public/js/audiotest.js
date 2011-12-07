
<script type="text/javascript">






	function loadPlayer() {
        var audioPlayer = new Audio();
        audioPlayer.controls="controls";
        audioPlayer.addEventListener('ended',nextSong,false);
        audioPlayer.addEventListener('error',errorFallback,true);
        document.getElementById("player").appendChild(audioPlayer);
        nextSong();
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
            nextSong();
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
        nextSong();
		
		return false;
    }
 
    var urls = new Array();
		
		<?
		$i = 0;
		foreach($this->audios as $audio):
			
		echo "urls[". $i ."] = '". $audio->get_permalink() ."';\n\t\t";
			
			$i++;
		endforeach; ?>
	
		var next = 0;

</script>