<?php
class Image_Model extends Core_Image_Model {
    
    function __construct() {
		parent::__construct();
	}


	public function get_permalink(){
		return '/images/uploads/' . $this->get_filename();
	}
    
}
?>