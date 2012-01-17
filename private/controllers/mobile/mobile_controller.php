<?php
class Mobile_Controller extends Static_Main_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        $this->css = null;
        $this->css[] = '/css/reset.css';
        
        $this->js_head[] = JS_ROOT . 'jquery.ui.touch.js';
        $this->js_head[] = JS_ROOT . 'mobile.js';
        $this->css[] = '/css/mobile.css';

        $this->meta[] = 'name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0"';    
		$this->meta[] = 'name="apple-mobile-web-app-capable" content="yes"';
        $this->meta[] = 'name="apple-mobile-web-app-status-bar-style" content="black"';

    

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