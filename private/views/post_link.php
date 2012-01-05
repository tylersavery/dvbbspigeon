<div class="post link <?= $this->author;?>">
	<div class="post_top"></div>
	<div class="post_middle">
		
		<div class="post_author">
			<div class="post_name"></div>
			<div class="post_social">
				<a href="<?=$this->facebook_url;?>"><img src="/images/facebook.gif" /></a><br />
				<a href="<?=$this->twitter_url;?>"><img src="/images/twitter.gif" /></a>
			</div>  
		</div>
		
	</div>
	<div class="post_bottom"></div>
	
	<div class="wrap">
		
	
		<div class="post_content" rel="a<?= $i;?>">
			<div class="post_date"><?= time_to_friendly_date($this->post['time']); ?></div>
			<div class="post_caption">&nbsp;</div>
			<div class="photo">
				<a href="<?= $this->post['content']['url']; ?>"><?= $this->post['content']['url']; ?></a>
			</div>
		</div>
		
		<div class="post_title"><?= $this->post['content']['description']; ?></div>
		
	</div>
	
</div>