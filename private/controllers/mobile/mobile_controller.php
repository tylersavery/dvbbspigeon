<?php
class Mobile_Controller extends Static_Main_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        $this->css = null;
        $this->css[] = '/css/reset.css';
        
        $this->js_head[] = JS_ROOT . 'mobile.js';
        $this->css[] = '/css/mobile.css';

    }
    
    protected function content_view() {
        return $this->content_view->capture('mobile_view.php');
    }
    
    
    protected function header_view(){
        return;
    }
    
    protected function footer_view(){
        return;
    }
    
   
}
?>