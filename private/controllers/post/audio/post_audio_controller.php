<?php
class Post_Audio_Controller extends Post_Controller {

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
	}

	function content_view() {

		if(isset($_POST['id'])) { $id = $_POST['id']; }
		if(isset($_POST['title'])) { $title = $_POST['title']; }
		if(isset($_POST['image_id'])) { $image_id = $_POST['image_id']; }

		if(is_numeric($id) && $id > 0) {
			$audio = Audio_Model::find_by_id($id);
		} else {
			$audio = new Audio_Model();
		}

		if(isset($title)) { $audio->set_title($title); }
		
		
		/* TEMP */
		$audio->set_image_id($image_id);
		$audio->set_status('a');

		
		if($_FILES['uploadfile']['name'] != ''){
		
			$allowed_extensions = array("mp3");
			
			if (!in_array(end(explode(".", strtolower($_FILES['uploadfile']['name']))), $allowed_extensions)) {
				
				echo "Invalid filetype. Must of of the following types:<br />";
				foreach($allowed_extensions as $ext){
					echo '<li>.' . $ext . '</li>';
				}
	
				echo '<a href="#" onclick="history.go(-1); return false;">Back</a>';
				die();
			}
			
			
			$filename = safe_filename($_FILES['uploadfile']['name']);
			
			$target_path = AUDIO_DIRECTORY . basename($filename); 
			
			$audio->set_filename($filename);
			$audio->set_filesize($_FILES['uploadfile']['size']);
			$audio->set_filetype($_FILES['uploadfile']['type']);
			
			if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path)) {
				
				
				$file = AUDIO_DIRECTORY . $filename;
				$getID3 = new getID3;
						
				$file_info = $getID3->analyze($file);
				$length = $file_info['playtime_seconds'];
				
				$audio->set_length($length);
				
				$audio->save();
				redirect_to('/admin/audio');
				
			} else{
				
				echo "There was an error uploading the file, please try again!<br />";
				echo '<a href="#" onclick="history.go(-1); return false;">Back</a>';
			
			}
		
		} else {
			
			$audio->save();
			redirect_to('/admin/audio');
			
		}
		


	}
	
}
?>