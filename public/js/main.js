/* global vars */
var window_width;
var window_height;
var window_aspect;
var screen_width;
var screen_height;

var live_img_width;
var live_img_height;

var manualSeek;
var loaded;
var positionIndicator;
var audio;
var is_playing = false;
var can_play;
var is_mobile;

/* constants */

var IMG_WIDTH;
var IMG_HEIGHT;
var IMG_ASPECT;
var BG_SRC;

/* jQuery Objects */
var $bg;
var $bg_img;
var $wrap;
var $containers;
var $page;
var $menu_items;

$(document).ready(function () {

    get_objects();
    check_if_mobile();
    set_constants();
    //updateOrientation();
    
    set_sizes_and_positions();
    set_can_play();

    init_audio();

     hide_menu_bar();
     


    /* events */

    $(".menu_item .menu_head").mouseenter(function () {

        var $foot = $(this).next('.menu_foot');
        var foot_width = $foot.width();

        if ($foot.is(":hidden")) {

            $foot.css('width', '0px');
            $(".menu_foot_item").hide();
            $foot.show();

            $foot.animate({
                width: foot_width + 'px'

            }, 200, function () {

                // $(".menu_foot_item").fadeIn(300);
                $items = $foot.find('.menu_foot_item');
                $items.hide();

                if ($foot.hasClass('coming')) {

                    $items.css('width', 0);
                    $($items[0]).show();

                    $items.animate({

                        width: '98px'

                    }, 100);

                } else {

                    $items.css('width', 0);
                    $($items[0]).show();

                    $($items[0]).animate({

                        width: '68px'

                    }, 120, 'easeInOutCirc', function () {

                        $($items[1]).show();

                        $($items[1]).animate({

                            width: '68px'

                        }, 120, 'easeInOutCirc', function () {

                            $($items[2]).show();

                            $($items[2]).animate({

                                width: '68px'

                            }, 120, 'easeInOutCirc', function () {

                            });

                        });

                    });


                }


            });


            if ($foot.hasClass("coming")) {

                $strike = $(this).prev('.strikethrough');

                $strike.css('width', '0px');
                $strike.show();
                $strike.animate({
                    width: 126 + 'px'

                }, 200);

            }

        }


    });

    $(".menu_item").mouseleave(function () {

        $(".strikethrough").fadeOut(150);
        $(".menu_foot").fadeOut(150);

    });
    
    
   
    
    $("#download_track").click(function(){
     
          window.location = '/downloads/track.zip';
     
    });
    
    $("#download_stem").click(function(){
     
          window.location = '/downloads/stems.zip';
     
    });


});

$(window).resize(function () {
    set_sizes_and_positions();
    scrollTo(0,1);

});


function get_objects() {

    $bg = $("#background");
    $bg_img = $("#background img");
    $wrap = $(".wrap");

    $containers = $("#background, #background img, .wrap");
    $page = $(".page");

    $menu_items = $(".menu_item");

}

function set_constants() {
     
     
    screen_width = screen.width;
    screen_height = screen.height;
    
    if(screen_width <= 1000){
     //small
          IMG_WIDTH = 1000;
          IMG_HEIGHT = 667;
          
          BG_SRC = '/images/backgrounds/background1_small.jpg';

    } else if(screen_width > 1000 && screen_width < 1600){
     //medium
          IMG_WIDTH = 1600;
          IMG_HEIGHT = 1066;
          
          BG_SRC = '/images/backgrounds/background1_medium.jpg';
     
     
    } else if(screen_width >= 1600){
     // large
          IMG_WIDTH = 2300;
          IMG_HEIGHT = 1533;
          
          BG_SRC = '/images/backgrounds/background1_large.jpg';
     
    }

    
     IMG_ASPECT = IMG_WIDTH / IMG_HEIGHT;
     $bg_img.attr('src', BG_SRC);
}


function set_sizes_and_positions() {

    /* get window w/h */
    window_width = $(window).width();
    window_height = $(window).height();
    
    
    hide_menu_bar();
    
    window_aspect = window_width / window_height;
    
    


    /* set background w/h */

    if (window_aspect > IMG_ASPECT) {

        live_img_width = window_width;
        live_img_height = Math.floor(live_img_width / IMG_ASPECT);

        $containers.css('height', 'auto').css('width', live_img_width + 'px');

        //top needs to be adjusted
        var top = Math.floor((window_height - live_img_height) / 2);

        $wrap.css('top', top + 'px');
        $wrap.css('left', 0);
        
       //$(".track_menu").css('left', '0');

    } else {

        live_img_height = window_height;

        live_img_width = IMG_ASPECT * live_img_height;

        $containers.css('width', 'auto').css('height', live_img_height + 'px');

        //left needs to be adjusted
        var left = Math.floor((window_width - live_img_width) / 2);

        $wrap.css('margin-left', left + 'px');
        $wrap.css('top', 0);
        
       // $(".track_menu").css('left', 0 - left + 'px');
        
    }
    
    
    $page.css('height', window_height);


     //media player
     
     var padding_left = 274;
     var padding_right = 202;
     
     if(is_mobile){
          padding_right = 100;
     }
     
     var gutter_border = 10;
     
     var gutter_width = window_width - padding_left - padding_right - gutter_border;
     
     $(".player_gutter").width(gutter_width + 'px');

}


