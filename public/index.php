<?php

// define ENVIROMENT
define('ENVIROMENT', $_SERVER['SERVER_NAME']);

// define DS
define('DS', DIRECTORY_SEPARATOR);

// define DOCUMENT_ROOT
switch(ENVIROMENT) {

    case 'dvbbs':
        define('DOCUMENT_ROOT', DS.'Users'.DS.'admin'.DS.'Sites'.DS.'dvbbspigeon'.DS);
        break;
    case '192.168.1.133':
        define('DOCUMENT_ROOT', DS.'Users'.DS.'admin'.DS.'Sites'.DS.'dvbbspigeon'.DS);
        break;
	case 'dvbbs.mac':
        define('DOCUMENT_ROOT', DS.'Users'.DS.'John'.DS.'Sites'.DS.'dvbbspigeon'.DS);
        break;
    
}

// include includes.php
require_once(DOCUMENT_ROOT.'private'.DS.'includes.php');

// spread wings
$pidgeon = new Pigeon();
echo $pidgeon->fly();

?>
