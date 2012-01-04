<?php
class Blog_Controller extends Static_Main_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        if(PLEASE_CACHE){
            $tumblr = new Read_Tumblr_Cache('tylerdevelopment','phpTumblr', CACHE_DIRECTORY, CACHE_TIME);
        } else {
            $tumblr = new Read_Tumblr('tylerdevelopment');
        }
		
		$this->css[] = '/css/blog.css';
		$this->js_head[] = '/js/blog.js';
		
		$this->title .= " | B L O G";
        
        $tumblr->getPosts(0, 20, null, null);
        $post_data = $tumblr->dumpArray();
        $posts = $post_data['posts'];

		$post_html = array();
		
		foreach($posts as $post){
			
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

			$posts_html[] = $post_html;	
			
		}
				
        
        $this->content_view->posts_html = $posts_html;
        
        
    }
    
    protected function content_view() {
        return $this->content_view->capture('blog_view.php');
    }
    
    
}
        