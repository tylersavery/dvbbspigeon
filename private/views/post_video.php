<div class="post regular">
	<div class="datetime"><?= time_to_friendly_date($this->post['time']); ?></div>
	<div class="title"><a href="/blog/<?= $this->post['id'];?>"><?= strip_tags($this->post['content']['caption']); ?></a></div>
	<div class="body"><?= $this->post['content']['player']; ?></div>
</div>