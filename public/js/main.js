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
var keep_vimeo_up = false;
var vimeo_showing = false;
var speed_bps = null;
var facebook = null;
var video_titles = new Array();
var video_ids = new Array();
var video_lengths = new Array();
var video_playing = false;
/* constants */
var IMG_WIDTH;
var IMG_HEIGHT;
var IMG_ASPECT;
var BG_SRC;
var LOAD_TIME;
var IMAGE_SIZE;
var TIME_NOW;
var SPEED_TRESHOLD = 320000;
/* jQuery Objects */
var $bg;
var $bg_img;
var $wrap;
var $containers;
var $page;
var $menu_items;
var $preview;
var vimeo_player;
var froogaloop;
var control_type = 'audio';
var current_video_id = 1;
var killed = false;
var splash_video = false;

var itunes_link = 'http://itunes.apple.com/ca/album/initio-ep/id510436052';


$(document).ready(function () {
    get_objects();
    check_if_mobile();
    check_facebook();
    set_constants();
    set_video_info();
    //updateOrientation();
    init_splash();
    preload();
    //init_vimeo();
    set_sizes_and_positions();
    set_can_play();
    check_browser();
    // init_audio();
    hide_menu_bar();
    push_analytic('visit', '');
    /* events */
    $(".menu_item .menu_head").mouseenter(function () {
        $("#share_widget_container_1").fadeOut(500);
        $("#share_widget_container_2").fadeOut(500);
        $("#share_widget_container_3").fadeOut(500);
        $("#share_widget_container_4").fadeOut(500);
        $("#share_widget_container_5").fadeOut(500);
        $(".hayley").hide();
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
                    $(".hayley").slideDown(250);
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
                                $($items[3]).show();
                                $($items[3]).animate({
                                    width: '68px'
                                }, 120, 'easeInOutCirc', function () {});
                            });
                        });
                    });
                }
            });
            // if ($foot.hasClass("coming")) {
            $strike = $(this).prev('.strikethrough');
            $strike.css('width', '0px');
            $strike.show();
            var strike_width = $(this).width() - 12;
            $strike.animate({
                width: strike_width + 'px'
            }, 200);
            //   }
        }
        var track_number = $(this).attr('rel');
        if (!player_showing) {
            // PREVIEW
            $preview.stop().fadeOut(500, function () {
                var img = new Image();
                img.src = '/images/backgrounds/track' + track_number + '/first_frame_' + IMAGE_SIZE + '.gif';
                img.onload = function () {
                    $preview.attr("src", img.src);
                    $preview.stop().fadeTo(500, .2);
                    set_sizes_and_positions();
                }
            });
        }
    });
    $(".menu_item").mouseleave(function () {
        $(".strikethrough").fadeOut(150);
        $(".menu_foot").fadeOut(150);
        $preview.stop().fadeOut(500, function () {});
    });
    $(".menu_foot_item.itunes").click(function () {});
    $(".menu_foot_item.itunes, #social_itunes, #mixtape_buy").click(function () {
        return true;
        /*
       $(".itunes_coming_soon").fadeIn(600);
       
       var t = window.setTimeout('hide_itunes_coming_soon()', 5000);
       
       return false;
       */
    });
    $(".download_track").click(function () {
        var rel = $(this).attr("rel");
        var file = '';
        switch (rel) {
        case "1":
            file = 'dancebitch.mp3.zip';
            break;
        case "2":
            file = 'drvgs.mp3.zip';
            break;
        case "3":
            file = 'comealive.mp3.zip';
            break;
        case "4":
            file = 'sugarcoated.mp3.zip';
            break;
        case "5":
            file = 'tillidie.mp3.zip';
            break;
        case "6":
            file = 'herewego.mp3.zip';
            break;
        default:
            file = 'dancebitch.mp3.zip';
            break;
        }
        var url = '/downloads/' + file;
        window.location = url;
        push_analytic('download', file);
    });
    $(".download_stem").click(function () {
        var rel = $(this).attr('rel');
        switch (rel) {
        case '1':
            var location = '/downloads/DVBBS - Dance Bitch [Stems].zip';
            break;
        case '2':
            var location = '/downloads/DVBBS - DRVGS [Stems].zip';
            break;
        case '3':
            var location = '/downloads/DVBBS - Come Alive [Stems].zip';
            break;
        case '4':
            var location = '/downloads/DVBBS - Sugar Coated [Stems].zip';
            break;
        case '5':
            var location = '/downloads/DVBBS - Till I Die [Stems].zip';
            break;
        case '6':
            var location = '/downloads/DVBBS - Here We Go [Stems].zip';
            break;
        default:
            var location = '/downloads/DVBBS - DVBBS EP [Stems].zip';
            break;
        }
        window.location = location;
        push_analytic('download', 'stem' + rel);
    });
    $(".close, .blind").click(function () {
        $("#splash_video").hide();
        $(".contact").fadeOut(500);
        $(".tour_lightbox").fadeOut(500);
        $(".download_lightbox").fadeOut(500);
        $(".credits").stop().fadeOut(500);
        $(".blind").fadeOut(500);
        $("#share_widget_container_1").fadeOut(500);
        $("#share_widget_container_2").fadeOut(500);
        $("#share_widget_container_3").fadeOut(500);
        $("#share_widget_container_4").fadeOut(500);
        $("#share_widget_container_5").fadeOut(500);
        $("#share_widget_container_6").fadeOut(500);
        $(".download_lightbox").fadeOut(500);
    });
    $("#contact_link").click(function () {
        load_contact();
    });
    $("#credits_link").click(function () {
        load_credits();
    });
    $("#tour_link").click(function () {
        load_tour();
    });
    $("#menu_head_7").click(function () {
        load_downloads();
        return false;
    });
    $(".play_track, .menu_head").click(function () {
        
        if(splash_video){
            $("#splash_video").fadeOut(300, function(){
               $(this).remove();
               
            });
            splash_video = false;
        }
        
        if($(this).attr('id') == 'menu_head_0'){
            return false;
        }
        
        if ($(this).hasClass('menu_head')) {
            control_type = 'audio';
            kill_vimeo();
        }
        var rel = parseInt($(this).attr('rel'));
        if (rel == 0) {
            return false;
        }
        //audio.src = sources[rel];
        if (current_track != rel) {
            current_track = rel;
            if (control_type != 'video') {
                $(".player_title").text(titles[current_track]);
            }
            if (is_playing) {
                audio.pause();
                is_playing = false;
            }
            init_bg();
            init_audio();
        }
        if (can_play) {
            if (!is_playing) {
                audio.play();
                //control_type = 'audio';
                $(".player_play").addClass('pause');
                $(".menu_head").removeClass('playing');
                $("#menu_head_" + rel).addClass('playing');
                $("#play_track_" + rel).text('Pause');
                is_playing = true;
            } else {
                audio.pause();
                $(".player_play").removeClass('pause');
                is_playing = false;
                $("#play_track_" + rel).text('Play');
            }
        }
        show_player_and_header();
        return true;
    });
    $(".player_play").click(function () {
        if (control_type == 'video') {
            if (!video_playing) {
                vimeo_player.playVideo();
                $(".player_play").addClass('pause');
                $("#play_track").text('Pause');
                video_playing = true;
            } else {
                vimeo_player.pauseVideo();
                $(".player_play").removeClass('pause');
                video_playing = false;
                $("#play_track").text('Play');
            }
            return;
        }
        if (current_track == 0) {
            current_track = 1;
            $("#play_track_1").addClass('pause');
            $("#play_track_1").text('Pause');
            init_audio();
        }
        /*
        if (!can_play) {

            alert('Your browser does not support audio. Please download the track instead.');

            return false;
        }
*/
        if (!is_playing) {
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
        value: .9,
        step: 0.01,
        orientation: "horizontal",
        range: "min",
        max: 1,
        animate: true,
        slide: function (e, ui) {
            //manualSeek = true;
            if (control_type == 'video') {
                var v = Math.round((ui.value) * 100)
                vimeo_player.setVolume(v);
                return;
            }
            audio.volume = ui.value;
        },
        stop: function (e, ui) {
            //manualSeek = false;
            //audio.currentTime = ui.value;
        }
    });
    $(".player_next").click(function () {
        if (control_type == 'video') {
            if (current_video_id == 1) {
                current_video_id = 2;
            } else if (current_video_id == 2) {
                current_video_id = 3;
            } else if (current_video_id == 3){
                current_video_id = 4;
            } else {
                current_video_id = 1;
            }
            load_vimeo(current_video_id);
            return;
        }
        next_track();
    });
    $(".player_back").click(function () {
        if (control_type == 'video') {
            if (current_video_id == 1) {
                current_video_id = 4;
            } else if (current_video_id == 2) {
                current_video_id = 1;
            } else if (current_video_id == 3) {
                current_video_id = 2;
            } else {
                current_video_id = 3;
            }
            load_vimeo(current_video_id);
            return;
        }
        previous_track();
    });
    
    $(".mixtape_download").click(function () {
        $(this).addClass("clicked");
        
        if(!canada){
            window.location = '/DVBBSINITIOEP.zip';
        } else {
            window.open(itunes_link, '_blank');
        }
        push_analytic('download', 'mixtape');
        
        return true;
    });
    /*
    
     $("#mixtape_download_digital").click(function () {
     
          push_analytic('download', 'mixtape');
          
     });
    */
    $("#mixtape_download_stems").click(function () {
        window.location = '/downloads/DVBBS - DVBBS EP [Stems].zip';
        push_analytic('download', 'stems');
    });
    
    /*
    $("#mixtape_download_dj").click(function () {
        $(".mix_coming_soon").fadeIn(600);
        var t = window.setTimeout('hide_mix_coming_soon()', 5000);
        return false;
        /*
          window.location = '/downloads/DVBBS - DVBBS EP [Mix].zip';
          push_analytic('download', 'dj');
          
    });
        */
        
    $("#video1, .menu_foot_item.play_i").click(function () {
        current_video_id = 1;
        load_vimeo(current_video_id);
    });
    $("#video2, .menu_foot_item.play_ii").click(function () {
        current_video_id = 2;
        load_vimeo(current_video_id);
    });
    $("#video3, .menu_foot_item.play_iii").click(function () {
         current_video_id = 3;
        load_vimeo(current_video_id); 
    });
    $("#video4, .menu_foot_item.play_live_video").click(function () {
        current_video_id = 4;
        load_vimeo(current_video_id);
    });
    $(".header .logo").click(function () {
        /*
        if(keep_vimeo_up){
          keep_vimeo_up = false;
          $(this).removeClass("active");
          mute_vimeo_audio();
        } else {
          keep_vimeo_up = true;
          $(this).addClass("active");
          use_vimeo_audio();
        }
        */
    });
    $(".header .logo").mouseout(function () {
        /*
        if(!keep_vimeo_up){
          hide_vimeo();
        }
        */
    });
    $("#blog_link").click(function () {
        load_blog();
    });
    $(".share_track").click(function () {
        var rel = $(this).attr('rel');
        share_track(rel);
    });
    $(".facebook_publish").click(function () {
        var rel = $(this).attr('rel');
        var song_name = track_number_to_name(rel);
        var filename = track_number_to_filename(rel);
        var message = 'D V B B S';
        var name = 'D V B B S ' + song_name;
        var caption = 'Listen Now';
        var description = '';
        var link = 'http://dvbbs.com/#' + rel;
        var picture = 'http://dvbbs.theyoungastronauts.com/images/backgrounds/track' + rel + '/mobile.gif';
        var action_link = 'http://dvbbs.com/#' + rel;
        var action_title = 'D V B B S ' + song_name;
        var audio_src = "http://dvbbs.theyoungastronauts.com/audio/track" + rel + "/" + filename;
        FB.ui({
            method: 'feed',
            source: audio_src,
            message: message,
            name: name,
            description: 'description',
            artist: 'D V B B S',
            caption: caption,
            description: (
            description),
            link: link,
            picture: picture,
            actions: [{
                name: action_title,
                link: action_link
            }],
            user_message_prompt: 'Post to your wall'
        }, function (response) {
            if (response && response.post_id) {
                alert('Post was published.');
            } else {
                alert('Post was not published.');
            }
        });
    });
});
$.extend({
    getUrlVars: function () {
        var vars = [],
            hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < hashes.length; i++) {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    },
    getUrlVar: function (name) {
        return $.getUrlVars()[name];
    }
});
$(window).resize(function () {
    set_sizes_and_positions();
    scrollTo(0, 1);
    setTimeout('set_sizes_and_positions()', 1000);
});

