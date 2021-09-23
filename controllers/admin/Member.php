<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('log_valid') == FALSE) {
			redirect(base_url('auth'));
		}
		if ($this->session->userdata('log_admin') == FALSE) {
			redirect(base_url('member'));
		}
		$this->load->model('admin/Member_data');
	}

	function list($x)
	{
		$data['page'] = 'member';

		$data['member_stat'] = $this->Member_data->get_member_stat();
		$q = $this->Member_data->get_member_list();
		if ($x == "all") {
			$data['title'] = 'Daftar Semua Member';
			$data['title2'] = '';
			$data['member'] = $this->db->query("$q ORDER BY level ASC, name ASC")->result();
		} else {
			$data['title'] = 'Daftar Member';
			$data['title2'] = $this->Member_data->get_member_level_detail($x);
			$data['member'] = $this->db->query("$q WHERE level=$x ORDER BY level ASC, name ASC")->result();
		}
		$this->load->view('admin/member/list', $data);
	}

	function detail($id)
	{
		$data['page'] = 'member';
		$data['title'] = 'Detail Mitra';
		$data['member'] = $this->Member_data->get_member_detail($id);
		$this->load->view('admin/member/detail', $data);
	}

	function add($x)
	{
		$data['page'] = 'member';
		$data['title'] = 'Tambah Member Baru';
		$data['upline'] = $this->db->query("SELECT member.id,member.name,member.phone FROM member ORDER BY member.name ASC")->result();
		$data['level'] = $this->db->query("SELECT id,level_name FROM member_level ORDER BY id ASC")->result();
		$data['bank'] = $this->db->query("SELECT id,name FROM bank ORDER BY id ASC")->result();
		$this->load->view('admin/member/add', $data);
	}

	function push_notification_msg()
	{
		$data['page'] 		= 'push_notification_msg';
		$data['title'] 	 	= 'Pesan Notifikasi';
		$data['msg']  		= $this->db->query("SELECT 	id_push_notification_msg,title,body,icon,action_link,id_member_level,last_update,
																									(SELECT nama_level FROM member_level WHERE id_member_level=push_notification_msg.id_member_level) AS level_member
																						FROM push_notification_msg")->result();
		$data['level']  	= $this->db->query("SELECT * FROM member_level ORDER BY smp DESC")->result();
		$this->load->view('admin/push_notification_msg', $data);
	}

	//ACT
	function act_add($x)
	{
		date_default_timezone_set('Asia/Jakarta');
		$now = date("Y-m-d h:i:s");

		if ($x == "member") {
			date_default_timezone_set('Asia/Jakarta');
			$now = date("Y-m-d h:i:s");
			$data = array(
				'name' => $this->input->post('name'),
				'upline' => $this->input->post('upline'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'password' => "e10adc3949ba59abbe56e057f20f883e",
				'gender' => $this->input->post('gender'),
				'img' => $this->input->post('img'), //file upload foto
				'nik' => $this->input->post('nik'),
				'nik_name' => $this->input->post('nik_name'),
				'npwp' => $this->input->post('npwp'),
				'npwp_name' => $this->input->post('npwp_name'),
				'bank' => $this->input->post('bank'),
				'bank_account' => $this->input->post('bank_account'),
				'bank_account_name' => $this->input->post('bank_account_name'),
				'province' => $this->input->post('province'),
				'district' => $this->input->post('district'),
				'subdistrict' => $this->input->post('subdistrict'),
				'village' => $this->input->post('village'),
				'postal_code' => $this->input->post('postal_code'),
				'work' => $this->input->post('work'),
				'level' => $this->input->post('level'),
				'address' => $this->input->post('address'),
				'registration_date' => $now,
				'notif_admin' => 1,
				'status' => 1
			);

			$this->db->insert('member', $data);

			$this->alert('info', 'Member berhasil ditambahkan...');
			redirect(base_url('admin/member/all'));
		} elseif ($x == "member_level") {
			$data = array(
				'nama_level'    => $this->input->post('nama_level'),
				'nilai' 		=> $this->input->post('nilai'),
				'smp' 			=> $this->input->post('smp'),
				'diskon' 		=> $this->input->post('diskon'),
				'keterangan'  	=> $this->input->post('keterangan')
			);

			$this->db->insert('member_level', $data);

			$this->alert('info', 'Level Member berhasil ditambahkan...');
			redirect(base_url('admin/master/level_member'));
		}
	}

	function edit($x, $y)
	{
		if ($x == "member") {
			$data['page'] 		= 'member';
			$data['title'] 		= 'Edit Member';
			$data['member'] 	= $this->db->query("SELECT * FROM member WHERE id_member='$y'")->result();
			// $data['video'] 		= $this->db->query("SELECT id_produk_link,id_produk,nama_link,link,deskripsi,status FROM produk_link WHERE id_produk='$y' AND status=1")->result();
			$this->load->view('admin/member/edit', $data);
		}
	}

	function set($x, $y, $z)
	// $x = modul, $y = status, $z = id
	{
		date_default_timezone_set('Asia/Jakarta');
		$now = date("Y-m-d h:i:s");

		$data = array('status' => $y);

		if ($x == "member") {
			$this->db->update($x, array('id_member'  => $z), $data);
			$page = "base_url('admin/member/list')";
		} elseif ($x == "member_level") {
			$this->db->query("UPDATE member SET level = '$y' WHERE id_member ='$z'");
			$page = "base_url('admin/member/list')";
		} elseif ($x == "upline") {
			$id_upline = $this->input->post('id_upline');
			$this->db->query("UPDATE $y SET id_upline = '$id_upline' WHERE id_member ='$z'");
			$page = "base_url('admin/member/all')";
		}

		$this->alert('warning', 'Data berhasil diupdate...');
		redirect($page);
	}

	function act($x, $id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$now = date("Y-m-d h:i:s");

		if ($x == "update_member") {
			$data = array(
				'nama'     		=> $this->input->post('nama'),
				'id_upline'     => $this->input->post('id_upline'),
				'no_hp'     	=> $this->input->post('no_hp'),
				'email' 		=> $this->input->post('email'),
				'id_location'   => $this->input->post('kota'),
				'level'  		=> $this->input->post('level'),
				'alamat'  		=> $this->input->post('alamat')
			);
			$id_member = $this->input->post('id_member');
			$this->db->update("member", $data, array('id_member'  => $id_member));

			$this->alert('success', 'Data berhasil diupdate...');
			redirect(base_url('admin/member/all'));
		} elseif ($x == "password_member") {
			$data = array(
				'password' => "e10adc3949ba59abbe56e057f20f883e"
			);
			$this->db->update("member", $data, array('id_member'  => $id));

			$this->alert('warning', 'Password member berhasil direset menjadi (123456)');
			$referred_from = $this->session->userdata('ref_member');
			redirect($referred_from);
		} elseif ($x == "update_member_level") {
			$data = array(
				'nama_level'    => $this->input->post('nama_level'),
				'nilai' 		=> $this->input->post('nilai'),
				'smp' 			=> $this->input->post('smp'),
				'diskon' 		=> $this->input->post('diskon'),
				'keterangan'  	=> $this->input->post('keterangan')
			);

			$id_member_level = $this->input->post('id_member_level');
			$this->db->update("member_level", $data, array('id_member_level'  => $id_member_level));

			$this->alert('success', 'Level Member berhasil diubah...');
			redirect(base_url('admin/master/level_member'));
		}
	}

	// JSON
	public function get($x, $id)
	{
		$data = $this->db->query("SELECT * FROM $x WHERE id_$x = '$id'")->row();
		echo json_encode($data);
	}



	function del($x, $id)
	{
		if ($x == "member_level") {
			$this->db->delete($x, array('id_member_level'  => $id));

			$this->alert('danger', 'Level member telah dihapus...');
			redirect(base_url('admin/master/level_member'));
		} elseif ($x == "member") {
			$this->db->delete($x, array('id_member'  => $id));

			$this->alert('danger', 'Member berhasil dihapus...');
			redirect(base_url('admin/member/all'));
		}
	}

	function send_push_notification($x, $y, $z)
	{
		// $x : tipe notifikasi, $y : id_level_member, $z : id_pesan
		// Server key from Firebase Console
		define('API_ACCESS_KEY', 'AAAA0K7wIxo:APA91bHI8y3pt_qi9F1C-RMURTs8jA2MQLFbiLSrftD78rsDnU7N1ywrc7PwoZFLAAdpZU7nrBu-Y2CHV9hdWcm-RTJaSXSVrwjSHkbOW1Us2zcbU5jAdtRBhc6EbQ9e5j6l5yrBHlE3');

		if ($x == "send_now") {

			$member_to 	= $this->db->query("SELECT token FROM push_notification WHERE id_member IN (SELECT id_member FROM member WHERE level='$y')")->result();
			$message 		= $this->db->query("SELECT * FROM push_notification_msg WHERE id_push_notification_msg='$z'")->row();

			foreach ($member_to as $mt) {
				$data = array(
					"to" => "$mt->token",
					"notification" => array("title" => "$message->title", "body" => "$message->body", "icon" => "$message->icon", "click_action" => "$message->action_link")
				);
			}
		} elseif ($x == "send_periode") {
			$data = array(
				"to" => "cNf2---6Vs9",
				"notification" => array("title" => "Shareurcodes.com", "body" => "A Code Sharing Blog!", "icon" => "icon.png", "click_action" => "http://shareurcodes.com")
			);
		}

		$data_string = json_encode($data);
		// echo "The Json Data : " . $data_string;

		$headers = array(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

		$result = curl_exec($ch);

		curl_close($ch);

		// echo "<p>&nbsp;</p>";
		// echo "The Result : " . $result;

		$this->alert('info', 'JSON DATA : ' . $data_string . '<p>&nbsp;</p> RESULT : ' . $result . '');
		redirect('admin/push_notification_msg');
	}

	// Flashdata Reporte
	function alert($x, $y)
	{
		// $x : warna
		// $y : pesan
		return $this->session->set_flashdata("report", "<div class='alert alert-$x alert-dismissible fade show' role='alert'><span class='alert-icon'><i class='ni ni-like-2'></i></span><span class='alert-text'><strong>$y</strong></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button></div>");
	}
}
