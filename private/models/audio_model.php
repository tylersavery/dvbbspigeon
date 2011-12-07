<?php
class Audio_Model extends Core_Audio_Model {
    
	protected $image;
	
    function __construct() {
		parent::__construct();
	}
	
	protected static function instantiate($record) {	
		$audio = parent::instantiate($record);
		
		$audio->image = Image_Model::find_by_id($audio->image_id);

		return $audio;
	}
	
	public function get_image(){
		return $this->image;
	}
	
	public function get_permalink(){
		
		if($this->get_filename() == ''){
			return false;
		}
		
		return '/audio/' . $this->get_filename();
	}
	
    
}
?>