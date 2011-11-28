<?php
class Core_Audio_Model extends Core_Model {

	protected static $table_name = 'audio';
	protected static $db_fields = array(
		'id',
		'title',
		'filename',
		'filetype',
		'filesize',
		'length',
		'image_id',
		'status'
	);

	protected $id;
	protected $title;
	protected $filename;
	protected $filetype;
	protected $filesize;
	protected $length;
	protected $image_id;
	protected $status;

	function __construct() {
		parent::__construct();
	}

	public function get_id() {
		return $this->id;
	}

	public function set_id($id) {
		$this->id = $id;
	}

	public function get_title() {
		return $this->title;
	}

	public function set_title($title) {
		$this->title = $title;
	}
	
	public function get_filename() {
		return $this->filename;
	}

	public function set_filename($filename) {
		$this->filename = $filename;
	}
	
	public function get_filetype() {
		return $this->filetype;
	}

	public function set_filetype($filetype) {
		$this->filetype = $filetype;
	}
	
	public function get_filesize() {
		return $this->filesize;
	}

	public function set_filesize($filesize) {
		$this->filesize = $filesize;
	}
	
	public function get_length() {
		return $this->length;
	}

	public function set_length($length) {
		$this->length = $length;
	}
	
	public function get_image_id() {
		return $this->image_id;
	}

	public function set_image_id($image_id) {
		$this->image_id = $image_id;
	}

	public function get_status() {
		return $this->status;
	}

	public function set_status($status) {
		$this->status = $status;
	}

}
?>