<?php
class Admin_Audio_Edit_Controller extends Admin_Audio_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Edit';
    }
    
    protected function content_view() {
        if (isset($this->data['audio_id'])) {
            $audio = Audio_Model::find_by_id($this->data['audio_id']);
            $this->content_view->audio = $audio;
        } else {
            redirect_to('/admin/audio');
        }
		
		$this->content_view->images = Image_Model::find_all();
		
        return $this->content_view->capture('admin_audio_view.php');
    }
    
}
?>