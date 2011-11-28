<div class="post regular">
	<div class="datetime"><?= time_to_friendly_date($this->post['time']); ?></div>
	<div class="title"><a href="/blog/<?= $this->post['id'];?>"><?= $this->post['content']['text']; ?></a></div>
	<div class="body">
		<a href="<?= $this->post['content']['url']; ?>"><?= $this->post['content']['url']; ?></a>
		<p><?= $this->post['content']['description']; ?></p>
	</div>
</div>