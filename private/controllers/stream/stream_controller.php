<?php
class Stream_Controller extends Static_Main_Controller {
    
    
    public $canada;
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        $this->js_head[] = JS_ROOT . 'swfobject.js';
        $this->js_head[] = JS_ROOT . 'main.js?v=5';
        //$this->css[] = '/css/mobile.css';
        
        if(strstr($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'], 'iPod') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'bada')){

            header('Location: /m');
        
        }
        
        $gi = geoip_open(LIBRARY_ROOT . "GeoIP.dat", GEOIP_STANDARD);
        $ip = $_SERVER['REMOTE_ADDR'];        
        if($ip == '127.0.0.1'){
            $ip = '173.239.172.250';
        }
        
        $country = geoip_country_code_by_addr($gi, $ip);

        if($country == 'CA'){
            $this->canada = true;
        } else {
            $this->canada = false;
        }

    }
    
    protected function content_view() {
        
        $this->content_view->canada = $this->canada;
        
        return $this->content_view->capture('stream_view.php');
    }
    
    
    protected function header_view(){
        return;
    }
    
    protected function footer_view(){
        return;
    }
    
   
}
?>