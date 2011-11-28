<?php
class Admin_Image_Controller extends Admin_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Image';
        
        $this->header_view->active_link = 'image';
    }
    
    protected function content_view() {
        $images = Image_Model::find_all();
        $this->content_view->images = $images;
        return $this->content_view->capture('admin_images_view.php');
    }
    
}
?>