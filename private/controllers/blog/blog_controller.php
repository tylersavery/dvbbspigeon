<?php
class Blog_Controller extends Static_Main_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        if(PLEASE_CACHE){
            $tumblr = new Read_Tumblr_Cache('tylerdevelopment','phpTumblr', CACHE_DIRECTORY, CACHE_TIME);
        } else {
            $alex_tumblr = new Read_Tumblr('tylerdevelopment');
			$chris_tumblr = new Read_Tumblr('tylerdevelopmentchris');
			$dvbbs_tumblr = new Read_Tumblr('tylersdevelopmentdvbbs');
        }
		
		$this->css[] = '/css/blog.css';
		$this->js_head[] = '/js/blog.js';
		
		$this->title .= " | B L O G";
        
        $alex_tumblr->getPosts(0, 20, null, null);
        $alex_post_data = $alex_tumblr->dumpArray();
        $alex_posts = $alex_post_data['posts'];
		
		$chris_tumblr->getPosts(0, 20, null, null);
        $chris_post_data = $chris_tumblr->dumpArray();
        $chris_posts = $chris_post_data['posts'];
		
		$dvbbs_tumblr->getPosts(0, 20, null, null);
        $dvbbs_post_data = $dvbbs_tumblr->dumpArray();
        $dvbbs_posts = $dvbbs_post_data['posts'];

		$combined_posts = array_merge($alex_posts, $chris_posts, $dvbbs_posts);
		
		usort($combined_posts, 'compare_arrays');

		$post_html = array();
		
		foreach($combined_posts as $post){
			
			$this->content_view->post = $post;
			
			if(strpos($post['url'], 'tylerdevelopment.tumblr') > 0){
				$author = 'alex';
			} else if(strpos($post['url'], 'tylerdevelopmentchris.tumblr') > 0){
				$author = 'chris';
			} else {
				$author = 'dvbbs';
			}
			
			$this->content_view->author = $author;
			$this->twitter_url = 'http://twitter.com/dvbbsalex';
			$this->facebook_url = 'http://facebook.com/dvbbsalex';
			
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
        