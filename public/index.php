<?php

// define ENVIROMENT
define('ENVIROMENT', $_SERVER['SERVER_NAME']);

// define DS
define('DS', DIRECTORY_SEPARATOR);



// define DOCUMENT_ROOT
switch(ENVIROMENT) {
	case 'www.dvbbs.com':
		header('Location http://dvbbs.com');
		break;
	case 'dvbbs.com':
        define('DOCUMENT_ROOT', DS.'data'.DS.'web'.DS.'dvbbs.com'.DS);
        break;
    case 'dvbbs':
        define('DOCUMENT_ROOT', DS.'Users'.DS.'admin'.DS.'Sites'.DS.'dvbbspigeon'.DS);
        break;
    case '192.168.1.113':
        define('DOCUMENT_ROOT', DS.'Users'.DS.'admin'.DS.'Sites'.DS.'dvbbspigeon'.DS);
        break;
	case 'dvbbs.mac':
        define('DOCUMENT_ROOT', DS.'Users'.DS.'John'.DS.'Sites'.DS.'dvbbspigeon'.DS);
        break;
    case 'dvbbs.theyoungastronauts.com':
        define('DOCUMENT_ROOT', DS.'data'.DS.'web'.DS.'dvbbs.theyoungastronauts.com'.DS);
        break;
    
}

// include includes.php
require_once(DOCUMENT_ROOT.'private'.DS.'includes.php');

// spread wings
$pidgeon = new Pigeon();
echo $pidgeon->fly();

?>
