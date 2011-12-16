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
var player_showing = false;
var is_mobile;
var sources = new Array();
var titles = new Array();
var current_track;

/* constants */

var IMG_WIDTH;
var IMG_HEIGHT;
var IMG_ASPECT;
var BG_SRC;
var LOAD_TIME;

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
    
    init_splash();
    
    set_sizes_and_positions();
    set_can_play();

   // init_audio();

     hide_menu_bar();
     


    /* events */

    $(".menu_item .menu_head").mouseenter(function() {

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


         // if ($foot.hasClass("coming")) {

                $strike = $(this).prev('.strikethrough');

                $strike.css('width', '0px');
                $strike.show();
                
                var strike_width = $(this).width();
                
                $strike.animate({
                    width: strike_width + 'px'

                }, 200);

         //   }

        }


    });

    $(".menu_item").mouseleave(function () {

        $(".strikethrough").fadeOut(150);
        $(".menu_foot").fadeOut(150);

    });
    
    
   
    
    $(".download_track").click(function(){
     
          window.location = '/downloads/track.zip';
     
    });
    
    $(".download_stem").click(function(){
     
          window.location = '/downloads/stems.zip';
     
    });
    
    
    $(".close, .blind").click(function(){
     
          $(".contact").fadeOut(500);
          $(".credits").stop().fadeOut(500);
          $(".blind").fadeOut(500);
     
    });
    
    
    $("#contact_link").click(function(){
     
          load_contact();
     
    });
    
    $("#credits_link").click(function(){
     
          load_credits();
     
    });
    
    

     $(".play_track").click(function(){
           
         var rel = parseInt($(this).attr('rel'));
         
         //audio.src = sources[rel];
         
         if(current_track != rel){
              current_track = rel;
              
               $(".player_title").text(titles[current_track]);
              
              if(is_playing){
                    audio.pause();
                    is_playing = false;
              }
              
              init_bg();
              init_audio();
         }
         
         if(!can_play){
              
              alert('Your browser does not support audio. Please download the track instead.');
              
              return false;
         }
         
         
    
         if(!is_playing){
           
              audio.play();
              $(".player_play").addClass('pause');
              $(this).text('Pause');
              is_playing = true;
         
         } else {
         
              audio.pause();
              $(".player_play").removeClass('pause');
              is_playing = false;
              $(this).text('Play');
         
         }
         
         
         
          show_player_and_header();
 
      
    });
    
    
          $(".player_play").click(function () {

               if(current_track == 0){
                    current_track = 1;
                    $("#play_track_1").addClass('pause');
                    $("#play_track_1").text('Pause');
                    
            
                    
                    init_audio();
               }
               
          
          if(!can_play){
               
               alert('Your browser does not support audio. Please download the track instead.');
               
               return false;
          }
          

          if(!is_playing){
               audio.play();
               $(".player_play").addClass('pause');
               $("#play_track").text('Pause');
               is_playing = true;
          } else {
               audio.pause();
               $(".player_play").removeClass('pause');
               is_playing = false;
               $("#play_track").text('Play');
          }

        });
        
          
               
   
        
        
          $(".player_volume_icon").click(function(){
             
             if($(this).hasClass('mute')){
               
               audio.volume = .8;  
               
               $(this).removeClass('mute');
               
             } else {
               
               audio.volume = 0;  
               $(this).addClass('mute');
             
             }
          });
        
        
        $('.player_volume_gutter').slider({
                    value: .8,
                    step: 0.01,
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
        
          $(".player_next").click(function(){
             
             next_track();
               
          });
          
          $(".player_back").click(function(){
             
             previous_track();
               
          });
 


});

