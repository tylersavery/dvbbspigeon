<?php
class Ajax_Post_Analytic_Controller extends Post_Controller {

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
	
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = $_POST['key'];
        $value = $_POST['value'];
        $time = time();
		$mobile = $_POST['mobile'];
		$facebook = $_POST['facebook'];
        
        $a = new Analytic_Model;
        $a->set_ip($ip);
        $a->set_thekey($key);
        $a->set_thevalue($value);
        $a->set_time($time);
		$a->set_mobile($mobile);
		$a->set_facebook($facebook);
        $a->save();
        
    
    }

	function content_view() {

        return;

    }
}
?>