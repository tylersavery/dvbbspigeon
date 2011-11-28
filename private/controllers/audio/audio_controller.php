<?php
class Audio_Controller extends Static_Main_Controller {
	
	function __construct($uri, $data) {
        parent::__construct($uri, $data);
		
		$audios = Audio_Model::find_all();
		$this->content_view->audios = $audios;
		
	}
	
	protected function content_view() {
        return $this->content_view->capture('audio_view.php');
    }
    
	
	
}