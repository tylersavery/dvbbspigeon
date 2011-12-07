<?php
if($this->audio) {
	$id = $this->audio->get_id();
	$title = $this->audio->get_title();
	$filename = $this->audio->get_filename();
	$filetype = $this->audio->get_filetype();
	$filesize = $this->audio->get_filesize();
	$length = $this->audio->get_length();
	$image_id = $this->audio->get_image_id();
	$status = $this->audio->get_status();
}
?>

<h1 class="title">Edit Audio</h1>
	
<form name="audio_form" id="audio_form" action="/post/audio" method="post" enctype="multipart/form-data">
	<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />

	<h3>File</h3>
	<input name="uploadfile" id="uploadfile" type="file" />

	<h3>Title</h3>
	<input type="text" id="title" name="title" value="<?php echo $title;?>" /><br />

	<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
	
	<?php if($this->audio): ?>
		<?php if($this->audio->get_permalink()): ?>
		<h3>Preview</h3>
			<audio src="<?= $this->audio->get_permalink();?>" controls="controls"></audio>
		<?php endif; ?>
	<?php endif; ?>
	
	 <?php if($this->images): ?>
		<h3>Image</h3>
			<table width="300" style="width:300px; clear:both;">
			 <tr class="image_choice">
					<td>
					<input type="radio" name="image_id" <? if($image_id == 0): echo ' checked="checked" '; endif; ?> value="0"/>
					</td>
					<td>
					None
					</td>
			 </div>
			
			 <? foreach($this->images as $image): ?>
			<tr class="image_choice">
					<td>
					<input type="radio" name="image_id" value="<?= $image->get_id();?>" <? if($image_id == $image->get_id()): echo ' checked="checked" '; endif; ?> />
					</td>
					<td>
					<img src="<?= $image->get_permalink();?>" width=120 />
					</td>
			</tr>
			 <? endforeach; ?>
			</table>
		<? endif; ?>

	
<div class="actions">
	<div class="action_buttons">
		<a href="/admin/audio" class="btn">Back</a>
		<button type="submit" class="btn primary">Save Audio</button>
	</div>
</div>


</form>