<?php
class Ajax_Post_Article_Controller extends Ajax_Post_Controller {

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
	}

	function content_view() {

		if(isset($_POST['id'])) { $id = $_POST['id']; }
		if(isset($_POST['user_id'])) { $user_id = $_POST['user_id']; }
		
		if(isset($_POST['category_id'])) {
			if ($_POST['category_id'] == '0') {
				$category_id = null;
			} else {
				$category_id = $_POST['category_id'];
			}
		}
		
		if(isset($_POST['title'])) { $title = $_POST['title']; }
		if(isset($_POST['subtitle'])) { $subtitle = $_POST['subtitle']; }
		if(isset($_POST['body'])) { $body = $_POST['body']; }
		if(isset($_POST['slug'])) { $slug = $_POST['slug']; }
		if(isset($_POST['time_publish'])) { $time_publish = strtotime($_POST['time_publish']); }
		if(isset($_POST['status'])) { $status = $_POST['status']; }
		
		if(is_numeric($id) && $id > 0) {
			$article = Article_Model::find_by_id($id);
		} else {
			$article = new Article_Model();
		}

		if(isset($user_id)) { $article->set_user_id($user_id); }
		if(isset($category_id)) { $article->set_category_id($category_id); }
		if(isset($title)) { $article->set_title($title); }
		if(isset($subtitle)) { $article->set_subtitle($subtitle); }
		if(isset($body)) { $article->set_body($body); }
		if(isset($slug)) { $article->set_slug($slug); }
		if(isset($time_publish)) { $article->set_time_publish($time_publish); }
		if(isset($status)) { $article->set_status($status); }
		
		$article->save();
		return $article->get_id();

	}
}
?>