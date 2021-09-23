<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('log_valid') == FALSE) {
      $this->session->set_flashdata("report", "<div class='alert alert-danger alert-dismissible fade show' role='alert'><small>Anda harus login terlebih dahulu.</small><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button></div>");
      redirect(base_url('login'));
    } elseif ($this->session->userdata('log_admin') == FALSE) {
      echo "Akses ditolak";
    }
    $this->load->model('admin/Transaction_data');
  }

  var $id_transaction;

  function list($x)
  {
    $data['page'] = 'transaction';

		$data['transaction_stat'] = $this->Transaction_data->get_transaction_stat();
		$q = $this->Transaction_data->get_transaction_list();
    
    if ($x == 'all') {
      $data['title'] = 'Daftar Transaksi';
			$data['title2'] = '';
			$data['transaction'] = $this->db->query("$q ORDER BY created ASC, status ASC")->result();

    } else {
      # code...
    }

    $this->load->view('admin/transaction/list', $data);
  }
}
