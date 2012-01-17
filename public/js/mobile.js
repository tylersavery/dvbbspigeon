var current_track;
var sources = new Array();
var TIME_NOW;
var audio;
var positionIndicator;
var manualSeek;
var loaded;
var playing = false;
var cued = false;
var BG_SRC;

var hayley_showing = false;

var window_width;
var window_height;
var track_lengths = new Array();

var IMG_ASPECT;

$(document).ready(function(){
    
    set_constants();
    
   push_analytic('visit', '');

   var t = window.setTimeout('hide_menu_bar()', 300);
    
    init_splash();
	
	var h = window.setInterval('hayley()', 5000);
	
    
   $(".menu_item").click(function(){
    
        var rel = $(this).attr('rel');
        
        current_track = rel;
        
        init_audio();
        
        init_bg();
        
   });
   
   
   $(".player_play").click(function(){
     
        if(current_track == 0){
            current_track = 1;
            init_audio();
            init_bg();
        }
     
        if(playing){
           audio.pause();
        } else {
           audio.play();
        }
     
   });
   
   $(".player_back").click(function(){
    
        previous_track();
    
   });
   
   $(".player_next").click(function(){
    
        next_track();
    
   });
   
   $(".close").click(function(){
    
        $("#blind").fadeOut(300);
        $("#contact_content").fadeOut(200);
        $("#download_content").fadeOut(200);
        $("#credits_content").fadeOut(200);
    
   });
   
   $("#footer_link_contact").click(function(){
    
		set_blind_size();
	
        $("#blind").fadeTo(300, .8);
        $("#contact_content").fadeIn(500);
	
   });
   
   $("#footer_link_download").click(function(){

		set_blind_size();
		

	
		
		$("#download_content").height(screen.height);
        $("#blind").fadeTo(300, .8);
        $("#download_content").fadeIn(500);
    
   });
   
   $("#footer_link_credits").click(function(){
    
		set_blind_size();
		
		
        $("#blind").fadeTo(300, .8);
		

        $(".credits_content_scroller").css('top', '420px');
        $("#credits_content").height($(document).height());
        $("#credits_content").show();
        $(".credits_content_scroller").animate({
        
            top: '-550px'
            
        }, 10000, 'linear',  function(){
            
            $("#credits_content").hide();
        
            $("#blind").fadeOut(300);
            
           
            
        });
    
   });
   
   $("#footer_link_blog").click(function(){
	
		window.location = '/blog';
	
   });
   
   
   
   
});


window.onorientationchange = function() {
    
   var t = window.setTimeout('hide_menu_bar()', 300);
    
	set_blind_size();
	
}

window.onresize = function(){
	
	resize();
	
};


function set_blind_size(){
	
	if(window.innerHeight < window.innerWidth){
		var w = screen.height;
		var h = screen.width;
	} else {
		var w = screen.width;
		var h = screen.height;
	}
		
	$("#blind").width(w);
	$("#blind").height(h);
	
	
	$(".credits_content_scroller, #credits_content").width(w);
	$(".credits_content_scroller, #credits_content").height(h);
	
}

function hayley(){
	
	if(hayley_showing){
		hayley_showing = false;
		
		$("#hayley").fadeOut(300, function(){
			
			$("#drvgs").fadeIn(300);
			
		});
		
	} else {
		hayley_showing = true;
		
		$("#drvgs").fadeOut(300, function(){
			
			$("#hayley").fadeIn(300);
			
		});
		
	}
	
}

function hide_menu_bar(){
    
    window.scrollTo(0, 1);
	
		resize();
    
}

function init_audio(){
    
    if ($("#audio_player").length > 0) {

            audio.pause();
            $("#audio_player").remove();
    }
    
    var player = '<audio id="audio_player">\
		  <source src="/audio/track' + current_track + '/' + sources[current_track] + '.mp3" type="audio/mpeg"></source>\
          <source src="/audio/track' + current_track + '/' + sources[current_track] + '.ogg" type="audio/ogg"></source>\
		  <source src="/audio/track' + current_track + '/' + sources[current_track] + '.wav" type="audio/x-wav"></source>\
		</audio>';
    
    $(player).insertAfter("#player");
    audio = $('#audio_player').get(0);
    positionIndicator = $('.player_handle');
    manualSeek = false;
    loaded = false;

    $(audio).bind('timeupdate', function () {

        var rem = parseInt(audio.currentTime, 10),
            pos = (audio.currentTime / audio.duration) * 100,
            mins = Math.floor(rem / 60, 10),
            secs = rem - mins * 60;
            
        $(".player_time_current").text(mins + ':' + (secs > 9 ? secs : '0' + secs));

        var total_time = secondsToTime(audio.duration);
        
        if(isNumber(total_time.s)){
            $(".player_time_total").text(total_time.m + ':' + total_time.s);
        }

        if (!manualSeek) {
            positionIndicator.css({
                left: pos + '%'
            });
        }
        if (!loaded) {
            loaded = true;


            $('.player_gutter').slider({
                value: 0,
                step: 0.01,
                orientation: "horizontal",
                range: "min",
                max: track_lengths[current_track],
                animate: true,
                slide: function () {
                    manualSeek = true;
                },
                stop: function (e, ui) {
                    manualSeek = false;
                    audio.currentTime = ui.value;
                }
            });
			

        }


    });
    
    
 
    
    $(audio).bind('ended', function () {
        next_track();
    });
    
    $(audio).bind('play', function () {
        $(".player_play").addClass('pause');
        playing = true;
        
        $(".menu_item").removeClass('playing'); 
        $("#menu_item_" + current_track).addClass('playing');
		
		push_analytic('play', current_track);
		
        
    });
    
    $(audio).bind('pause', function () {
        $(".player_play").removeClass('pause');
        playing = false;
    });
    
    audio.play();

    
    
    
    
}


