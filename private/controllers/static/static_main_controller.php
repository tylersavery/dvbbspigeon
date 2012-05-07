<?php
class Static_Main_Controller extends Static_Base_Controller {
      
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        $this->css[] = CSS_ROOT . 'main.css?v=2';
		$this->css[] = CSS_ROOT . 'stream.css?v=2';

		$this->js_head[] = JS_ROOT . 'jquery.ui.js';
		$this->js_head[] = JS_ROOT . 'libraries/jquery.easing.js';
		$this->js_head[] = JS_ROOT . 'libraries/modernizr.js';
		$this->js_head[] = JS_ROOT . 'libraries/froogaloop.js';
        $this->js_head[] = JS_ROOT . 'libraries/color.js';
  
  /*
		print_r($_SERVER['HTTP_USER_AGENT']);
		die();
  */
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