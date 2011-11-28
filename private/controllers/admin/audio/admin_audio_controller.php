<?php
class Admin_Audio_Controller extends Admin_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Audio';
        
        $this->header_view->active_link = 'audio';
    }
    
    protected function content_view() {
        $audios = Audio_Model::find_all();
        $this->content_view->audios = $audios;
        return $this->content_view->capture('admin_audios_view.php');
    }
    
}
?>