function check_facebook() {
    facebook = $.getUrlVar('f');
    if (facebook == "1") {
        facebook = true;
        $("body").addClass("facebook");
        return true;
    }
    facebook = false;
    return false;
}

function track_number_to_name(num) {
    switch (parseInt(num)) {
    case 1:
        return "Dance Bitch";
        break;
    case 2:
        return "DRVGS";
        break;
    case 3:
        return "Come Alive";
        break;
    case 4:
        return "Sugar Coated";
        break;
    case 5:
        return "Till I Die";
        break;
    case 6:
        return "Here We Go";
        break;
    }
}

function track_number_to_filename(num) {
    switch (parseInt(num)) {
    case 1:
        return "dancebitch.mp3";
        break;
    case 2:
        return "drvgs.mp3";
        break;
    case 3:
        return "comealive.mp3";
        break;
    case 4:
        return "sugarcoated.mp3";
        break;
    case 5:
        return "flashinglights.mp3";
        break;
    case 6:
        return "longtime.mp3";
        break;
    }
}

function get_objects() {
    $bg = $("#background");
    $bg_img = $("#background img");
    $wrap = $(".wrap");
    $containers = $("#background, #background img, .wrap, #preview, #vimeo_player");
    $page = $(".page");
    $menu_items = $(".menu_item");
    $preview = $("#preview");
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
    titles[2] = 'Drvgs <span class="featuring">Ft. Hayley Gene</span>';
    titles[3] = 'Come Alive';
    titles[4] = 'Sugar Coated';
    titles[5] = 'Till I Die';
    titles[6] = 'Here We Go';
    screen_width = screen.width;
    screen_height = screen.height;
    IMAGE_SIZE = 'medium';
    IMG_ASPECT = 12 / 8;
    TIME_NOW = new Date().getTime();
}

