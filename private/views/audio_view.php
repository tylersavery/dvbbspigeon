<script type="text/javascript">
$(document).ready(function(){
	
	
	if(!!document.createElement('audio').canPlayType) {
	
	  var player = '<audio id="audio_player">\
		  <source src="/audio/theshore.mp3" type="audio/ogg"></source>\
		  <source src="/audio/theshore.mp3" type="audio/mpeg"></source>\
		  <source src="/audio/theshore.mp3" type="audio/x-wav"></source>\
		</audio>';
	
		$(player).insertAfter("#player_container");
		
		
		
		audio = $('#audio_player').get(0);
		loadingIndicator = $('.player #loading');
		positionIndicator = $('.player #handle');
		timeleft = $('.player #timeleft');
		manualSeek = false;
		loaded = false;
			
		if ((audio.buffered != undefined) && (audio.buffered.length != 0)) {
		  $(audio).bind('progress', function() {
			var loaded = parseInt(((audio.buffered.end(0) / audio.duration) * 100), 10);
			loadingIndicator.css({width: loaded + '%'});
		  });
		}
		else {
		  loadingIndicator.remove();
		}
		

		
		$(audio).bind('timeupdate', function() {
    
			var rem = parseInt(audio.duration - audio.currentTime, 10),
			pos = (audio.currentTime / audio.duration) * 100,
			mins = Math.floor(rem/60,10),
			secs = rem - mins*60;
				
			timeleft.text('-' + mins + ':' + (secs > 9 ? secs : '0' + secs));
			if (!manualSeek) { positionIndicator.css({left: pos + '%'}); }
			if (!loaded) {
			  loaded = true;
				  
			  $('.player #gutter').slider({
				value: 0,
				step: 0.01,
				orientation: "horizontal",
				range: "min",
				max: audio.duration,
				animate: true,          
				slide: function() {             
				  manualSeek = true;
				},
				stop:function(e,ui) {
				  manualSeek = false;         
				  audio.currentTime = ui.value;
				}
			  });
			  
			  
			
			  
			}
		  
		  });
		
		
		
		$(audio).bind('play',function() {
			$("#playtoggle").addClass('playing');   
		  }).bind('pause ended', function() {
			$("#playtoggle").removeClass('playing');    
		  });   
			  
		$("#playtoggle").click(function() {     
			if (audio.paused) { audio.play(); } 
			else { audio.pause(); }     
		});
		
	
				  
		
	
	}
	
	
		$('#volume_gutter').slider({
			orientation: "vertical",
			value: 86,
			min: 0,
			max: 100,
			step: 5,
			range: "min",
			slide: function(event, ui) {
				//$("#volume_handle").css('bottom', ui.value + 'px');
			}
			
		});
	
	
	
	


});


</script>



<style type="text/css">

.player {
	display: block;
	height: 48px;
	width: 400px;
	position: absolute;
	top: 349px;
	left: -1px;
	-webkit-box-shadow: 0 -1px 0 rgba(20, 30, 40, .75);
	-moz-box-shadow: 0 -1px 0 rgba(20, 30, 40, .75);
	-o-box-shadow: 0 -1px 0 rgba(20, 30, 40, .75);
	box-shadow: 0 -1px 0 rgba(20, 30, 40, .75);
	border-top: 1px solid #c2cbd4;
	border-bottom: 1px solid #283541;
	background: #939eaa;
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(174, 185, 196, .9)), to(rgba(110, 124, 140, .9)), color-stop(.5, rgba(152, 164, 176, .9)),color-stop(.501, rgba(132, 145, 159, .9)));
	background: -moz-linear-gradient(top, rgba(174, 185, 196, .9), rgba(152, 164, 176, .9) 50%, rgba(132, 145, 159, .9) 50.1%, rgba(110, 124, 140, .9));
	background: linear-gradient(top, rgba(174, 185, 196, .9), rgba(152, 164, 176, .9) 50%, rgba(132, 145, 159, .9) 50.1%, rgba(110, 124, 140, .9));
	cursor: default;
}

#playtoggle {
	position: absolute;
	top: 9px;
	left: 10px;
	width: 30px;
	height: 30px;
	background: url(/images/player.png) no-repeat -30px 0;
	cursor: pointer;
}

#playtoggle.playing {
	background-position: 0 0;
}