function set_constants(){
    
    current_track = 0;

    sources[0] = null;
    sources[1] = 'dancebitch';
    sources[2] = 'drvgs';
    sources[3] = 'comealive';
    sources[4] = 'sugarcoated';
    sources[5] = 'flashinglights';
    sources[6] = 'longtime';
	
	track_lengths[1] = 174.17068481445312;
	track_lengths[2] = 280.427490234375;
	track_lengths[3] = 200.62413024902344;
	track_lengths[4] = 173.12818908691406;
	track_lengths[5] = 216.57437133789062;
	track_lengths[6] = 198.6173095703125;
	
    
    TIME_NOW = new Date().getTime();

	IMG_ASPECT = 320 / 213;
    
    
}


function next_track() {

    if (current_track == 4){
     current_track = 6
    } else if(current_track == 6){
     current_track = 5;
    } else if(current_track == 5){
     current_track = 1
    } else {
        current_track++;
    }

    init_bg();
    init_audio();

}

function previous_track() {
     if(current_track == 1){
          current_track = 5;
     } else if(current_track == 5){
          current_track = 6;
     } else if(current_track == 6){
          current_track = 4;
     } else {
          current_track--;
     }



    init_bg();
    init_audio();

}



function init_bg(){
    
    BG_SRC = '/images/backgrounds/track' + current_track + '/mobile.gif?time=' + TIME_NOW;

    $("#splash").fadeOut(400, function () {
       
       $("#background").fadeOut(500, function () {
        
            var temp_image = new Image();
            temp_image.src = '/images/backgrounds/track' + current_track + '/first_frame_small.gif?time=' + TIME_NOW;
            
            temp_image.onload = function(){
              
                $("#bg_image").attr('src', temp_image.src);
                
                $('#background').fadeIn(300);
                
                var img = new Image();
                img.src = BG_SRC;
   
                img.onload = function () {
                   $("#bg_image").attr('src', BG_SRC);
                }
                
            };
                
        
       });
        
        
    });
   
    
}


function init_splash(){
    
    var splash_img = new Image();
    splash_img.src = '/images/splash/mobile.gif?time=' + TIME_NOW;
    
    splash_img.onload = function(){
        
        $("#splash_image").attr('src', splash_img.src);
        
    }
    
}


function resize(){

	window_width = $(window).width();
	window_height = $(window).height();
	
	
	if(window.innerHeight < window.innerWidth){
		//landscape	
		
		var padding_left = 80;
		var padding_right = 80;
		
		var content_width = window_width - padding_left - padding_right;
		
		$("#player").width(content_width);
		$("#background").width(content_width);
		
		
		var img_height = content_width / IMG_ASPECT;
		$("#bg_image").width(content_width);
		$("#bg_image").height(img_height);
		
		var splash_left = Math.floor((content_width - 250) / 2) + 80;
		$("#splash").css('left', splash_left + 'px');
		
		
		
	} else {
		//portrait
		
		var padding_left = 0;
		var padding_right = 0;
		
		var content_width = window_width - padding_left - padding_right;
		
		$("#player").width(content_width);
		$("#background").width(content_width);
		
		
		var img_height = content_width / IMG_ASPECT;
		$("#bg_image").width(content_width);
		$("#bg_image").height(img_height);
		
		var splash_left = 34;
		$("#splash").css('left', splash_left + 'px');
	
	}
	

	set_blind_size();
}

function push_analytic(key, value){
     
     var datastring = "key=" + key + "&value=" + value + "&mobile=1";
     
	 
     $.ajax({
            url: "/ajax/post/analytic",
            type: "POST",
            data: datastring,
            success: function(d) {
				
               
               
            }
        });
     
}


/* HELPERS */



function secondsToTime(secs) {
    var hours = Math.floor(secs / (60 * 60));

    var divisor_for_minutes = secs % (60 * 60);
    var minutes = Math.floor(divisor_for_minutes / 60);

    var divisor_for_seconds = divisor_for_minutes % 60;
    var seconds = Math.ceil(divisor_for_seconds);

    var obj = {
        "h": hours,
        "m": minutes,
        "s": seconds
    };
    return obj;
}


function isNumber (o) {
 return ! isNaN (o-0);
}