$(window).resize(function () {
     
     set_sizes_and_positions();
     scrollTo(0,1);
     setTimeout('set_sizes_and_positions()', 1000);
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
     
     current_track = 0;
     
     sources[0] = null;
     sources[1] = 'dancebitch';
     sources[2] = 'drvgs';
     sources[3] = 'comealive';
     sources[4] = 'sugarcoated';
     sources[5] = 'flashinglights';
     sources[6] = 'longtime';
     
     titles[0] = null;
     titles[1] = 'Dance Bitch';
     titles[2] = 'Drvgs';
     titles[3] = 'Come Alive';
     titles[4] = 'Sugar Coated';
     titles[5] = 'Flashing Lights';
     titles[6] = 'Its Been a Long Time';
     
     
}

function init_bg(){
     
     screen_width = screen.width;
     screen_height = screen.height;
     
     if(screen_width <= 1000){
     //small
          IMG_WIDTH = 1200;
          IMG_HEIGHT = 800;
          
          BG_SRC = '/images/backgrounds/track'+ current_track +'/small.gif';

    } else if(screen_width > 1000 && screen_width < 1600){
     //medium
          IMG_WIDTH = 1200;
          IMG_HEIGHT = 800;
          
          BG_SRC = '/images/backgrounds/track'+ current_track +'/medium.gif';
          
     
    } else if(screen_width >= 1600){
     // large
          IMG_WIDTH = 1920;
          IMG_HEIGHT = 1280;
          
          BG_SRC = '/images/backgrounds/track'+ current_track +'/large.gif';
     
    }
    
     BG_SRC += '?time=' + new Date().getTime();
    
    
     IMG_ASPECT = IMG_WIDTH / IMG_HEIGHT;
     
      $("#splash_img").fadeOut(400, function(){
          
          $("#background").fadeOut(500, function(){
               
               $bg_img.attr('src', '/images/backgrounds/track'+ current_track +'/first_frame.gif');
               
               set_sizes_and_positions();
        
                $('#background').fadeIn(300);
        
               var img = new Image();
               img.src = BG_SRC;
      
               img.onload=function(){
                    
                    $bg_img.attr('src', BG_SRC);
                    //$("#loader").stop().fadeOut(300);
                    $("#splash_img").hide();
     
               }
                                   
          });

     });
     
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
     
     var padding_left = 304;
     var padding_right = 280;
     
     if(is_mobile){
          padding_right = 100;
     }
     
     var gutter_border = 10;
     
     var gutter_width = window_width - padding_left - padding_right - gutter_border;
     
     $(".player_gutter").width(gutter_width + 'px');

}


function init_audio() {

    if ( !! document.createElement('audio').canPlayType) {
     
          if($("#audio_player").length > 0){
           
               audio.pause();
               $("#audio_player").remove();
               $(".play_track").text('play');
               
          }

        var player = '<audio id="audio_player">\
		  <source src="/audio/track'+current_track+'/'+ sources[current_track] +'.mp3" type="audio/mpeg"></source>\
          <source src="/audio/track'+current_track+'/'+ sources[current_track] +'.ogg" type="audio/ogg"></source>\
		  <source src="/audio/track'+current_track+'/'+ sources[current_track] +'.wav" type="audio/x-wav"></source>\
		</audio>';

        $(player).insertAfter(".player");

        audio = $('#audio_player').get(0);
        //loadingIndicator = $('.player #loading');
        positionIndicator = $('.player_handle');
        //timeleft = $('.player #timeleft');
        manualSeek = false;
        loaded = false;
        audio.volume = 0.8;

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
        
        

     $(audio).bind('ended', function(){
        next_track();
          
     });


     audio.play();
     $(".player_title").text(titles[current_track]);

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

function show_player_and_header(){
     
       if(!player_showing){
          
               $(".player").animate({
     
                    bottom : 0
                    
               }, 700, 'easeInOutSine', function(){
            
                    $(".header").css("top", '-100px');
                    $(".header").show();
                    $(".header").animate({
                         
                         top: 0
                         
                         }, 650, 'easeInOutSine');
            
               });
          
          player_showing = true;  
               
         }
     
     
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


function init_splash(){
     
     var $splash_img = $("#splash_img");
     
     var src = new Array();
     var h = new Array();
     var w = new Array();
     
     src[0] = '/images/splash/dvbbs1.gif';
     h[0] = 192;
     w[0] = 500;
     
     src[1] = '/images/splash/dvbbs2.gif';
     h[1] = 778;
     w[1] = 778;
     
     src[2] = '/images/splash/dvbbs3.gif';
     h[2] = 383;
     w[2] = 2305;
     
     
     
     var rand = Math.round(Math.random() * 2);
     var time = new Date();
     time = time.getTime();
     
     
     /* src[0] should be src[rand] */
     
     rand = 0;
     
     $splash_img.attr('src', src[rand] + '?time=' + time).load(function(){
          var margin_top = 0 - Math.round(h[rand] / 2);
          var margin_left = 0 - Math.round(w[rand] / 2);

          $splash_img.css('margin-left', margin_left + 'px');
          $splash_img.css('margin-top', margin_top + 'px');
          $splash_img.css('height', h[rand] + 'px');
          $splash_img.css('width', w[rand] + 'px');

       //   setTimeout(hide_splash, 3000);
       //   setTimeout(hide_logo, LOAD_TIME);
       //   setTimeout(ensure_loader_is_gone, LOAD_TIME + 2000);
       
          setTimeout(enter_player, 3000);
          
     });
     

}


function ensure_loader_is_gone(){
     $("#loader").stop().fadeOut(300);
}

function hide_splash(){
     
     //$("#loader").fadeIn(300);
     
     
     //$(".splash").fadeTo(100, .8, function(){ });
     
}


function hide_logo(){
     
     //$("#loader").fadeOut(500);
     
     $("#splash_img").fadeOut(500, function(){
          
         
          
     });
     
      $(".splash").fadeOut(800, function(){
          
         
         enter_player();
          
     });
     
}


function enter_player() {
     
     //$("#loader").fadeOut(500);
     
     var i = 500;
          var items = $(".track_menu .menu_item");
          
          $(items[0]).animate({ left: 0 }, 300, 'easeOutSine', function(){
               $(items[1]).animate({ left: 0 }, 300, 'easeOutSine', function(){
                    $(items[2]).animate({ left: 0 }, 300, 'easeOutSine', function(){
                         $(items[3]).animate({ left: 0 }, 300, 'easeOutSine', function(){
                              $(items[4]).animate({ left: 0 }, 300, 'easeOutSine', function(){
                                   $(items[5]).animate({ left: 0 }, 300, 'easeOutSine', function(){
               
               
                                        
                                        
                                        
               
               
                                   });
                              });
                         });
                    });
               });
          }); // end crazy animation loop
     
     
      
     
   
     
     
     
     
}


function load_contact(){
     
     $(".blind").fadeTo(1000, .8, function(){
     
          $(".contact").fadeIn();
          
     });
     
     
}

function load_credits(){
     
     $(".credits").css('top', window_height - 20 + 'px');
     
     $(".blind").fadeTo(1000, .8, function(){
     
          $(".credits").show();
          $(".credits").animate({
          
               top: '0px'
               
          }, 12000, 'easeInOutQuad');
          
     });
     
     
}


function next_track(){
     
     if(current_track < (sources.length - 1)){
          current_track++;
     } else {
          current_track = 1;
     }
     
     init_bg();
     init_audio();
     
}

function previous_track(){
     
     if(current_track > 1){
          current_track--;
     } else {
          current_track = sources.length - 1;
     }
     
     init_bg();
     init_audio();
     
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