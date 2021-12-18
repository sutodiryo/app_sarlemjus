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
    $this->load->model('Master_data');
  }

  function index()
  {
    $data['page'] = array(
      "id" => "store",
      "title" => "Member Area | Store",
      "header" => "Belanja Sarlemus",
      "a" => array("icon" => "fas fa-tachometer-alt", "link" => "dashboard", "title" => "Dashboard"),
      "b" => array("link" => "store", "title" => "Store"),
      "c" => ""
    );

    $id = $this->session->userdata('log_id');

    $product = $this->Master_data->get_product_list('1');

    $data['product'] = $product;

    $this->load->view('member/store/list', $data);
  }


  function cart_add()
  {
    $id_member  = $this->session->userdata('log_id');
    $id_produk  = $this->input->post('id_produk');
    $q = $this->Member_model->get_product_purchase_cart($id_member, $id_produk);

    $data = array(
      'id'    => $id_produk,
      'qty'   => $this->input->post('quantity'),
      'price' => $q->harga,
      'name'  => $q->nama_produk,
      'weight'  => $q->berat,
      'options' => array(
        'image' => $q->img_1,
        'note' => $q->keterangan
      )
    );
    $this->cart->insert($data);
    echo $this->cart_show(0); //tampilkan cart setelah added
  }


  function cart_del()
  {
    $data = array(
      'rowid' => $this->input->post('row_id'),
      'qty' => 0,
    );
    $this->cart->update($data);
    echo $this->cart_show(0);
  }

  function cart_show($id_promo)
  {
    $id_member  = $this->session->userdata('log_id');

    $output     = '';
    $no         = 0;
    $tot_qty    = array_sum(array_column($this->cart->contents(), 'qty'));

    $member_shipping_default    = $this->Member_model->get_member_shipping_default($id_member);

    $str        = "'";
    foreach ($this->cart->contents() as $items) {
      $no++;

      $id_produk  =  $items['id'];
      $id_member  = $this->session->userdata('log_id');
      $q = $this->Member_model->get_product_purchase_cart($id_member, $id_produk);

      $stock = $q->stok - $q->stok_;

      $output .= '<tr>
                          <td title="' . $items['name'] . '">' . substr($items['name'], 0, 20) . '</td>
                          <td>' . number_format($items['price'], 0, '.', '.') . '</td>
                          <td class="text-center"><input id="qty' . $items['rowid'] . '" onchange="updateQty(' . $str . '' . $items['rowid'] . '' . $str . ',' . $str . '' . $items['id'] . '' . $str . ');" class="form-control form-control-sm" type="number" name="num-product' . $no++ . '" value="' . $items['qty'] . '" min="1" max="' . $stock . '"></td>
                          <td style="text-align:right;">' . number_format($items['subtotal'], 0, '.', '.') . '</td>
                          <td><a href="#" id="' . $items['rowid'] . '" class="hapus_cart table-action table-action-delete"><i class="fas fa-trash"></i></a></td>
                      </tr>';
    }

    $output .= '<tr>
                      <th colspan="2" style="text-align:right;">Subtotal :</th>
                      <th colspan="2" style="text-align:right;">' . 'Rp ' . number_format($this->cart->total(), 0, '.', '.') . '</th>
                  </tr>';

    if (!empty($member_shipping_default)) {

      $output .= '<tr id="member_shipping_address_selected" style="border:1px;">
                          <th colspan="4">
                          <label class="form-control-label" for="alamat"> Alamat Penerima</label>
                          <h4 class="mb-0">' . $member_shipping_default->nama_penerima . '';

      if ($member_shipping_default->status == 1) {
        $output .= '<font color="red"><small> [Utama]</small></font>';
      }

      $output .= '</h4>
                      <input type="hidden" name="shipping_selected_name" id="shipping_selected_name" value="' . $member_shipping_default->nama_penerima . '">
                      <input type="hidden" name="shipping_selected_no_hp" id="shipping_selected_no_hp" value="' . $member_shipping_default->no_hp_penerima . '">
                      <input type="hidden" name="id_subdistrict" id="id_subdistrict" value="' . $member_shipping_default->id_subdistrict . '">
                      <small>' . $member_shipping_default->no_hp_penerima . '</small>
                      <br>
                      <textarea class="form-control" style="padding: 0px; outline: none !important; border:0px ; font-size: 12px;" disabled>' . $member_shipping_default->full_address . ' - ' . $member_shipping_default->postal_code . '</textarea>
                      
                      <br>
                      <a data-toggle="modal" href="#modal_shipping_address" title="Ganti Alamat Pengiriman" class="btn btn-sm btn-default">Ganti Alamat</a>
                      </th>
              </tr>
              ';

      $tb_gram    = $this->get_weight('return');
      $tb_kg      = $tb_gram / 1000;

      $output .= '<tr>
                          <th colspan="3">
                          <label class="form-control-label" for="id_kurir">Kurir <small><font id="total_weight" color="blue">Total Berat : (' . $tb_kg . ' Kg)</font></small></label>
                          <select class="form-control form-control-sm" id="kurir" onchange="set_kurir()" required="">
                              <option value=""> Pilih Kurir</option>
                              <option value="tiki">Tiki - Titipan Kilat</option>
                              <option value="sicepat">Sicepat</option>
                              <option value="jne">JNE - Jalur Nugraha Ekakurir</option>
                              <option value="pos">POS Indonesia</option>
                              <option value="wahana">Wahana Prestasi Logistik</option>
                              <option value="jnt">JNT</option>
                              <option value="jet">JET Express</option>
                              <option value="ninja">Ninja Express</option>
                              <option value="lion">Lion Parcel</option>
                              <option value="anteraja">Anteraja</option>
                          </select>
                    </tr>
                    <tr><th colspan="3" id="datakurir"></th></tr>';
    } else {

      $output .= '<tr>
                          <th colspan="3" style="text-align:right;"><small><font color="red" >Anda belum mengatur alamat pengiriman</font></small></th>
                          <th style="text-align:right;">
                              <a data-toggle="modal" href="#modal_shipping_address" title="Tambah Alamat Pengiriman" class="btn btn-sm btn-default"><small>Tambah Alamat</small></a>
                          </th>
                      </tr>';
    }

    if ($id_promo == 0) {
      $nama_promo = "-";
      $nilai      = 0;

      if ($tot_qty >= 100) {

        $output .= '<tr>
                              <th colspan="3">
                                  <div id="div_promo" class="form-group">
                                      <label class="form-control-label" for="kode_promo">Kode Promo</label>
                                      <input type="text" onkeyup="check_promo()" id="kode_promo" class="form-control form-control-sm" placeholder="Masukkan Kode Promo yang anda miliki" required="">
                                      <div id="feedback_promo" class="invalid-feedback"></div>
                                      <br>
                                      <input type="hidden" name="nilai_promo" id="nilai_promo" value="0">
                                  </div>
                              </th>
                          </tr>';
      }
    } else {

      $q  = $this->db->query("SELECT nama_promo,nilai FROM promo WHERE id_promo='$id_promo'")->row();
      $nama_promo = $q->nama_promo;
      $nilai = $q->nilai;
      $output     .= '<tr>
                              <th colspan="2" style="text-align:right;"><font color="orange">
                              <input type="hidden" name="id_promo" id="id_promo" value="' . $id_promo . '">' . $nama_promo . ' :</font></th>
                              <th colspan="2" style="text-align:right;"><font color="orange">' . '- Rp ' . number_format($nilai, 0, '.', '.') . '<br><a href="javascript:;" onclick="cartshow2()">Ganti</a></font></th>
                          </tr>';
    }

    $total_cart     = $this->cart->total();

    $total = $total_cart;

    $output .= '<tr>
          <th colspan="2" style="text-align:right;"><font color="red">Total Tagihan :</font></th>
          <th colspan="2" style="text-align:right;">
                          <font color="red" id="total_tagihan">' . 'Rp ' . number_format($total - $nilai, 0, '.', '.') . '</font>
                          <input type="hidden" name="total_ongkir" id="total_ongkir">
                          <input type="hidden" name="shipingdesc" id="shipingdesc">
                          <input type="hidden" name="nilai_subtotal" id="nilai_subtotal" value="' . $total_cart . '">
                      </th>
        </tr>';

    if ($this->cart->total() == 0) {
      $output .= '<tr>
            <td colspan="5">
            <button form="save" class="btn btn-success btn-lg btn-block" disabled>Ke Pembayaran <i class="fa fa-arrow-right"></i></button>
          </tr>';
    } else {
      $output .= '<tr>
            <td colspan="5">
            <button id="pay-button" onclick="pay_snap()" form="save" class="btn btn-success btn-lg btn-block">Ke Pembayaran <i class="fa fa-arrow-right"></i></button>
          </tr>';
    }

    return $output;
  }



  function load_shipping_address($idsa)
  {
    $id_member  = $this->session->userdata('log_id');
    $q          = $this->Member_model->get_member_shipping_by_id($id_member, $idsa);
    $data       = '';

    $data .= '
      <th colspan="4" style="text-align:right;"><h4 class="mb-0">' . $q->nama_penerima . '';
    if ($q->status == 1) {
      $data .= '<font color="red"><small> [Utama]</small></font>';
    }

    $data .= '</h4>
                      <small>' . $q->no_hp_penerima . '</small>
                      <br>
                      <textarea class="form-control" style="padding: 0px; outline: none !important; border:0px ; font-size: 12px;" disabled>' . $q->full_address . ' - ' . $q->postal_code . '</textarea>
                      <br>
                      <input type="hidden" name="id_subdistrict" id="id_subdistrict" value="' . $q->id_subdistrict . '">
                      <a data-toggle="modal" href="#modal_shipping_address" title="Ganti Alamat Pengiriman" class="btn btn-sm btn-default">Ganti Alamat</a>
                      </th>';
    echo $data;
  }
}