function set_video_info() {
    video_titles[0] = '';
    video_titles[1] = 'Video I';
    video_titles[2] = 'Video II';
    video_titles[3] = 'Video III';
    video_titles[4] = 'Live';
    video_ids[0] = '';
    video_ids[1] = 'rWb_ZZ5d0MI';
    video_ids[2] = '4UXmMPyrbJI';
    video_ids[3] = 'HbWmH-IOpog';
    video_ids[4] = 'Qw2cdIMfIPA';
    video_lengths[0] = 0;
    video_lengths[1] = 69;
    video_lengths[2] = 56;
    video_lengths[3] = 103;
    video_lengths[4] = 156;
}

function init_bg() {
    screen_width = screen.width;
    screen_height = screen.height;
    IMG_WIDTH = 1200;
    IMG_HEIGHT = 800;
    IMAGE_SIZE = 'medium';
    if (is_int(speed_bps)) {
        if (speed_bps < SPEED_TRESHOLD) {
            IMG_WIDTH = 900;
            IMG_HEIGHT = 600;
            IMAGE_SIZE = 'small';
        }
    }
    BG_SRC = '/images/backgrounds/track' + current_track + '/' + IMAGE_SIZE + '.gif' + '?time=' + TIME_NOW;;
    IMG_ASPECT = IMG_WIDTH / IMG_HEIGHT;
    $("#splash_img").fadeOut(400, function () {
        $("#background").fadeOut(500, function () {
            $("#vimeo_player_container").hide();
            var temp_image = new Image();
            temp_image.src = '/images/backgrounds/track' + current_track + '/first_frame_medium.gif?time=' + TIME_NOW;
            temp_image.onload = function () {
                $bg_img.attr('src', temp_image.src);
                $('#background').fadeIn(300, function () {
                    $("#vimeo_player_container").show();
                });
                var img = new Image();
                img.src = BG_SRC + '?time=' + TIME_NOW;
                img.onload = function () {
                    $bg_img.attr('src', BG_SRC);
                }
            }
        });
    });
}

