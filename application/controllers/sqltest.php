<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sqltest extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->db->select('*')->from('fakultas');
		$result=$this->db->get();
		print_r($result);
	}


}

/* End of file sqltest.php */
/* Location: ./application/controllers/sqltest.php */ ?>