<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="http://stratus.heroku.com/js/soundcloud.player.api.js"></script>
<script type="text/javascript" src="http://stratus.heroku.com/js/stratus.js"></script>

<link type="text/css" rel="stylesheet" href="http://stratus.heroku.com/css/stratus.css"/>
<link rel="stylesheet" type="text/css" href="/css/ie.css" />
<![endif]-->

<script src="http://html5media.googlecode.com/svn/trunk/src/html5media.min.js"></script>

<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4fa8515330fc9014"></script>

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '<?= FB_APP_ID;?>', // App ID
      channelUrl : '/channel.php', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
   }(document));
</script>


<div id="loader"><img src="/images/loader.gif" width="16" height="16" /></div>
<div class="blind"><div class="close">x</div></div>
<div id="vimeo_player_container">
  <div id="vimeo_player"></div>
</div>
<div class="contact">
    
    <h3>D V B B S</h3>
    <h4>Alex Andre [ <a href="http://twitter.com/alexdvbbs" target="_blank"><span class="up">@</span>alexdvbbs</a> ]<br>
    Chris Andre [ <a href="http://twitter.com/chrisdvbbs" target="_blank"><span class="up">@</span>chrisdvbbs</a> ]
    </h4>
    
    
    <p class="spacer">&nbsp;</p>
    <h3>Management: Josh Herman</h3>
    <h4><a href="mailto:jherman@strvctvre.com">jherman<span class="up">@</span>strvctvre.com</a></h4>
    
    
    <p class="spacer">&nbsp;</p>
    <h3>For all bookings and booking inquires:</h3>
    <h4><a href="mailto:colinlewis@theagencygroup.com">colinlewis<span class="up">@</span>theagencygroup.com</a></h4>
    
    <p class="spacer">&nbsp;</p>
    <h3>For all media inquiries/press/interviews/support please email</h3>
    <h4><a href="mailto:info@dvbbs.com">info<span class="up">@</span>dvbbs.com</a></h4>
    
    <div class="legals">
        <h6>Legals</h6>
        <a href="http://www.three60legal.com" target="_blank" class="small">EB Reinbergs</a>
    </div>

</div>

<div class="credits">
    <h3 class="credits_title">Music by DVBBS</h3>
    <h4><a href="https://twitter.com/#!/dvbbs" target="_blank" class="twitter"><span class="up">@</span>dvbbs</a>
    | <a href="https://twitter.com/#!/alexdvbbs" target="_blank" class="twitter"><span class="up">@</span>alexdvbbs</a>
    | <a href="https://twitter.com/#!/chrisdvbbs" target="_blank" class="twitter"><span class="up">@</span>chrisdvbbs</a>
    </h4>
    
    <h3>Web Design / Development / Animation</h3>
    <h4><a href="http://www.theyoungastronauts.com" target="_blank">The Young Astronauts</a></h4>
    
    <h3>Photography</h3>
    <h4><a href="http://mathewguido.com" target="_blank">Mathew Guido [Dance Bitch]<br>
    <a href="http://lostinthewillderness.com/" target="_blank">William Nguyen</a>
    </h4>
    
    <h3>Creative Direction</h3>
    <h4>Nev Todorovic
    </h4>
    
    <h3>Visual Production</h3>
    <h4>Greg Decaire<br>
    Alex Andre<br>
    Chris Andre<br>
    Sidney Leeder
    </h4>
    
    <!--
    <h3>Animation and Production</h3>
    <h4><a href="http://www.theyoungastronauts.com" target="_blank">The Young Astronauts</a></h4>
    -->
    
    <div class="kanary">Kanary</div>
    
    <a href="#" class="underground">
        <img src="/images/uologo_white.png" />
    </a>
   
    <a href="http://www.theyoungastronauts.com" class="ya" target="_blank">
        <img src="/images/ya.png" />
    </a>
    
    
    
    
</div>

<div class="itunes_coming_soon">
  <span style="color:#fff;">Coming to iTunes</span> March <span style="font-size:23px">20</span>th
</div>

<div class="mix_coming_soon">
  <span style="color:#fff;">Free EP Mix Available Soon</span>
</div>

<div class="video_coming_soon">
  <span style="color:#fff;">Part III Coming </span> Sunday May <span style="font-size:23px">13</span>th
</div>