function set_sizes_and_positions() {
    /* get window w/h */
    window_width = $(window).width();
    window_height = $(window).height();
    hide_menu_bar();
    if (is_mobile) {
        var track_menu_top = window_height - $(".track_menu").css('height').replace('px', '') - 80;
        $(".track_menu").css('top', track_menu_top + "px");
    }
    window_aspect = window_width / window_height;
    $("#vimeo_player_container").width(window_width + 'px').height(window_height + 'px').css('top', 0).css('left', 0);
    /* set background w/h */
    if (window_aspect > IMG_ASPECT) {
        live_img_width = window_width;
        live_img_height = Math.floor(live_img_width / IMG_ASPECT);
        $containers.css('height', 'auto').css('width', live_img_width + 'px');
        //top needs to be adjusted
        var top = Math.floor((window_height - live_img_height) / 2);
        $wrap.css('top', top + 'px');
        $wrap.css('left', 0);
        $preview.css('top', top + 'px');
        $preview.css('left', 0);
    } else {
        live_img_height = window_height;
        live_img_width = IMG_ASPECT * live_img_height;
        $containers.css('width', 'auto').css('height', live_img_height + 'px');
        //left needs to be adjusted
        var left = Math.floor((window_width - live_img_width) / 2);
        $wrap.css('margin-left', left + 'px');
        $wrap.css('top', 0);
    }
    /*
     
     aspect = w / h;
     w = aspect * h;
     h = w / aspect;
     
    */
    var video_height = 533;
    var video_width = 1280;
    var VIDEO_ASPECT = video_width / video_height;
    var pad = 0;
    if (window_aspect > VIDEO_ASPECT) {
        // $("#vimeo_player").css('width', window_width + 'px');
        $("#my_vimeo_player").css('width', (window_width - pad) + 'px');
        var h = Math.ceil((window_width - pad) / VIDEO_ASPECT);
        //$("#vimeo_player").css('height', h + 'px');
        $("#my_vimeo_player").css('height', (h - pad) + 'px');
    } else {
        // $("#vimeo_player").css('height', window_height + 'px');
        $("#my_vimeo_player").css('height', (window_height - pad) + 'px');
        var w = Math.ceil(VIDEO_ASPECT * (window_height - pad));
        // $("#vimeo_player").css('width', w + 'px');
        $("#my_vimeo_player").css('width', (w - pad) + 'px');
    }
    var extra = w - window_width;
    var m = 0 - Math.floor(extra / 2);
    $("#my_vimeo_player").css('margin-left', m + 'px');
    $page.css('height', window_height);
    //media player
    var padding_left = 304;
    var padding_right = 295;
    if (is_mobile) {
        padding_right = 100;
    }
    var gutter_border = 10;
    var gutter_width = window_width - padding_left - padding_right - gutter_border;
    $(".player_gutter").width(gutter_width + 'px');
    
    //splash video
    var controls_height = 40;
    $("#splash_video").height(window_height + controls_height).width(window_width);
    
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
                    }
                });
            }
        });
        $(audio).bind('ended', function () {
            next_track();
        });
        audio.play();
        if (control_type != 'video') {
            $(".player_title").html(titles[current_track]);
        }
        $(".menu_head").removeClass('playing');
        $("#menu_head_" + current_track).addClass('playing');
        push_analytic('play', current_track);
    } else {
        var sound_cloud_urls = new Array();
        sound_cloud_urls[0] = null;
        sound_cloud_urls[1] = 'http://soundcloud.com/dvbbs/dvbbs-dance-bitch';
        sound_cloud_urls[2] = 'http://soundcloud.com/dvbbs/dvbbs-ft-hayley-gene-drvgs';
        sound_cloud_urls[3] = 'http://soundcloud.com/dvbbs/dvbbs-come-alive';
        sound_cloud_urls[4] = 'http://soundcloud.com/dvbbs/dvbbs-sugar-coated';
        sound_cloud_urls[5] = 'http://soundcloud.com/dvbbs/dvbbs-till-i-die';
        sound_cloud_urls[6] = 'http://soundcloud.com/dvbbs/dvbbs-here-we-go';
        // $(".sc-stratus").remove();
        $.stratus({
            color: '000000',
            links: [{
                url: sound_cloud_urls[current_track]
            }],
            auto_play: true
        });
    }
}

