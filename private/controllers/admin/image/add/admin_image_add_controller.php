<?php
class Admin_Image_Add_Controller extends Admin_Image_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Add';
    }
    
    protected function content_view() {
		
        return $this->content_view->capture('admin_image_view.php');
    }
    
}
?>