function init_audio() {

    if ( !! document.createElement('audio').canPlayType) {

        var player = '<audio id="audio_player">\
		  <source src="/audio/theshore.mp3" type="audio/ogg"></source>\
		  <source src="/audio/theshore.mp3" type="audio/mpeg"></source>\
		  <source src="/audio/theshore.mp3" type="audio/x-wav"></source>\
		</audio>';

        $(player).insertAfter(".player");

        audio = $('#audio_player').get(0);
        //loadingIndicator = $('.player #loading');
        positionIndicator = $('.player_handle');
        //timeleft = $('.player #timeleft');
        manualSeek = false;
        loaded = false;
        audio.volume = 0.5;


     /*     
     //loading audio file
		if ((audio.buffered != undefined) && (audio.buffered.length != 0)) {
		  $(audio).bind('progress', function() {
			var loaded = parseInt(((audio.buffered.end(0) / audio.duration) * 100), 10);
			//loadingIndicator.css({width: loaded + '%'});
		  });
		}
		else {
		 // loadingIndicator.remove();
		}
       */

        // audio.play();


        $(audio).bind('timeupdate', function () {

            var rem = parseInt(audio.currentTime, 10),
                pos = (audio.currentTime / audio.duration) * 100,
                mins = Math.floor(rem / 60, 10),
                secs = rem - mins * 60;
            $(".player_time_current").text(mins + ':' + (secs > 9 ? secs : '0' + secs));

          
            var total_time = secondsToTime(audio.duration);

            $(".player_time_total").text(total_time.m + ':' + total_time.s);

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

            }
            

        });


        $(".player_play").click(function () {
          
          if(!can_play){
               
               alert('Your browser does not support audio. Please download the track instead.');
               
               return false;
          }
          

          if(!is_playing){
            audio.play();
            $(".player_play").addClass('pause');
            is_playing = true;
          } else {
               audio.pause();
               $(".player_play").removeClass('pause');
               is_playing = false;
          }

        });
        
        
        
         $("#play_track").click(function(){
     
          if(!can_play){
               
               alert('Your browser does not support audio. Please download the track instead.');
               
               return false;
          }
          
          
          if(!is_playing){
            audio.play();
            $(".player_play").addClass('pause');
            is_playing = true;
          } else {
               audio.pause();
               $(".player_play").removeClass('pause');
               is_playing = false;
          }
     /*
          //if(!is_playing){
          audio.currentTime = 0;
          audio.play();
          audio.volume = .5;
          $(".player_play").addClass('pause');
          //}
     */
     
      });
        
        
        
        $('.player_volume_gutter').slider({
                    value: .5,
                    step: .1,
                    orientation: "horizontal",
                    range: "min",
                    max: 1,
                    animate: true,
                    slide: function (e, ui) {
                        //manualSeek = true;
                        
                        audio.volume = ui.value;
                    },
                    stop: function (e, ui) {
                        //manualSeek = false;
                        //audio.currentTime = ui.value;
                    }
          });
 
    }
}



function set_can_play() {
     
     if($("html").hasClass('audio')){
          can_play = true;
     } else {
          can_play = false;
     }
     
     
     
}

function check_if_mobile() { 

     if( navigator.userAgent.match(/Android/i) ||
      navigator.userAgent.match(/webOS/i) ||
      navigator.userAgent.match(/iPhone/i) ||
      navigator.userAgent.match(/iPod/i)
      ){
          is_mobile = true;
          return true;
     }
     
     is_mobile = false;
     
     return false;

}

function hide_menu_bar() {
     
     if(is_mobile){
          
          //alert(updateOrientation());
          
          if(screen_height > screen_width){
       
               window_height = screen_height + 65;
       
          } else {
               
               window_height = screen_width;
          
               
          }
       
       window.scrollTo(0,1);
       
     }
}


  

function updateOrientation(){
    var contentType = "show_";
    switch(window.orientation){
        case 0:
	contentType += "normal";
	break;

	case -90:
	contentType += "right";
	break;

	case 90:
	contentType += "left";
	break;

	case 180:
	contentType += "flipped";
	break;
    }
    document.getElementById("html").setAttribute("class", contentType);
    
    return contentType;
}


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