function set_can_play() {
    if ($("html").hasClass('audio')) {
        can_play = true;
    } else {
        can_play = false;
    }
}

function check_if_mobile() {
    if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i)) {
        is_mobile = true;
        return true;
    }
    is_mobile = false;
    return false;
}

function show_player_and_header() {
    if (!player_showing) {
        $(".player").animate({
            bottom: 0
        }, 700, 'easeInOutSine', function () {
            //$(".header").css("top", '-100px');
            //$(".header").show();
            $(".header").animate({
                top: 0
            }, 650, 'easeInOutSine');
        });
        player_showing = true;
    }
}

function hide_menu_bar() {
    if (is_mobile) {
        //alert(updateOrientation());
        if (screen_height > screen_width) {
            window_height = screen_height + 65;
        } else {
            window_height = screen_width;
        }
        window.scrollTo(0, 1);
    }
}

function init_splash() {
    
    //$("#splash_video").
    
    var $splash_img = $("#splash_img");
    var src = new Array();
    var h = new Array();
    var w = new Array();
    var s = new Array();
    var swap = new Array();
    if (facebook) {
        src[0] = '/images/splash/dvbbs1f.gif';
        h[0] = 115;
        w[0] = 300;
        s[0] = 76000;
        src[1] = '/images/splash/dvbbs3f.gif';
        h[1] = 159;
        w[1] = 700;
        s[1] = 54000;
    } else {
        src[0] = '/images/splash/dvbbs1.gif';
        swap[0] = '/images/splash/dvbbs1.png';
        h[0] = 192;
        w[0] = 500;
        s[0] = 168103;
        src[1] = '/images/splash/dvbbs3.gif';
        swap[1] = '/images/splash/dvbbs3.png';
        h[1] = 144;
        w[1] = 989;
        s[1] = 78893;
    
    }
    
    
    
    var download_start = (new Date()).getTime();
    var rand = Math.round(Math.random());
    rand = 0;
    current_swap = swap[rand];
    var img_loading = new Image();
    img_loading.src = src[rand] + '?time=' + TIME_NOW;
    img_loading.onload = function () {
        var download_end = (new Date()).getTime();
        var duration = Math.round((download_end - download_start) / 1000);
        var bitsLoaded = s[rand] * 8;
        speed_bps = Math.round(bitsLoaded / duration);
        $splash_img.show();
        $splash_img.attr('src', src[rand] + '?time=' + TIME_NOW).load(function () {
            var margin_top = 0 - Math.round(h[rand] / 2);
            var margin_left = 0 - Math.round(w[rand] / 2);
            $splash_img.css('margin-left', margin_left + 'px');
            $splash_img.css('margin-top', margin_top + 'px');
            $splash_img.css('height', h[rand] + 'px');
            $splash_img.css('width', w[rand] + 'px');
            splash_video = true;
            
            window.setTimeout(swap_splash_with_png, 5000);
            
            
        });
    }
    setTimeout(enter_player, 3500);
}

