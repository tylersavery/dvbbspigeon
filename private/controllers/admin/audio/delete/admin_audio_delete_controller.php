<?php
class Admin_Audio_Delete_Controller extends Admin_Audio_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Delete';
    }
    
    protected function content_view() {
        if (isset($this->data['audio_id'])) {
            $audio = Audio_Model::find_by_id($this->data['audio_id']);
            $audio->delete();
        }
        redirect_to('/admin/audio');
    }
    
}
?>