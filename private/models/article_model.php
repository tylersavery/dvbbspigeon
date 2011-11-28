<?php
class Article_Model extends Core_Article_Model {
	
	protected $user;
	protected $category;
	
    function __construct() {
		parent::__construct();	
	}
	
	protected static function instantiate($record) {	
		$article = parent::instantiate($record);
		
		$article->user = User_Model::find_by_id($article->user_id);
		$article->category = Category_Model::find_by_id($article->category_id);

		return $article;
	}
	
	public static function find_by_slug($slug) {
		$result = static::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE slug = '". $slug . "' LIMIT 1");
		return !empty($result) ? array_shift($result) : false;
		
	}
	
	protected function create(){
		$this->set_time_create(time());
		parent::create();
	}
	
	
	public function get_user(){
		return $this->user;
	}
	
	public function get_category(){
		return $this->category;
	}

	public function get_friendly_status() {
		switch ($this->get_status()){
			case 'a':
				return 'Active';
				break;
			case 'p':
				return 'Draft';
				break;
			case 'd':
				return 'Deleted';
			break;
		}
		return '';
	}
	
	public function get_permalink() {
		return '/article/' . $this->slug;
	}
	
	
	

}
?>