<?php
class Post_Image_Controller extends Post_Controller {

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
	}

	function content_view() {

		if(isset($_POST['id'])) { $id = $_POST['id']; }
		if(isset($_POST['title'])) { $title = $_POST['title']; }

		if(is_numeric($id) && $id > 0) {
			$image = Image_Model::find_by_id($id);
		} else {
			$image = new Image_Model();
		}

		if(isset($title)) { $image->set_title($title); }
		
		
		/* TEMP */
		$image->set_status('a');

		
		$allowed_extensions = array("jpeg", "jpg", "gif", "png");
		
		if (!in_array(end(explode(".", strtolower($_FILES['uploadfile']['name']))), $allowed_extensions)) {
			
			echo "Invalid filetype. Must of of the following types:<br />";
			foreach($allowed_extensions as $ext){
				echo '<li>.' . $ext . '</li>';
			}

			echo '<a href="#" onclick="history.go(-1); return false;">Back</a>';
			die();
		}
		
		
		$filename = safe_filename($_FILES['uploadfile']['name']);
		
		$target_path = UPLOAD_DIRECTORY . basename($filename); 
		
		$image->set_filename($filename);
		$image->set_filesize($_FILES['uploadfile']['size']);
		$image->set_filetype($_FILES['uploadfile']['type']);
		
		if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path)) {
			
			
			$file = UPLOAD_DIRECTORY . $filename;
			
			$image->save();
			redirect_to('/admin/images');
			
		} else{
			
			echo "There was an error uploading the file, please try again!<br />";
			echo '<a href="#" onclick="history.go(-1); return false;">Back</a>';
		
		}
		


	}
	
}
?>