<div class="download_lightbox">
    <!--<a href="#" class="mixtape_download" id="mixtape_download_digital">Free Digital Download</a>-->
    <a href="#" class="mixtape_download" id="mixtape_download_stems">Download Stems</a>
    <?php if($this->canada == false): ?>
    <a href="#" class="mixtape_download" id="mixtape_download_dj">Download DVBBS INITIO EP</a>
    <? endif;?>
   <!-- <a href="http://www.itunes.com" target="_blank" class="mixtape_download">iTunes TRX</a>-->
    <a href="http://itunes.apple.com/ca/artist/dvbbs/id510436077" target="_blank" class="mixtape_download" id="mixtape_buy">Buy Mixtape</a>
    <a href="#" class="mixtape_download share_title">Share Mixtape</a>
    
    <!-- AddThis Button BEGIN -->
    <div class="addthis_toolbox addthis_default_style">
        <a class="addthis_button_preferred_1"></a>
        <a class="addthis_button_preferred_2"></a>
        <a class="addthis_button_preferred_3"></a>
        <a class="addthis_button_compact"></a>
        <!--
        <a class="addthis_counter addthis_bubble_style"></a>
        -->
    </div>
    <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f01e5ab119c7dda"></script>
    <!-- AddThis Button END -->
        
</div>


<div class="tour_lightbox">
  
<img src="/images/tour1.jpg" width="500" /> 


  <!--
<p>
<a href="http://www.infofestival.com/Artists/DVBBS/" target="_blank"><span>July 5th</span> - OTTAWA RBC Royal Bank Bluesfest</a><br />
<a href="http://ottawabluesfest.ca/lineup/artist-bio/?id=deb575e0131850966b603d22c8d9a148" target="_blank"><span>July 6th</span> - QUEBEC CITY Festival d'&eacute;t&eacute; de Qu&eacute;bec</a><br />
<a href="http://www.evenko.ca/en/show/event/lmfao--6136" target="_blank"><span>July 7th</span> - MONTREAL - Centre De La Nature w/ LMFAO</a><br />
</p>

<p>
<a><span>JULY</span> NORTH AMERICAN TOUR DATES - TBA</a>
</p>

<p>
<a href="http://veldmusicfestival.com/artists/dvvbbs/" target="_blank"><span>Aug 4th</span> - TORONTO - VELD Music Festival Toronto</a>
</p>
-->
</div>

<!--
<div id="video_links">
  <a href="#" id="video4">LIVE</a>  <a href="#" id="video1">I</a> <a href="#" id="video2">II</a> <a href="#" id="video3">III</a> 
</div>
-->

<div class="hide-ie">
<video src="/videos/dvbbs_introx.mov" id="splash_video" autoplay=true controls="false" loop="true" >
  </div>
</video>


<img src="#" id="splash_img" />


<img src="#" id="preview" />


<div id="addthis_container">

  <div class="addthis_toolbox addthis_default_style ">
    <a class="addthis_button_preferred_1"></a>
    <a class="addthis_button_preferred_2"></a>
    <a class="addthis_button_preferred_3"></a>

    <a class="addthis_button_compact"></a>
  </div>

  

</div>


