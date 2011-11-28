<?php
class Blog_Controller extends Static_Main_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        if(PLEASE_CACHE){
            $alex = new Read_Tumblr_Cache('tylerdevelopment','phpTumblr', CACHE_DIRECTORY, CACHE_TIME);
        } else {
            $alex = new Read_Tumblr('tylerdevelopment');
        }
        
        $alex->getPosts(0, 20, null, null);
        $data_alex = $alex->dumpArray();
        $posts_alex = $data_alex['posts'];
        
        $this->content_view->posts_alex = $posts_alex;
        
        if(isset($_GET['debug'])){
            debug($posts_alex);
        }
        
    }
    
    
    protected function content_view() {
        return $this->content_view->capture('blog_view.php');
    }
    
    
}
        