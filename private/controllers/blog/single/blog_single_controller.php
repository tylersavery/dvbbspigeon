<?php
class Blog_Single_Controller extends Static_Main_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        if(PLEASE_CACHE){
            $tumblr = new Read_Tumblr_Cache('tylerdevelopment','phpTumblr', CACHE_DIRECTORY, CACHE_TIME);
        } else {
            $tumblr = new Read_Tumblr('tylerdevelopment');
        }
		
        $tumblr->getPosts(null, null, null, $data['post_id']);
        $post_data = $tumblr->dumpArray();
		
        $post = array_shift($post_data['posts']);
			
		$this->content_view->post = $post;
		
		switch($post['type']){
			case 'regular':
				$post_html = $this->content_view->capture('post_regular.php');
				break;
			case 'photo':
				$post_html = $this->content_view->capture('post_photo.php');
				break;
			case 'link':
				$post_html = $this->content_view->capture('post_link.php');
				break;
			case 'audio':
				$post_html = $this->content_view->capture('post_audio.php');
				break;
			case 'video':
				$post_html = $this->content_view->capture('post_video.php');
				break;
			default:
				$post_html = $this->content_view->capture('post_regular.php');
				break;
		}

        $this->content_view->post_html = $post_html;
    
        
    }
    
    protected function content_view() {
        return $this->content_view->capture('blog_single_view.php');
    }
    
    
}
        