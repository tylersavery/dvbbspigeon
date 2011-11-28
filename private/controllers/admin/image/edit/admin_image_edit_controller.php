<?php
class Admin_Image_Edit_Controller extends Admin_Image_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Edit';
    }
    
    protected function content_view() {
        if (isset($this->data['image_id'])) {
            $image = Image_Model::find_by_id($this->data['image_id']);
            $this->content_view->image = $image;
        } else {
            redirect_to('/admin/images');
        }
        return $this->content_view->capture('admin_image_view.php');
    }
    
}
?>