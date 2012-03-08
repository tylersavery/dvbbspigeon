<div class="post audio <?= $this->author;?>">
	<div class="post_top"></div>
	<div class="post_middle">
		
		<div class="post_author">
			<div class="post_name"></div>
			<div class="post_social">
				<a href="<?=$this->facebook_url;?>"><img src="/images/facebook.gif" /></a>
				<a href="<?=$this->twitter_url;?>"><img src="/images/twitter.gif" /></a>
			</div>  
		</div>
		
	</div>
	<div class="post_bottom"></div>
	
	<div class="wrap">
		
	
		<div class="post_content" rel="a<?= $i;?>">
			<div class="post_date"><?= time_to_friendly_date($this->post['time']); ?></div>
			<div class="photo">
				<div class="post_caption"><a href="<?=$this->post['url'];?>" target="_blank"><?= ucwords($this->post['type']);?></a></div>
			
				<?= $this->post['content']['player']; ?><br />
				<?= $this->post['content']['caption']; ?>
			</div>
		</div>
		
		
		
	</div>
	
</div>