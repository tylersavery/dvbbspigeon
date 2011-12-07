<?php
class Stream_Controller extends Static_Main_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        $this->css[] = CSS_ROOT . 'stream.css';
        $this->meta[] = 'name="apple-mobile-web-app-capable" content="yes"';
        $this->meta[] = 'name="apple-mobile-web-app-status-bar-style" content="black"';



    }
    
    protected function content_view() {
        return $this->content_view->capture('stream_view.php');
    }
    
    
    protected function header_view(){
        return;
    }
    
    protected function footer_view(){
        return;
    }
    
   
}
?>