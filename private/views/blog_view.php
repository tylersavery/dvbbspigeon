<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="http://stratus.heroku.com/js/soundcloud.player.api.js"></script>
<script type="text/javascript" src="http://stratus.heroku.com/js/stratus.js"></script>
<link type="text/css" rel="stylesheet" href="http://stratus.heroku.com/css/stratus.css"/>
<link rel="stylesheet" type="text/css" href="/css/ie.css" />
<![endif]-->
<?= $this->player;?>
<div class="clear"></div>

    <div class="posts">
     
    <? foreach($this->posts_html as $post_template): ?>

    <?= $post_template; ?>

    <? endforeach; ?>
    
        
    </div>

<div style="height:400px; position:relative; max-width:1382px; margin: auto;border-top:8px solid #fff;">
    
    <center>
    <img id="kanary" src="/images/kanary_blog.png" style="margin:100px auto;" />
    </center>
</div>