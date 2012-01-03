var audio;
var positionIndicator;
var manualSeek;
var loaded;
var current_track;
var sources = new Array();
var titles = new Array();

var window_height;
var window_width;

var can_play = true;
var is_playing = false;

var play_from = false;



$(document).ready(function () {
   
   set_constants();   
   
   
   show_header();
   
   set_sizes_and_positions();
   
   
   check_audio_from_session();
   
    $(".player_play").click(function () {


        if (current_track == 0) {
            current_track = 1;
            
        }


        if (!can_play) {

            alert('Your browser does not support audio. Please download the track instead.');

            return false;
        }


        if (!is_playing) {
            init_audio();
            audio.play();
            $(".player_play").addClass('pause');
            //$("#play_track").text('Pause');
            is_playing = true;
        } else {
            audio.pause();
            $(".player_play").removeClass('pause');
            is_playing = false;
            //$("#play_track").text('Play');
        }

    });






    $(".player_volume_icon").click(function () {

        if ($(this).hasClass('mute')) {

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

    $(".player_next").click(function () {

        next_track();

    });

    $(".player_back").click(function () {

        previous_track();

    });

    
});


function set_constants() {

    current_track = 1;

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
    titles[5] = 'Till I Die';
    titles[6] = 'Here We Go';

}




function init_audio() {
    
    
    if ( !! document.createElement('audio').canPlayType) {

        if ($("#audio_player").length > 0) {

            audio.pause();
            $("#audio_player").remove();
            $(".play_track").text('play');

        }

        var player = '<audio id="audio_player">\
		  <source src="/audio/track' + current_track + '/' + sources[current_track] + '.mp3" type="audio/mpeg"></source>\
          <source src="/audio/track' + current_track + '/' + sources[current_track] + '.ogg" type="audio/ogg"></source>\
		  <source src="/audio/track' + current_track + '/' + sources[current_track] + '.wav" type="audio/x-wav"></source>\
		</audio>';

        $(player).insertAfter(".player");

        audio = $('#audio_player').get(0);
        //loadingIndicator = $('.player #loading');
        positionIndicator = $('.player_handle');
        //timeleft = $('.player #timeleft');
        manualSeek = false;
        loaded = false;

        if ($(".player_volume_icon").hasClass('mute')) {

            audio.volume = 0;

        } else {

            var vol = $(".player_volume_handle").css('left');
            vol = vol.replace('%', '');
            vol = vol.replace('px', '');
            vol = vol / 100;
     
            audio.volume = vol;
        }

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
                        
                        alert(ui.value);
                    }
                });

            }


        });



        $(audio).bind('ended', function () {
            next_track();

        });


        if(play_from){
            
            var t = setTimeout('set_audio_start()', 100);
            
            play_from = false;
            
        } else {

            audio.play();
       
        }
        $(".player_title").text(titles[current_track]);

    }  
    
}









function set_audio_start(){
    
    audio.currentTime = 4;
    audio.play();
    
}

function next_track() {

    if (current_track < (sources.length - 1)) {
        current_track++;
    } else {
        current_track = 1;
    }

    init_audio();

}

function previous_track() {

    if (current_track > 1) {
        current_track--;
    } else {
        current_track = sources.length - 1;
    }

    init_audio();

}

function show_header(){
    
    $(".blog_header").slideDown(800);
    
}

function set_sizes_and_positions(){
    
    window_width = $(window).width();
    window_height = $(window).height();
    
    //media player
    var padding_left = 304;
    var padding_right = 290;
    
    var gutter_border = 10;

    var gutter_width = window_width - padding_left - padding_right - gutter_border;

    $(".player_gutter").width(gutter_width + 'px');
    
}

function check_audio_from_session(){
    
    
    var url_vars = getUrlVars();
    
    var track = getUrlVars()['track'];
    var time = getUrlVars()['time'];
    
    if(track){
        
        current_track = parseInt(track);
        play_from = parseFloat(time);
        
        init_audio();
    
    } 
    
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


function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