var current_swap;

function swap_splash_with_png(){
    return false;
    console.log(current_swap);
    var png = new Image();
    png.src = current_swap;
    
    png.onload = function() {
        $("#splash_img").attr('src', png.src);
    }
    
}

function enter_splash_video(){
    
    
    $("#splash_video").fadeIn(300);
    
    

}

function ensure_loader_is_gone() {
    $("#loader").stop().fadeOut(300);
}

function hide_logo() {
    $("#splash_img").fadeOut(500, function () {});
    $(".splash").fadeOut(800, function () {
        enter_player();
    });
}

function enter_player() {
    var i = 500;
    var items = $(".track_menu .menu_item");
    if (is_mobile) {
        $(items).css('left', 0);
        return;
    }
    $(items[0]).animate({
        left: 0
    }, 300, 'easeOutSine', function () {
        $(items[1]).animate({
            left: 0
        }, 300, 'easeOutSine', function () {
            $(items[2]).animate({
                left: 0
            }, 300, 'easeOutSine', function () {
                $(items[3]).animate({
                    left: 0
                }, 300, 'easeOutSine', function () {
                    $(items[4]).animate({
                        left: 0
                    }, 300, 'easeOutSine', function () {
                        $(items[5]).animate({
                            left: 0
                        }, 300, 'easeOutSine', function () {
                            $(items[6]).animate({
                                left: 0
                            }, 300, 'easeOutSine', function () {
                                $(items[7]).animate({
                                    left: 0
                                });
                                check_for_hash();
                            });
                        });
                    });
                });
            });
        });
    }); // end crazy animation loop
}

function load_contact() {
    $(".close").hide();
    $(".credits").fadeOut(300);
    $(".tour_lightbox").fadeOut(300);
    $(".blind").fadeTo(1000, .8, function () {
        $(".contact").fadeIn(300, function () {
            var offset = $(".contact").offset();
            var x = offset.left + $(".contact").width() - 40;
            var y = offset.top - 30;
            $(".blind .close").css("left", x + "px").css("top", y + "px");
            $('.close').fadeIn(300);
        });
    });
}

function load_credits() {
    
    $(".contact").fadeOut(300);
    $(".tour_lightbox").fadeOut(300);
    $(".credits").css('top', window_height - 10 + 'px');
    $(".close").hide();
    $(".blind").fadeTo(800, .8, function () {
        $(".credits").show();
        var offset = $(".credits").offset();
        var x = offset.left + $(".credits").width();
        var y = 20;
        $(".blind .close").css("left", x + "px").css("top", y + "px");
        if (facebook) {
            $(".credits").animate({
                top: '-400px'
            }, 15000, 'easeInOutQuad', function () {
                $(".close").click();
            });
        } else {
            $(".credits").animate({
                top: '0px'
            }, 12000, 'easeInOutQuad', function () {
                $('.close').fadeIn(300);
            });
        }
    });
}

