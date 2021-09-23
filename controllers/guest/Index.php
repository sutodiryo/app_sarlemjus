<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member_model');
	}

	function index()
	{
		$data['level']		= $this->db->query("SELECT * FROM member_level ORDER BY nilai DESC, nama_level DESC")->result();
		$data['product'] 	= $this->Member_model->get_product_front('LIMIT 8');

		$data['total'] 		= $this->db->query("SELECT	(SELECT count(*) FROM member) AS member FROM member")->row();

		$data['bonus'] 		= $this->Member_model->get_bonus();
		$data['ldb'] 			= $this->Member_model->get_ldb();
		
		$this->load->view('front/index', $data);
	}

	function katalog()
	{
		$data['product']	= $this->Member_model->get_product_front('');
		$this->load->view('front/katalog', $data);
	}

	function event()
	{
		$data['event']	= $this->db->query("SELECT	id_event_schedule,event_name,id_location,lat,lng,address,note,date_start,date_end,status,tipe,
													(SELECT location_name FROM location WHERE id_location=event_schedule.id_location) AS city
													FROM event_schedule
													ORDER BY date_start DESC, date_end DESC")->result();
		$this->load->view('front/event', $data);
	}

	//Landingpage Member
	function lp($slug, $id_member)
	{
		// $data['page'] 	= $this->db->query("SELECT page FROM product WHERE slug='$slug'")->result();
		$data['member'] = $this->db->query("SELECT no_hp FROM member WHERE id_member='$id_member'")->row();
		$this->load->view('front/lp/' . $slug, $data);
	}

	//Register Member
	function reg($id_member)
	{
		$data['id_member'] 	= $id_member;
		$data['member'] 	= $this->db->query("SELECT id_member,nama,username FROM member WHERE id_member='$id_member'")->result();
		$this->load->view('front/reg', $data);
	}

	function rgs()
	{
		$this->load->view('front/registered');
	}

	function act_reg()
	{
		$now 	= date("Y-m-d");
		$data 	= array(
			'id_member'  	=> NULL,
			'id_upline'  	=> $this->input->post('id_upline'),
			'username'  	=> $this->input->post('no_hp'),
			'password'   	=> md5($this->input->post('password')),
			'nama'       	=> $this->input->post('nama'),
			'no_hp'      	=> $this->input->post('no_hp'),
			'email'      	=> $this->input->post('email'),
			'level'      	=> $this->input->post('level'),
			'tgl_reg'      	=> $now,
			'id_bank'      	=> NULL,
			'no_rekening'   => NULL,
			'nama_rekening' => NULL,
			'alamat'      	=> NULL,
			'kota'      	=> NULL,
			'pekerjaan'     => NULL,
			'status'      	=> 0
		);

		$this->db->insert('member', $data);

		$admin = $this->input->post('admin');
		if ($admin == 1) {
			$this->session->set_flashdata("report", "<div class='form-group'><div class='alert alert-success'><strong>Distributor telah ditambahkan... </strong>Password = (123456)</div></div>");
			redirect(base_url('admin/member/all'));
		} else {
			// $this->session->set_flashdata("report", "<div class='form-group'><div class='alert alert-success'><strong>Registrasi Reseller Berhasil!! </strong>Anda dapat login sekarang...</div></div>");
			// redirect(base_url('login'));
			$this->load->view('front/registered');
		}
	}

	public function check_username_availablity()
	{
		$get_result = $this->Auth_model->check_username_availablity();
		if (!$get_result)
			echo '<div class="form-group"><div class="alert alert-danger"><strong>Sayang sekali!</strong> Username sudah dipakai...</div></div>';
		else
			echo '<div class="form-group"><div class="alert alert-success"><strong>Selamat!</strong> Username masih tersedia...</div></div>';
	}

	public function check_email_availablity()
	{
		$get_result = $this->Auth_model->check_email_availablity();
		if (!$get_result)
			echo '<div class="form-group"><div class="alert alert-danger"><strong></strong> Email sudah terdaftar...</div></div>';
		else
			echo '<div class="form-group"><div class="alert alert-success"><strong></strong> Email masih tersedia...</div></div>';
	}
}
