<?php
if($this->audio) {
	$id = $this->audio->get_id();
	$title = $this->audio->get_title();
	$filename = $this->audio->get_filename();
	$filetype = $this->audio->get_filetype();
	$filesize = $this->audio->get_filesize();
	$status = $this->audio->get_status();
}
?>

<h1 class="title">Edit Image</h1>
	
<form name="audio_form" id="audio_form" action="/post/image" method="post" enctype="multipart/form-data">
	<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />

	<h3>File</h3>
	<input name="uploadfile" id="uploadfile" type="file" />

	<h3>Title</h3>
	<input type="text" id="title" name="title" value="<?php echo $title;?>" /><br />

	<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
	
<div class="actions">
	<div class="action_buttons">
		<a href="/admin/images" class="btn">Back</a>
		<button type="submit" class="btn primary">Save Audio</button>
	</div>
</div>


</form>