<div class="post regular">
	<div class="datetime"><?= time_to_friendly_date($this->post['time']); ?></div>
	<div class="photo"><a href="/blog/<?= $this->post['id'];?>"><img src="<?= $this->post['content']['url-400'];?>" width="400" /></a></div>
	<div class="caption"><?= $this->post['content']['caption']; ?></div>
</div>