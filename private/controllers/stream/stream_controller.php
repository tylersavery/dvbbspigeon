<?php
class Stream_Controller extends Static_Main_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        $this->js_head[] = JS_ROOT . 'main.js';
        //$this->css[] = '/css/mobile.css';
        
        if(strstr($_SERVER['HTTP_USER_AGENT'], 'iPhone')){

            header('Location: /m');
        }

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