<?= $this->player;?>
<div class="clear"></div>

    <div class="posts">
       
    <? foreach($this->posts_html as $post_template): ?>

    <?= $post_template; ?>

    <? endforeach; ?>
        
    </div>

<div style="height:200px; position:relative;"></div>