function load_tour(){
    $(".credits").fadeOut(300);
    $(".contact").fadeOut(300);
    $(".blind").fadeTo(1000, .8, function () {
        $(".tour_lightbox").fadeIn(300, function () {
            var offset = $(".tour_lightbox").offset();
            var x = offset.left + $(".tour_lightbox").width() + 5;
            var y = offset.top;
            $(".blind .close").css("left", x + "px").css("top", y + "px");
            $('.close').fadeIn(300);
            enter_splash_video();
        });
    });
}

function load_downloads() {
    $(".close").hide();
    $(".blind").fadeTo(500, .8, function () {
        $(".download_lightbox").fadeIn(300, function () {
            var offset = $(".download_lightbox").offset();
            var x = offset.left + $(".download_lightbox").width() - 50;
            var y = offset.top - 10;
            $(".blind .close").css("left", x + "px").css("top", y + "px");
            $('.close').fadeIn(300);
            
               if($.cookie('downloaded') == 1){
                
               } else {
                var date = new Date();
                date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
            
                if(!canada){
                    window.location = '/DVBBSINITIOEP.zip';
                }
                $.cookie('downloaded', 1, { expires: date });
               
               }
               
               push_analytic('download', 'mixtape');
               
            
        });
    });
}

function next_track() {
    if (current_track == 4) {
        current_track = 6
    } else if (current_track == 6) {
        current_track = 5;
    } else if (current_track == 5) {
        current_track = 1
    } else {
        current_track++;
    }
    init_bg();
    init_audio();
}

function previous_track() {
    if (current_track == 1) {
        current_track = 5;
    } else if (current_track == 5) {
        current_track = 6;
    } else if (current_track == 6) {
        current_track = 4;
    } else {
        current_track--;
    }
    init_bg();
    init_audio();
}

function init_vimeo() {
    $("#bg_image").attr('src', '/images/black.gif');
    // if(killed){
    $("#vimeo_player_container object").remove();
    $("#vimeo_player_container").html('<div id="vimeo_player"></div>');
    killed = false;
    //}
    var params = {
        allowScriptAccess: 'always',
        bgcolor: '#000000',
        wmode: 'transparent'
    };
    var atts = {
        id: 'my_vimeo_player'
    };
    swfobject.embedSWF('http://www.youtube.com/apiplayer?enablejsapi=1&amp;playerapiid=vimeo_player&version=3', 'vimeo_player', '500', '375', '8', null, null, params, atts);
    // swfobject.addParam("wmode", "opaque");
    vimeo_showing = false;
    if (audio) {
        audio.pause();
    }
    $(".player_title").html(video_titles[current_video_id]);
    setTimeout(set_sizes_and_positions, 500);
    setInterval(updateTimeBar, 250);
    updateTimeBar();
    control_type = 'video';
}

function onYouTubePlayerReady(playerId) {
    // control_type = 'video';
    vimeo_player = document.getElementById('my_vimeo_player');
    vimeo_player.loadVideoById(video_ids[current_video_id], 0);
    //vimeo_player.play();
    vimeo_player.loadVideoById(video_ids[id], 0);
    vimeo_player.setPlaybackQuality('hd720');
    $(".player_play").addClass('pause');
    $("#play_track").text('Pause');
    video_playing = false;
    set_sizes_and_positions();
    control_type = 'video';
    $(".player_title").html(video_titles[current_video_id]);
    //  setInterval(updateTimeBar, 250);
    //  updateTimeBar();
}

function vimeo_ready() {
    // froogaloop = $f('vimeo_player');
    //froogaloop.api('play');     
    //froogaloop.api('api_setVolume', 0);
    //var t = setTimeout('pause_vimeo()', 2000);
}

function kill_vimeo() {
    if (vimeo_player) {
        $("#vimeo_player_container").hide();
        //vimeo_player.stopVideo();
        $(vimeo_player).hide();
        video_playing = false;
        killed = true;
        control_type = 'audio';
    }
}

function load_vimeo(id) {
    current_video_id = id;
    init_vimeo();
    /*
        if(killed == true){
        //    init_vimeo();
            killed = false;
            return;
        } 
        */
    $("#vimeo_player_container").fadeIn(300);
    show_player_and_header();
    control_type = 'video';
    $(".player_title").text(video_titles[id]);
    if (vimeo_player) {
        vimeo_player.loadVideoById(video_ids[id], 0);
    }
    $(".player_title").html(video_titles[current_video_id]);
    $(".player_play").addClass('pause');
    $("#play_track").text('Pause');
    video_playing = true;
    set_sizes_and_positions();
    setInterval(updateTimeBar, 250);
    updateTimeBar();
    killed = false;
}

