<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Member_model');
	}

	function index()
	{
		// $data['level']		= $this->db->query("SELECT * FROM member_level ORDER BY nilai DESC, nama_level DESC")->result();
		// $data['product'] 	= $this->Member_model->get_product_front('LIMIT 8');

		// $data['total'] 		= $this->db->query("SELECT	(SELECT count(*) FROM member) AS member FROM member")->row();

		// $data['bonus'] 		= $this->Member_model->get_bonus();
		// $data['ldb'] 			= $this->Member_model->get_ldb();
		$data['x'] = 0;
		
		$this->load->view('guest/index', $data);
	}

}
