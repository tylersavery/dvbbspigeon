<?php
class Core_Analytic_Model extends Core_Model {

	protected static $table_name = 'analytics';
	protected static $db_fields = array(
		'id',
        'time',
        'ip',
        'thekey',
        'thevalue',
		'mobile'
	);

	protected $id;
    protected $time;
    protected $ip;
    protected $thekey;
    protected $thevalue;
	protected $mobile;

	function __construct() {
		parent::__construct();
	}

	public function get_id() {
		return $this->id;
	}

	public function set_id($id) {
		$this->id = $id;
	}
    
    public function get_time() {
		return $this->time;
	}

	public function set_time($value) {
		$this->time = $value;
	}

    public function get_ip() {
		return $this->ip;
	}

	public function set_ip($value) {
		$this->ip = $value;
	}
    
    public function get_thekey() {
		return $this->thekey;
	}

	public function set_thekey($value) {
		$this->thekey = $value;
	}
    
    public function get_thevalue() {
		return $this->thevalue;
	}

	public function set_thevalue($value) {
		$this->thevalue = $value;
	}
	
	public function get_mobile() {
		return $this->mobile;
	}

	public function set_mobile($value) {
		$this->mobile = $value;
	}
    
}
?>