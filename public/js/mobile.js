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

$(document).ready(function(){
    
    set_constants();
    
   push_analytic('visit', '');

   var t = window.setTimeout('hide_menu_bar()', 300);
    
    init_splash();
    
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
    
        $("#blind").fadeTo(300, .8);
        $("#contact_content").fadeIn(500);
    
   });
   
   $("#footer_link_download").click(function(){
    
        $("#blind").fadeTo(300, .8);
        $("#download_content").fadeIn(500);
    
   });
   
   $("#footer_link_credits").click(function(){
    
        $("#blind").fadeTo(300, .8);

        $(".credits_content_scroller").css('top', '420px');
        
        $("#credits_content").show();
        $(".credits_content_scroller").animate({
        
            top: '-550px'
            
        }, 10000, 'linear',  function(){
            
            $("#credits_content").hide();
        
            $("#blind").fadeOut(300);
            
           
            
        });
    
   });
   
   
   
   
});


window.onorientationchange = function() {
    
   var t = window.setTimeout('hide_menu_bar()', 300);
    
}


function hide_menu_bar(){
    
    window.scrollTo(0, 1);
    
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

/*
            $('.player_gutter').slider({
                value: 0,
                step: 0.01,
                orientation: "horizontal",
                range: "min",
                max: audio.duration,
                animate: true,
                slide: function () {
                    manualSeek = true;
                },
                stop: function (e, ui) {
                    manualSeek = false;
                    audio.currentTime = ui.value;
                }
            });
            
*/

        

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
    
    TIME_NOW = new Date().getTime();
    
    
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
     if(current_track == 0){
        current_track = 5;  
     } else if(current_track == 1){
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