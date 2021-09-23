<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Store extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('log_valid') == FALSE) {
      $this->session->set_flashdata("report", "<div class='alert alert-danger alert-dismissible fade show' role='alert'><small>Anda harus login terlebih dahulu.</small><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button></div>");
      redirect(base_url('login'));
    }
    $this->load->model('Member_model');
  }

  function index()
  {
    $data['page']     = array(
      "id" => "store",
      "title" => "Member Area | Store",
      "header" => "Product Store",
      "a" => array("icon" => "fas fa-tachometer-alt", "link" => "dashboard", "title" => "Dashboard"),
      "b" => array("link" => "store", "title" => "Product Store"),
      "c" => ""
    );

    $id = $this->session->userdata('log_id');

    $this->load->view('member/store/list', $data);
  }
}
