<?php

// include config.php
require_once(DOCUMENT_ROOT.'private'.DS.'config.php');

// include libraries
require_once(LIBRARY_ROOT.'functions.php');
require_once(LIBRARY_ROOT.'mysql_database.php');
require_once(LIBRARY_ROOT.'savant3.php');
require_once(LIBRARY_ROOT.'session.php');
require_once(LIBRARY_ROOT.'pagination.php');

require_once(LIBRARY_ROOT.'tumblr/clearbricks/_common.php');
require_once(LIBRARY_ROOT.'tumblr/read_tumblr_model.php');
require_once(LIBRARY_ROOT.'tumblr/read_tumblr_cache_model.php');

// include routes.php
require_once(PRIVATE_ROOT.'routes.php');

?>