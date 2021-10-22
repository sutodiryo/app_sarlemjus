<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get extends CI_Controller
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
        $this->load->model('admin/Master_data');
    }

    public function index($x, $id)
    {
        $data = $this->db->query("SELECT * FROM $x WHERE id = '$id'")->row();
        echo json_encode($data);
    }

    public function slug()
    {
        echo strtolower(url_title($this->input->post('slug')));
    }

    public function course($tipe, $slug)
    {
        if ($tipe == "y") {
            echo json_encode($this->db->query("SELECT * FROM course WHERE slug = '$slug'")->row());
        }
    }
}
