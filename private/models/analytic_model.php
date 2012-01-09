<?php
class Analytic_Model extends Core_Analytic_Model {
    
    function __construct() {
		parent::__construct();
	}
	
	
	public static function get_total_visits(){
		$sql = "SELECT COUNT(*) FROM " . static::$table_name . " WHERE thekey = 'visit'";
		
		global $database;
		$result_set = $database->query($sql);
		$result = $database->fetch_array($result_set);
		
		return $result[0];
	}
	
	public static function get_total_plays(){
		$sql = "SELECT COUNT(*) FROM " . static::$table_name . " WHERE thekey = 'play'";
		
		global $database;
		$result_set = $database->query($sql);
		$result = $database->fetch_array($result_set);
		
		return $result[0];
	}
	
	public static function get_total_desktop(){
		$sql = "SELECT COUNT(*) FROM " . static::$table_name . " WHERE thekey = 'visit' AND mobile = 0";
		
		global $database;
		$result_set = $database->query($sql);
		$result = $database->fetch_array($result_set);
		
		return $result[0];
	}
	
	public static function get_total_mobile(){
		$sql = "SELECT COUNT(*) FROM " . static::$table_name . " WHERE thekey = 'visit' AND mobile = 1";
		
		global $database;
		$result_set = $database->query($sql);
		$result = $database->fetch_array($result_set);
		
		return $result[0];
	}
	
	public static function get_plays_by_track($track_id){
		$sql = "SELECT COUNT(*) FROM " . static::$table_name . " WHERE thekey = 'play' AND thevalue = '" . $track_id . "'";
		
		global $database;
		$result_set = $database->query($sql);
		$result = $database->fetch_array($result_set);
		
		return $result[0];
	}
	
	public static function get_downloads_by_filename($filename){
		
		$sql = "SELECT COUNT(*) FROM " . static::$table_name . " WHERE thekey = 'download' AND thevalue = '" . $filename . "'";
		
		global $database;
		$result_set = $database->query($sql);
		$result = $database->fetch_array($result_set);
		
		return $result[0];
		
	}

	
    
}
?>