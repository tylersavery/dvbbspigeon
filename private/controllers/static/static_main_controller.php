<?php
class Static_Main_Controller extends Static_Base_Controller {
      
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        $this->css[] = CSS_ROOT . 'main.css';
		$this->css[] = CSS_ROOT . 'stream.css';

		$this->js_head[] = JS_ROOT . 'jquery.ui.js';
		$this->js_head[] = JS_ROOT . 'libraries/jquery.easing.js';
		$this->js_head[] = JS_ROOT . 'libraries/modernizr.js';
		$this->js_head[] = JS_ROOT . 'libraries/froogaloop.js';
        $this->js_head[] = JS_ROOT . 'libraries/color.js';
        

		$this->meta[] = 'name="apple-mobile-web-app-capable" content="yes"';
        $this->meta[] = 'name="apple-mobile-web-app-status-bar-style" content="black"';

		
		$this->content_view->player = $this->content_view->capture('player_view.php');
		
        
	}
    
    protected function content_view() {
		
		
		
        return $this->content_view->capture('main_view.php');
    }
	
	   
    protected function header_view() {
        return $this->header_view->capture('main_header_view.php');
    }
    
    protected function footer_view() {
        return $this->footer_view->capture('main_footer_view.php');
    }
    
}
?>