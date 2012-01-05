<?php

// define enviroment specific constants
switch(ENVIROMENT) {

    case 'dvbbs':
        define('MODE', 'DEVELOPMENT');
        define('DB_HOST', '127.0.0.1');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'dvbbs');
        define('DB_SALT', '184eb8106b887c6928b11c6d29b5cda4');
        define('DEBUG', TRUE);
        define('MIN_JS', FALSE);
        define('URL', 'http://dvbbs/');
        define('FB_APP_ID', '');
        define('PLEASE_CACHE', false);
		define('FFMPEG', null);
        break;
	case '192.168.1.154':
        define('MODE', 'DEVELOPMENT');
        define('DB_HOST', '127.0.0.1');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'dvbbs');
        define('DB_SALT', '184eb8106b887c6928b11c6d29b5cda4');
        define('DEBUG', TRUE);
        define('MIN_JS', FALSE);
        define('URL', 'http://dvbbs/');
        define('FB_APP_ID', '');
        define('PLEASE_CACHE', false);
		define('FFMPEG', null);
        break;
	case 'dvbbs.mac':
        define('MODE', 'DEVELOPMENT');
        define('DB_HOST', '127.0.0.1');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'dvbbs');
        define('DB_SALT', '184eb8106b887c6928b11c6d29b5cda4');
        define('DEBUG', TRUE);
        define('MIN_JS', FALSE);
        define('URL', 'http://dvbbs.mac/');
        define('FB_APP_ID', '');
        define('PLEASE_CACHE', false);
		define('FFMPEG', '/opt/local/bin/ffmpeg');
        break;
	case 'dvbbs.theyoungastronauts.com':
        define('MODE', 'DEVELOPMENT');
        define('DB_HOST', '127.0.0.1');
        define('DB_USER', 'dvbbs');
        define('DB_PASS', 'wiiPei9ienah');
        define('DB_NAME', 'dvbbs');
        define('DB_SALT', '184eb8106b887c6928b11c6d29b5cda4');
        define('DEBUG', TRUE);
        define('MIN_JS', FALSE);
        define('URL', 'http://dvbbs/');
        define('FB_APP_ID', '');
        define('PLEASE_CACHE', false);
		define('FFMPEG', null);
        break;
}

// define ROOT directories

//private
define('PRIVATE_ROOT', DOCUMENT_ROOT.'private'.DS);
define('PUBLIC_ROOT', DOCUMENT_ROOT.'public'.DS);
define('CORE_ROOT', PRIVATE_ROOT.'core'.DS);
define('CORE_MODEL_ROOT', CORE_ROOT.'models'.DS);
define('CORE_CONTROLLER_ROOT', CORE_ROOT.'controllers'.DS);
define('MODEL_ROOT', PRIVATE_ROOT.'models'.DS);
define('VIEW_ROOT', PRIVATE_ROOT.'views'.DS);
define('CONTROLLER_ROOT', PRIVATE_ROOT.'controllers'.DS);
define('STATIC_CONTROLLER_ROOT', CONTROLLER_ROOT.'static'.DS);
define('LIBRARY_ROOT', PRIVATE_ROOT.'libraries'.DS);
define('IMAGE_UPLOAD_ROOT', PUBLIC_ROOT.'images'.DS.'uploads'.DS);
define('CACHE_DIRECTORY', PRIVATE_ROOT.'cache'.DS);
define('CACHE_TIME', 3600);
define('AUDIO_DIRECTORY', PUBLIC_ROOT.'audio'.DS);
define('UPLOAD_DIRECTORY', PUBLIC_ROOT.'images'.DS.'uploads'.DS);

//public
define('IMAGE_ROOT', '/images/');
define('CSS_ROOT', '/css/');
define('JS_ROOT', '/js/');


header('Pragma: public');
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");                  // Date in the past   
header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');     // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0');    // HTTP/1.1
header ("Pragma: no-cache");
header("Expires: 0");


?>