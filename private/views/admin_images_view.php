	<h1 class="title">Manage Images</h1>

	<div class="list_all">
		<table>
			<thead>
				<th>id</th>
				<th>Image</th>
				<th>Title</th>
				<th>Filename</th>
				<th>Filetype</th>
				<th>Filesize</th>
				<th>Status</th>
				<th>Options</th>
			</thead>
			<tbody>
			<?php foreach($this->images as $image): ?>
				<tr id="audio_<?php echo $image->get_id();?>">
					<td class="id"><?php echo $image->get_id();?></td>
					<td class="image"><img src="<?php echo $image->get_permalink();?>" width="150" /></td>
					<td class="title"><?php echo $image->get_title();?></td>
					<td class="filename"><?php echo $image->get_filename();?></td>
					<td class="filetype"><?php echo $image->get_filetype();?></td>
					<td class="filesize"><?php echo $image->get_filesize();?></td>
					<td class="status"><?php echo $image->get_status();?></td>
					<td class="options">
						<a class="btn" href="/admin/images/edit/<?php echo $image->get_id();?>">Edit</a><br />
						<a class="btn danger delete" href="/admin/images/delete/<?php echo $image->get_id();?>">Delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="actions">
		<div class="action_buttons">
			
			<a href="/admin/" class="btn">Back</a>
			<a href="/admin/images/add" class="btn primary">Add New Image</a>
		</div>
	</div>