<div class="page">
    <div class="wrap">
        <div id="background"><img id="bg_image" src="/images/black.gif" /></div>
        
        <div class="track_menu">
            
            <div class="menu_item" id="menu_item_0" rel="0">
                <div class="strikethrough"></div>
                <div class="menu_head" id="menu_head_0" rel="1">Videos</div>
                <div class="menu_foot">
                    <div class="menu_foot_item play_live_video" rel="0" id="play_live_video">Live</div>
                    <div class="menu_foot_item play_i" rel="0">I</div>
                    <div class="menu_foot_item play_ii" rel="0">II</div>
                    <div class="menu_foot_item play_iii" rel="0">III</div>
                    
                </div><!-- /.menu_foot -->
            </div><!-- /.menu_item -->
            
            <div class="clear"></div>
            
            <div class="menu_item" id="menu_item_1" rel="1">
                <div class="strikethrough"></div>
                <div class="menu_head" id="menu_head_1" rel="1">Dance Bitch</div>
                <div class="menu_foot">
                    <div class="menu_foot_item play_track" rel="1" id="play_track_1">Play</div>
                    <div class="menu_foot_item share_track" rel="1">Share</div>
                    <div class="menu_foot_item itunes"  rel="1"><a href="http://itunes.apple.com/ca/album/dance-bitch/id510436052?i=510436080" target="_blank">iTunes</a></div>
                    <div class="menu_foot_item download_stem"  rel="1">Stems</div>
                    
                </div><!-- /.menu_foot -->
            </div><!-- /.menu_item -->
            
            <div class="clear"></div>
            <div class="menu_item" id="menu_item_2" rel="2">
                <div class="strikethrough"></div>
                <div class="menu_head" id="menu_head_2" rel="2">DRVGS</div>
                <div class="menu_foot">
                    <div class="menu_foot_item play_track" rel="2" id="play_track_2">Play</div>
                    <div class="menu_foot_item share_track" rel="2">Share</div>
                    <div class="menu_foot_item itunes"  rel="2"><a href="http://itunes.apple.com/ca/album/drvgs-feat.-hayley-gene-medeuxa/id510436052?i=510436090" target="_blank">iTunes</a></div>
                    <div class="menu_foot_item download_stem"  rel="2">Stems</div>
                    <div class="hayley">Ft. Hayley Gene</div>
                </div><!-- /.menu_foot -->
            </div><!-- /.menu_item -->
            
            <div class="clear"></div>
            <div class="menu_item"  id="menu_item_3" rel="3">
                <div class="strikethrough"></div>
                <div class="menu_head" id="menu_head_3" rel="3">Come Alive</div>
               <div class="menu_foot">
                    <div class="menu_foot_item play_track" rel="3" id="play_track_3">Play</div>
                    <div class="menu_foot_item share_track" rel="3">Share</div>
                    <div class="menu_foot_item itunes"  rel="3"><a href="http://itunes.apple.com/ca/album/come-alive/id510436052?i=510436094" target="_blank">iTunes</a></div>
                    <div class="menu_foot_item download_stem"  rel="3">Stems</div>
                </div><!-- /.menu_foot -->
            </div><!-- /.menu_item -->
            
              
            <div class="clear"></div>
            <div class="menu_item" id="menu_item_4" rel="4">
                <div class="strikethrough"></div>
                <div class="menu_head" id="menu_head_4" rel="4">Sugar Coated</div>
               <div class="menu_foot">
                    <div class="menu_foot_item play_track" rel="4" id="play_track_4">Play</div>
                    <div class="menu_foot_item share_track" rel="4">Share</div>
                    <div class="menu_foot_item itunes"  rel="4"><a href="http://itunes.apple.com/ca/album/sugar-coated/id510436052?i=510436095" target="_blank">iTunes</a></div>
                    <div class="menu_foot_item download_stem"  rel="4">Stems</div>
                </div><!-- /.menu_foot -->
            </div><!-- /.menu_item -->
            
            
            <div class="clear"></div>
            <div class="menu_item"  id="menu_item_6" rel="6">
                <div class="strikethrough"></div>
                <div class="menu_head" id="menu_head_6" rel="6">Here We Go</div>
               <div class="menu_foot">
                    <div class="menu_foot_item play_track" rel="6" id="play_track_6">Play</div>
                    <div class="menu_foot_item share_track" rel="6">Share</div>
                    <div class="menu_foot_item itunes"  rel="6"><a href="http://itunes.apple.com/ca/album/here-we-go/id510436052?i=510436096" target="_blank">iTunes</a></div>
                    <div class="menu_foot_item download_stem"  rel="6">Stems</div>
                </div><!-- /.menu_foot -->
            </div><!-- /.menu_item -->
            
            <div class="clear"></div>
            <div class="menu_item"  id="menu_item_5" rel="5">
                <div class="strikethrough"></div>
                <div class="menu_head" id="menu_head_5" rel="5">Till I Die</div>
                <div class="menu_foot">
                    <div class="menu_foot_item play_track" rel="5" id="play_track_5">Play</div>
                    <div class="menu_foot_item share_track" rel="5">Share</div>
                    <div class="menu_foot_item itunes" rel="5"><a href="http://itunes.apple.com/ca/album/till-i-die-flashing-lights/id510436052?i=510436097" target="_blank">iTunes</a></div>
                    <div class="menu_foot_item download_stem" rel="5">Stems</div>
                </div><!-- /.menu_foot -->
            </div><!-- /.menu_item -->

            <div class="clear"></div>
            <div class="menu_item mixtape" rel="0">
                <div class="strikethrough"></div>
                <div class="menu_head" id="menu_head_7" rel="0">Get Mixtape</div>
           

            </div><!-- /.menu_item -->
            
        </div> <!-- /.track_menu -->
 
    </div><!-- /.wrap -->
    
    <?= $this->player;?>
    
    <ul class="top_menu">
        <li id="tour_link" class="highlighted">Tour</li>
        <li id="contact_link">Contact</li>
        <li id="credits_link">Credits</li>
    </ul>
 
    <div class="header">
        <div class="logo">DVBBS</div>
    </div><!-- ./header -->

        

    <div id="share_widget_container_1">
        <div class="close">x</div>
         <div id="share_widgets">
            <div id="share_widget_twitter" class="share_widget">
                <a href="https://twitter.com/share" data-count="none" data-text="D V B B S - Dance Bitch http://www.dvbbs.com/#1" class="twitter-share-button" data-related="dvbbs" data-hashtags="dvbbs">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div id="share_widget_facebook" class="share_widget">
                <div class="fb-like" data-href="http://www.dvbbs.com#1" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-colorscheme="dark"></div>
            </div>
            <div class="facebook_publish share_widget" rel="1"><img src="/images/facebook_share.gif" /></div>
         </div>
    </div>
    
    <div id="share_widget_container_2">
        <div class="close">x</div>
         <div id="share_widgets">
            <div id="share_widget_twitter" class="share_widget">
                <a href="https://twitter.com/share" data-count="none"  data-text="D V B B S - DRVGS http://www.dvbbs.com/#2" class="twitter-share-button" data-related="dvbbs" data-hashtags="dvbbs">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div id="share_widget_facebook" class="share_widget">
                <div class="fb-like" data-href="http://www.dvbbs.com#2" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-colorscheme="dark"></div>
            </div>
            <div class="facebook_publish share_widget" rel="2"><img src="/images/facebook_share.gif" /></div>
         </div>
    </div>
    
    <div id="share_widget_container_3">
        <div class="close">x</div>
         <div id="share_widgets">
            <div id="share_widget_twitter" class="share_widget">
                <a href="https://twitter.com/share" data-count="none"  data-text="D V B B S - Come Alive http://www.dvbbs.com/#3" class="twitter-share-button" data-related="dvbbs" data-hashtags="dvbbs">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div id="share_widget_facebook" class="share_widget">
                <div class="fb-like" data-href="http://www.dvbbs.com#3" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-colorscheme="dark"></div>
            </div>
            <div class="facebook_publish share_widget" rel="3"><img src="/images/facebook_share.gif" /></div>
         </div>
    </div>
    
    <div id="share_widget_container_4">
        <div class="close">x</div>
         <div id="share_widgets">
            <div id="share_widget_twitter" class="share_widget">
                <a href="https://twitter.com/share" data-count="none"  data-text="D V B B S - Sugar Coated http://www.dvbbs.com/#4" class="twitter-share-button" data-related="dvbbs" data-hashtags="dvbbs">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div id="share_widget_facebook" class="share_widget">
                <div class="fb-like" data-href="http://www.dvbbs.com#4" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-colorscheme="dark"></div>
            </div>
            <div class="facebook_publish share_widget" rel="4"><img src="/images/facebook_share.gif" /></div>
         </div>
    </div>
    
    <div id="share_widget_container_5">
        <div class="close">x</div>
         <div id="share_widgets">
            <div id="share_widget_twitter" class="share_widget">
                <a href="https://twitter.com/share" data-count="none"  data-text="D V B B S - Till I Die http://www.dvbbs.com/#5" class="twitter-share-button" data-related="dvbbsdvbbs" data-hashtags="dvbbs">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div id="share_widget_facebook" class="share_widget">
                <div class="fb-like" data-href="http://www.dvbbs.com#5" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-colorscheme="dark"></div>
            </div>
            <div class="facebook_publish share_widget" rel="5"><img src="/images/facebook_share.gif" /></div>
         </div>
    </div>
    
    <div id="share_widget_container_6">
        <div class="close">x</div>
         <div id="share_widgets">
            <div id="share_widget_twitter" class="share_widget">
                <a href="https://twitter.com/share" data-count="none"  data-text="D V B B S - Here We Go http://www.dvbbs.com/#6" class="twitter-share-button" data-related="dvbbs" data-hashtags="dvbbs">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div id="share_widget_facebook" class="share_widget">
                <div class="fb-like" data-href="http://www.dvbbs.com#6" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-colorscheme="dark"></div>
            </div>
            <div class="facebook_publish share_widget" rel="6"><img src="/images/facebook_share.gif" /></div>
         </div>
    </div>
    
</div><!-- /.page -->



<div id="fb-root"></div>

<script>
<?php if($this->canada): ?>
var canada = true;
<?php else: ?>
var canada = false;
<?php endif; ?>
</script>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?= FB_APP_ID;?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
    var GoSquared={};
    GoSquared.acct = "GSN-746631-S";
    (function(w){
        function gs(){
            w._gstc_lt=+(new Date); var d=document;
            var g = d.createElement("script"); g.type = "text/javascript"; g.async = true; g.src = "//d1l6p2sc9645hc.cloudfront.net/tracker.js";
            var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(g, s);
        }
        w.addEventListener?w.addEventListener("load",gs,false):w.attachEvent("onload",gs);
    })(window);
</script>
