<?php
class Admin_Image_Delete_Controller extends Admin_Image_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Delete';
    }
    
    protected function content_view() {
        if (isset($this->data['image_id'])) {
            $image = Image_Model::find_by_id($this->data['image_id']);
            $image->delete();
        }
        redirect_to('/admin/images');
    }
    
}
?>