function updateTimeBar() {
    if (vimeo_player && video_playing) {
        var player_state = vimeo_player.getPlayerState();
        set_sizes_and_positions();
    }
    if (control_type == 'video' && vimeo_player && video_playing && (player_state == 1)) {
        var manualSeek = false;
        var positionIndicator = $('.player_handle');
        var rem = parseInt(vimeo_player.getCurrentTime(), 10),
            pos = (vimeo_player.getCurrentTime() / video_lengths[current_video_id]) * 100,
            mins = Math.floor(rem / 60, 10),
            secs = rem - mins * 60;
        $(".player_time_current").text(mins + ':' + (secs > 9 ? secs : '0' + secs));
        var total_time = secondsToTime(vimeo_player.getDuration());
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
                max: video_lengths[current_video_id],
                animate: true,
                slide: function () {
                    manualSeek = true;
                },
                stop: function (e, ui) {
                    manualSeek = false;
                    var v = Math.round(ui.value);
                    vimeo_player.seekTo(v);
                }
            });
        }
    }
}

function hide_vimeo() {
    vimeo_showing = false;
    $("#vimeo_player_container").fadeOut();
    //$("#vimeo_player_container").css('z-index', -100);
    /*
    $("#vimeo_player_container").stop().fadeOut(300, function(){
          froogaloop.api('pause'); 
    });
    */
    if (can_play) {
        // froogaloop.api('api_setVolume', 0);  
    }
}

function use_vimeo_audio() {
    // froogaloop.api('api_setVolume', 80);
    // audio.volume = 0;
}

function mute_vimeo_audio() {
    // froogaloop.api('api_setVolume', 0);
    var vol = $(".player_volume_handle").css('left');
    vol = vol.replace('%', '');
    vol = vol.replace('px', '');
    vol = vol / 100;
    audio.volume = vol;
}

function load_blog() {
    var additional_height = 0;
    if (!player_showing) {
        additional_height = 65;
    }
    $(".player").css('background-color', 'rgba(0,0,0,1)');
    $(".player").css('z-index', '1000');
    $(".player").animate({
        height: window_height + additional_height
    }, 900, function () {
        var url = '/blog';
        if (is_playing) {
            var track_number = current_track;
            var track_time = audio.currentTime;
            url += "?track=" + track_number;
            url += "&time=" + track_time;
        }
        window.location = url;
    });
}

function share_track(track) {
    $("#share_widget_container_1,#share_widget_container_2,#share_widget_container_3,#share_widget_container_4,#share_widget_container_5,#share_widget_container_6").fadeOut(300, function () {
        window.location.hash = track;
        $(".blind").fadeTo(300, .7);
        $("#share_widget_container_" + track).fadeIn(300);
    });
}

function push_analytic(key, value) {
    if (facebook) {
        var fb = 1;
    } else {
        var fb = 0;
    }
    var datastring = "key=" + key + "&value=" + value + "&mobile=false" + "&facebook=" + fb;
    $.ajax({
        url: "/ajax/post/analytic",
        type: "POST",
        data: datastring,
        success: function (d) {}
    });
    _gaq.push(['_trackEvent', 'event', key, value, false]);
}

function preload() {
    //return false;
    for (i = 1; i <= 6; i++) {
        var src = '/images/backgrounds/track' + i + '/first_frame_' + IMAGE_SIZE + '.gif';
        var img = new Image();
        img.src = src;
        var gif_src = '/images/backgrounds/track' + i + '/' + IMAGE_SIZE + '.gif';
        var gif_img = new Image();
        gif_img.src = gif_src;
    }
}

function updateOrientation() {
    var contentType = "show_";
    switch (window.orientation) {
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

function check_browser() {
    if (!can_play) {
        // window.location = '/lite';
    }
}

function is_int(input) {
    return typeof (input) == 'number' && parseInt(input) == input;
}

function check_for_hash() {
    if (window.location.hash) {
        var current_track = parseInt((window.location.hash).replace('#', ''));
        $("#play_track_" + current_track).click();
    }
}

function hide_itunes_coming_soon() {
    $(".itunes_coming_soon").fadeOut(500);
}

function hide_mix_coming_soon() {
    $(".mix_coming_soon").fadeOut(500);
}

function video_coming_soon() {
    $(".video_coming_soon").fadeIn(500);
    setTimeout(hide_video_coming_soon, 2000);
}

function hide_video_coming_soon() {
    $(".video_coming_soon").fadeOut(500);
}