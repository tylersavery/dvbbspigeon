<?php
class Lite_Controller extends Static_Main_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        //$this->css = null;

    }
    
    protected function content_view() {
        return $this->content_view->capture('lite_view.php');
    }
    
    
    protected function header_view(){
        return;
    }
    
    protected function footer_view(){
        return;
    }
    
   
}
?>