<?= $this->player;?>
<div class="clear"></div>

    <div class="posts">
        
        <? for($i=1;$i<=5;$i++): ?>
        
        <div class="post alex">
            <div class="post_top"></div>
            <div class="post_middle"></div>
            <div class="post_bottom"></div>
            
            <div class="wrap">
                <div class="post_author">
                    <div class="post_name"></div>
                    <div class="post_social">
                        <a href="#"><img src="/images/facebook.gif" /></a><br />
                        <a href="#"><img src="/images/twitter.gif" /></a>
                    </div>  
                </div>
            
                <div class="post_content" rel="a<?= $i;?>">
                    <div class="post_date">5th January 2012</div>
                    <div class="post_caption">Photo with 543 Notes</div>
                    <div class="photo">
                        <img src="/images/temp/photo1.jpg">
                    </div>
                </div>
                
                <div class="post_title">I could be dreaming, we could be dreaming.</div>
                
            </div>
            
        </div>
        
        <div class="clear"></div>
        
        
        <div class="post dvbbs">
            <div class="post_top"></div>
            <div class="post_middle"></div>
            <div class="post_bottom"></div>
            
            <div class="wrap">
                <div class="post_author">
                    <div class="post_name"></div>
                    <div class="post_social">
                        <a href="#"><img src="/images/facebook.gif" /></a><br />
                        <a href="#"><img src="/images/twitter.gif" /></a>
                    </div>  
                </div>
            
                <div class="post_content" id="post_content<?= $i;?>" rel="b<?= $i;?>">
                    <div class="post_date">5th January 2012</div>
                    <div class="post_caption">Photo with 543 Notes</div>
                    <div class="photo">
                        <img src="/images/temp/photo2.jpg">
                    </div>
                </div>
                
                <div class="post_title"></div>
                
            </div>
            
        </div>
        <div class="clear"></div>
        
        
        <div class="post chris">
            <div class="post_top"></div>
            <div class="post_middle"></div>
            <div class="post_bottom"></div>
            
            <div class="wrap">
                <div class="post_author">
                    <div class="post_name"></div>
                    <div class="post_social">
                        <a href="#"><img src="/images/facebook.gif" /></a><br />
                        <a href="#"><img src="/images/twitter.gif" /></a>
                    </div>  
                </div>
            
                <div class="post_content" rel="c<?= $i;?>">
                    <div class="post_date">5th January 2012</div>
                    <div class="post_caption">Photo with 543 Notes</div>
                    <div class="photo">
                        <img src="/images/temp/photo3.jpg">
                    </div>
                </div>
                
                <div class="post_title">I could be dreaming, we could be dreaming.</div>
                
            </div>
            
        </div>
        
        <div class="clear"></div>
        
        <? endfor; ?>
        
        
        
    </div>
    

    
<? //foreach($this->posts_html as $post_template): ?>

<?//= $post_template; ?>

<? //endforeach; ?>

</div>

    <div style="height:200px; position:relative;"></div>