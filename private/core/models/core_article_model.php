<?php
class Core_Article_Model extends Core_Model {

	protected static $table_name = 'articles';
	protected static $db_fields = array(
		'id',
		'user_id',
		'category_id',
		'title',
		'subtitle',
		'body',
		'slug',
		'time_create',
		'time_update',
		'time_publish',
		'status',
	);

    protected $id;
	protected $user_id;
	protected $category_id;
	protected $title;
	protected $subtitle;
	protected $body;
	protected $slug;
	protected $time_create;
	protected $time_update;
	protected $time_publish;
	protected $status;
    
	function __construct() {
		parent::__construct();
	}

	public function get_id() {
		return $this->id;
	}

	public function get_user_id() {
		return $this->user_id;
	}

	public function set_user_id($user_id) {
		$this->user_id = $user_id;
	}

	public function get_category_id() {
		return $this->category_id;
	}

	public function set_category_id($category_id) {
		$this->category_id = $category_id;
	}
	
	public function get_title() {
		return $this->title;
	}

	public function set_title($title) {
		$this->title = $title;
	}

	public function get_subtitle() {
		return $this->subtitle;
	}

	public function set_subtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

	public function get_body() {
		
		return $this->body;
	}

	public function set_body($body) {
		$this->body = $body;
	}

	public function get_slug() {
		return $this->slug;
	}

	public function set_slug($slug) {
		$this->slug = $slug;
	}
	

	public function get_time_create() {
		return $this->time_create;
	}

	public function set_time_create($time_create) {
		$this->time_create = $time_create;
	}

	public function get_time_update() {
		return $this->time_update;
	}

	public function set_time_update($time_update) {
		$this->time_update = $time_update;
	}

	public function get_time_publish() {
		return $this->time_publish;
	}

	public function set_time_publish($time_publish) {
		$this->time_publish = $time_publish;
	}

	public function get_status() {
		return $this->status;
	}

	public function set_status($status) {
		$this->status = $status;
	}
	
	

}
?>