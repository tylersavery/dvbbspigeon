<?php
class Admin_Audio_Add_Controller extends Admin_Audio_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Add';
    }
    
    protected function content_view() {
		
		$this->content_view->images = Image_Model::find_all();
		
        return $this->content_view->capture('admin_audio_view.php');
    }
    
}
?>