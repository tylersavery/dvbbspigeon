<?php
class Ajax_Post_Analytic_Controller extends Post_Controller {

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
	
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = $_POST['key'];
        $value = $_POST['value'];
        $time = time();
        
        $a = new Analytic_Model;
        $a->set_ip($ip);
        $a->set_thekey($key);
        $a->set_thevalue($value);
        $a->set_time($time);
        $a->save();
        
    
    }

	function content_view() {

        return;

    }
}
?>