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
    $this->load->model('Transaction_data');
  }

  var $id_transaction;

  function list($x)
  {
    $data['page'] = 'transaction';

    $data['transaction_stat'] = $this->Transaction_data->get_transaction_stat();
    $data['sel_member'] = $this->Transaction_data->get_member_list();
    $data['sel_product'] = $this->Transaction_data->get_product_list();
    $q = $this->Transaction_data->get_transaction_list();

    if ($x == 'all') {
      $data['title'] = 'Daftar Transaksi';
      $data['title2'] = '';
      $data['transaction'] = $this->db->query("$q ORDER BY date_created ASC, status ASC")->result();
    } else {
      # code...
    }

    $this->load->view('admin/transaction/list', $data);
  }

  function stock($x)
  {
    $data['page'] = 'stock';

    if ($x == "product") {

      $data['title'] = 'Stok Produk';
      $data['product'] = $this->Transaction_data->get_product_stock_list();
      // $data['product'] = $this->Transaction_data->get_product_stock();

      $this->load->view('admin/transaction/stock_product', $data);
    } else {

      $data['title'] = 'Stok Produk ';
      $data['product'] = $this->Transaction_data->get_product_by_id($x);
      // $data['product_list'] = $this->Transaction_data->get_product_list();
      $data['stock'] = $this->Transaction_data->get_stock_by_product_id($x);

      $this->load->view('admin/transaction/stock_product_list', $data);
    }
  }


  function add($x)
  {
    date_default_timezone_set('Asia/Jakarta');
    $now = date("Y-m-d h:i:s");

    if ($x == "stock") {
      $id_admin = $this->session->userdata('log_id');

      $data = array(
        'id_product' => $this->input->post('id_product'),
        'id_admin' => $id_admin,
        'type' => $this->input->post('type'),
        'stock_update' => $this->input->post('stock_update'),
        'time' => $now,
        'note' => $this->input->post('note')
      );

      $this->db->insert('product_stock', $data);

      $this->alert('info', 'Stok berhasil ditambahkan...');
      $referred_link = $this->session->userdata('referred_stock_product_list');
      redirect($referred_link);
    }
  }



  // Flashdata Report
  function alert($x, $y)
  {
    // $x : warna
    // $y : pesan
    return $this->session->set_flashdata("report", "<div class='alert alert-$x alert-dismissible fade show' role='alert'><strong>$y</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button></div>");
  }
}