#playtoggle:active {
	top: 10px;
}

#timeleft {
	line-height: 48px;
	position: absolute;
	top: 0;
	right: 0;
	width: 50px;
	text-align: center;
	font-size: 11px;
	font-weight: bold;
	color: #fff;
	text-shadow: 0 1px 0 #546374;
}

#wrapper #timeleft {
	right: 40px;
}


#volume{
	width:30px;
	height:30px;
	position:absolute;
	top: 10px;
	left:38px;
	
}


#volume_gutter {
	position: absolute;
	bottom:10px;
	left:10px;
	
	height: 90px;
	padding: 2px;
	width:4px;

	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	background: #546374;
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#242f3b), to(#516070));
	background: -moz-linear-gradient(top, #242f3b, #516070);
	background: linear-gradient(top, #242f3b, #516070);
	-webkit-box-shadow: 0 1px 4px rgba(20, 30, 40, .75) inset, 0 1px 0 rgba(176, 187, 198, .5);
	-moz-box-shadow: 0 1px 4px rgba(20, 30, 40, .75) inset, 0 1px 0 rgba(176, 187, 198, .5);
	-o-box-shadow: 0 1px 4px rgba(20, 30, 40, .75) inset, 0 1px 0 rgba(176, 187, 198, .5);
	box-shadow: 0 1px 4px rgba(20, 30, 40, .75) inset, 0 1px 0 rgba(176, 187, 198, .5);
}


#volume_handle {
	position: absolute;
	width: 20px;
	height: 20px;
	margin-left: -8px;
	background: url(/images/player.png) no-repeat -65px -5px;
	cursor: pointer;

}

#gutter {
	position: absolute;
	top: 19px;
	left: 80px;
	right: 50px;
	height: 6px;
	padding: 2px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	background: #546374;
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#242f3b), to(#516070));
	background: -moz-linear-gradient(top, #242f3b, #516070);
	background: linear-gradient(top, #242f3b, #516070);
	-webkit-box-shadow: 0 1px 4px rgba(20, 30, 40, .75) inset, 0 1px 0 rgba(176, 187, 198, .5);
	-moz-box-shadow: 0 1px 4px rgba(20, 30, 40, .75) inset, 0 1px 0 rgba(176, 187, 198, .5);
	-o-box-shadow: 0 1px 4px rgba(20, 30, 40, .75) inset, 0 1px 0 rgba(176, 187, 198, .5);
	box-shadow: 0 1px 4px rgba(20, 30, 40, .75) inset, 0 1px 0 rgba(176, 187, 198, .5);
}

#wrapper #gutter {
	right: 90px;
}

#loading {
	background: #fff;
	background: #939eaa;
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#eaeef1), to(#c7cfd8));
	background: -moz-linear-gradient(top, #eaeef1, #c7cfd8);
	background: linear-gradient(top, #eaeef1, #c7cfd8);
	-webkit-box-shadow: 0 1px 0 #fff inset, 0 1px 0 #141e28;
	-moz-box-shadow: 0 1px 0 #fff inset, 0 1px 0 #141e28;
	-o-box-shadow: 0 1px 0 #fff inset, 0 1px 0 #141e28;
	box-shadow: 0 1px 0 #fff inset, 0 1px 0 #141e28;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
	border-radius: 3px;
	display: block;
	float: left;
	min-width: 6px;
	height: 6px;
}

#handle {
	position: absolute;
	top: -5px;
	left: 0;
	width: 20px;
	height: 20px;
	margin-left: -10px;
	background: url(/images/player.png) no-repeat -65px -5px;
	cursor: pointer;
}


.player a.popup {
	position: absolute;
	top: 9px;
	right: 8px;
	width: 32px;
	height: 30px;
	overflow: hidden;
	text-indent: -999px;
	background: url(/images/player.png) no-repeat -90px 0;
}

.player a.popup:active {
	background-position: -90px 1px;
}




</style>


<div id="player_container">

<div class="player">
  <div id="playtoggle"></div>
  <div id="volume">
	<div id="volume_gutter">
		<span id="volume_handle" class="ui-slider-handle"></span>
	</div>
  </div>
  <div id="gutter">
    <div id="loading"></div>
    <span id="handle" class="ui-slider-handle"></span>
  </div>
  <div id="timeleft"></div>
</div>


</div>