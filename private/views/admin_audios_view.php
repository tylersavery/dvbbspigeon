	<h1 class="title">Manage Audio</h1>

	<div class="list_all">
		<table>
			<thead>
				<th>id</th>
				<th>Image</th>
				<th>Title</th>
				<th>Preiew</th>
				<th>Filename</th>
				<th>Filetype</th>
				<th>Filesize</th>
				<th>Length</th>
				<th>Status</th>
				<th>Options</th>
			</thead>
			<tbody>
			<?php foreach($this->audios as $audio): ?>
				<tr id="audio_<?php echo $audio->get_id();?>">
					<td class="id"><?php echo $audio->get_id();?></td>
					<td class="image">
						<? if($audio->get_image()): ?>
							<img src="<?php echo $audio->get_image()->get_permalink();?>" width="120" />
						<? else: ?>
							--
						<? endif; ?>
					</td>
					<td class="title"><?php echo $audio->get_title();?></td>
					<td class="preview">
						<audio src="<?= $audio->get_permalink();?>" controls="controls"></audio>
					</td>
					<td class="filename"><?php echo $audio->get_filename();?></td>
					<td class="filetype"><?php echo $audio->get_filetype();?></td>
					<td class="filesize"><?php echo $audio->get_filesize();?></td>
					<td class="length"><?php echo $audio->get_length();?></td>
					<td class="status"><?php echo $audio->get_status();?></td>
					<td class="options">
						<a class="btn" href="/admin/audio/edit/<?php echo $audio->get_id();?>">Edit</a><br />
						<a class="btn danger delete" href="/admin/audio/delete/<?php echo $audio->get_id();?>">Delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="actions">
		<div class="action_buttons">
			
			<a href="/admin/" class="btn">Back</a>
			<a href="/admin/audio/add" class="btn primary">Add New Audio</a>
		</div>
	</div>
