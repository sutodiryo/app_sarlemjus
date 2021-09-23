<?php $this->load->view('admin/_/header'); ?>

<div class="header pb-6" onload="total_tagihan()">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-8 col-7">
          <h6 class="h2 d-inline-block mb-0"><?php echo $title ?></h6>
        </div>

        <div class="col-lg-4 col-5 text-right">
          <a href="<?php echo base_url('member/transaction/all') ?>" class="btn btn-sm btn-danger" title="Kembali"><i class="fa fa-reply"></i> Kembali</a>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-12 col-md-6">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">

  <!-- <form action="<?php echo base_url('member/act_checkout') ?>" method="POST"> -->
  <div class="row">
    <div class="col-xl-6 col-md-6">
      <div class="card border-0">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Rincian Belanja</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive py-4">

          <div class="flex-w flex-sb-m p-b-12 bo20">
            <table class="table align-items-center table-flush">
              <tbody>
                <?php
                $no = 0;

                foreach ($this->cart->contents() as $items) {
                  $no++;
                  $id_produk  =  $items['id'];
                  $id_member  = $this->session->userdata('log_id');
                  $q = $this->Member_model->get_product_purchase_cart($id_member, $id_produk);

                  $stock        = $q->stok - $q->stok_;

                  $qty[] = $items['qty'];
                  $tot_berat[]  = $items['qty'] * $items['weight'];

                  echo "<tr>
                        <th><img style='height: 75px;' src='" . ASSETS . "produk/" . $items['options']['image'] . "'></th>
                        <td>(" . $items['qty'] . ")</td>
                        <td>" . $items['name'] . "</td>
                        <td>Rp " . number_format($items['price'] * $items['qty'], 0, '.', '.') . "</td>
                      </tr>";
                }

                $total_cart     = $this->cart->total();
                $tot_qty        = array_sum($qty);
                $tot_berat      = (array_sum($tot_berat) / 1000);
                ?>
              </tbody>
            </table>
            <div class="flex-w flex-sb-m p-b-12 bo20">
              <table class="table align-items-center table-flush">
                <tbody>
                  <tr>
                    <th>Jumlah Pesanan</th>
                    <td><?php echo $tot_qty ?> pcs</td>
                  </tr>
                  <tr>
                    <th>Jumlah Berat</th>
                    <td><?php echo $tot_berat ?> Kg</td>
                  </tr>
                  <tr>
                    <th>Subtotal</th>
                    <td>
                      <?php echo "Rp " . number_format($total_cart, 0, '.', '.') . ""; ?>
                      <br>
                      <input type="hidden" name="nilai_subtotal" id="nilai_subtotal" value="<?php echo $total_cart ?>">
                    </td>
                  </tr>
                  <tr>
                    <th>Ongkos Kirim</th>
                    <td>
                      <span id="jumlahongkir">
                        <a href="#optionkurir"><small><i>Pilih Jasa Pengiriman</i></small></a>
                      </span>
                      <br>
                      <input type="hidden" name="total_ongkir" id="total_ongkir">
                      <br>
                      <input type="hidden" name="shipingdesc" id="shipingdesc">
                    </td>
                  </tr>
                  <tr>
                    <th>Promo</th>
                    <td>
                      <span id="selected_promo">
                        <a href="#optionvoucher"><small><i>Masukkan Kode Promo</i></small></a>
                        <br>
                        <input type="hidden" name="nilai_promo" id="nilai_promo" value="0">
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <h3>Total Tagihan</h3>
                    </th>
                    <th>
                      <h3 id="total_tagihan"></h3>
                    </th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-6">

      <div class="card border-0">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Penerima</h3>
            </div>

          </div>
        </div>
        <div class="card-body">
          <div class="form-group" id="member_shipping_address_selected">

            <?php
            if (!empty($member_shipping)) {

              echo "<div class='row align-items-center'>
                        <div class='col-8'>
                            <h4 class='mb-0'>$member_shipping->nama_penerima";

              if ($member_shipping->status == 1) {
                echo "<font color='red'><small> [Utama]</small></font>";
              }

              echo "</h4>
                        </div>
                        <div class='col-4 text-right'>
                        <a data-toggle='modal' href='#modal_shipping_address' title='Ganti Alamat Pengiriman' class='btn btn-sm btn-default'>Ganti Alamat</a>
                        </div>
                        <div class='col'>
                            <h5>$member_shipping->no_hp_penerima</h5>
                            <h5>$member_shipping->full_address - $member_shipping->postal_code</h5>
                        </div>
                    </div>
                    <input type='hidden' name='id_subdistrict' id='id_subdistrict' value='" . $member_shipping->id_subdistrict . "'>";
            } else {

              echo "<div class='row align-items-center'>
                        <div class='col-8'>
                            <h4 class='mb-0'>Anda belum mengatur alamat pengiriman</h4>
                        </div>
                        <div class='col-4 text-right'>
                        <a data-toggle='modal' href='#modal_shipping_address' title='Hapus Alamat Pengiriman ini' class='btn btn-sm btn-default'>Tambah Alamat</a>
                        </div>
                    </div>";
            }
            ?>
          </div>
          <!-- <br> -->
          <div class="form-group">
            <label class="form-control-label" for="kurir">Jasa Pengiriman</label>
            <select class="form-control" id="kurir" name="kurir" required="">
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
            <table class="">
              <tbody id="datakurir"></tbody>
            </table>
          </div>

          <div id="select_promo">
            <div id="div_promo" class="form-group">
              <label class="form-control-label" for="exampleFormControlSelect1">Kode Promo</label>
              <input type="text" onkeyup="check_promo()" id="kode_promo" class="form-control " placeholder="Kode Promo" required="">
              <div id="feedback_promo" class="invalid-feedback"></div>
            </div>
          </div>

          <div id="payment_gateway" class="form-group">
            <label class="form-control-label" for="exampleFormControlSelect1">Pembayaran</label>
            <div class="custom-control custom-radio mb-3">
              <input name="custom-radio-1" class="custom-control-input" id="customRadio5" type="radio">
              <label class="custom-control-label" for="customRadio5">Virtual Account</label>
            </div>
            <div class="custom-control custom-radio mb-3">
              <input name="custom-radio-1" class="custom-control-input" id="customRadio6" checked="" type="radio">
              <label class="custom-control-label" for="customRadio6">Transfer</label>
            </div>
            <div class="custom-control custom-radio mb-3">
              <input name="custom-radio-3" class="custom-control-input" id="customRadio7" disabled="" type="radio">
              <label class="custom-control-label" for="customRadio7">Paypal</label>
            </div>
            <div class="custom-control custom-radio mb-3">
              <input name="custom-radio-4" class="custom-control-input" id="customRadio8" disabled="" type="radio">
              <label class="custom-control-label" for="customRadio8">Dana</label>
            </div>
          </div>

          <input type="hidden" name="idbank" id="idbank">
          <form method="POST" action="<?php echo base_url('member/act_checkout') ?>">
            <button onclick="act_checkout()" class="btn btn-success btn-lg btn-block">Buat Pesanan <i class="fa fa-arrow-right"></i></button>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- </form> -->
  <!-- Footer -->
  <footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-12">
        <div class="copyright text-center text-lg-center text-muted">
          &copy; <?php echo date('Y'); ?> <a href="https://najahnet.id" class="font-weight-bold ml-1" target="_blank">Najah Network</a>
        </div>
      </div>
    </div>
  </footer>
</div>

<?php $this->load->view('admin/_/footer'); ?>

<script type="text/javascript">
  'use strict';

  var DatatableBasic = (function() {
    var $dtBasic = $('#datatable-purchase');

    function init($this) {

      var options = {
        keys: !0,
        select: {
          style: "multi"
        },
        pageLength: 5,
        language: {
          paginate: {
            previous: "<i class='fas fa-angle-left'>",
            next: "<i class='fas fa-angle-right'>"
          }
        },
      };
      var table = $this.on('init.dt', function() {
        $('div.dataTables_length select').removeClass('custom-select custom-select-sm');

      }).DataTable(options);
    }
    if ($dtBasic.length) {
      init($dtBasic);
    }
  })();
</script>

<div class="modal fade" id="modal_shipping_address" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Alamat Pengiriman</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div id="form_add_shipping_address" style="display: none;">

        <div class="modal-body">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_penerima">Nama Penerima*</label>
                <input type="text" name="nama_penerima" class="form-control" id="nama_penerima" placeholder="Nama Penerima Paket" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="no_hp_penerima">Nomor HP/WA Penerima*</label>
                <input type="number" name="no_hp_penerima" class="form-control" id="no_hp_penerima" placeholder="No HP/WA Penerima" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="id_province">Provinsi*</label>
                <select name="id_province" id="id_province" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id_province="0" tabindex="-1" aria-hidden="true" required>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="id_district">Kota/Kabupaten*</label>
                <select name="id_district" id="id_district" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id_district="0" tabindex="-1" aria-hidden="true" required>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="id_subdistrict">Kecamatan*</label>
                <select name="id_subdistrict" id="id_subdistrict" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id_subdistrict="0" tabindex="-1" aria-hidden="true" required>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="postal_code">Kode Pos</label>
                <input type="hidden" name="province_name" class="form-control" id="province_name" readonly required>
                <input type="hidden" name="district_name" class="form-control" id="district_name" readonly required>
                <input type="hidden" name="subdistrict_name" class="form-control" id="subdistrict_name" readonly required>
                <input type="number" name="postal_code" class="form-control" id="postal_code" placeholder="Kode Pos" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="full_address">Alamat Lengkap* <small style="color:red;">(Wajib dilengkapi)</small></label>
                <textarea name="full_address" class="form-control" id="full_address" rows="3" required placeholder="Alamat Lengkap"></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button onclick="save_shipping_address()" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
          <button type="button" class="btn btn-danger" onclick="switch_shipping_address()"><i class="fa fa-times"></i> Batal</button>
        </div>
      </div>

      <div id="list_shipping_address">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">

              <?php
              if (!empty($member_shipping)) {

                foreach ($member_shippings as $ms) {
                  echo "<div class='row align-items-center'>
                        <div class='col-8'>
                            <h4 class='mb-0'>$ms->nama_penerima";

                  if ($ms->status == 1) {
                    echo "<font color='red'><small> [Utama]</small></font>";
                  }

                  echo "</h4>
                        </div>
                        <div class='col-4 text-right'>
                        <a href='javascript:void(0)' onclick=\"select_shipping_address('$ms->id_member_shipping')\" data-dismiss='modal' title='Pilih Alamat Ini' class='btn btn-sm btn-default'>Pilih</a>
                        </div>
                        <div class='col'>
                            <h5>$ms->no_hp_penerima</h5>
                            <h5>$ms->full_address - $ms->postal_code</h5>
                        </div>
                    </div>
                    <hr>";
                }
              } else {

                echo "Form Inputan";
              }
              ?>
              <button type="button" onclick="switch_shipping_address()" class="btn btn-primary btn-lg btn-block">Tambah Alamat Baru</button>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<script>
  function switch_shipping_address() {

    var x = document.getElementById("form_add_shipping_address");
    var y = document.getElementById("list_shipping_address");

    if (x.style.display === "none") {
      x.style.display = "block";
      y.style.display = "none";
    } else {
      x.style.display = "none";
      y.style.display = "block";
    }
  }

  function select_shipping_address(idsa) {
    $.ajax({
      url: "<?php echo site_url('member/load_shipping_address/'); ?>" + idsa,
      method: "GET",
      success: function(resp) {
        $('#member_shipping_address_selected').html(resp);
      }
    });
  }

  function save_shipping_address() {
    var nama_penerima = $('#nama_penerima').val();
    var no_hp_penerima = $('#no_hp_penerima').val();
    var id_province = $('#id_province').val();
    var id_district = $('#id_district').val();
    var id_subdistrict = $('#id_subdistrict').val();
    var province_name = $('#province_name').val();
    var district_name = $('#district_name').val();
    var subdistrict_name = $('#subdistrict_name').val();
    var postal_code = $('#postal_code').val();
    var full_address = $('#full_address').val();

    // alert("nama : " + nama_penerima + " No HP : " + no_hp_penerima);

    $.ajax({
      url: "<?php echo base_url('member/act/add_shipping_address'); ?>",
      method: "POST",
      data: {
        nama_penerima: nama_penerima,
        no_hp_penerima: no_hp_penerima,
        id_province: id_province,
        id_district: id_district,
        id_subdistrict: id_subdistrict,
        province_name: province_name,
        district_name: district_name,
        subdistrict_name: subdistrict_name,
        postal_code: postal_code,
        full_address: full_address,
        cart: 1
      },
      success: function(data) {
        $('#member_shipping_address_selected').html(data);
        // $('#detail_cart').html(data);
      }
    });
  }

  $("#kurir").on("change", function cost(e) {
    e.preventDefault();
    var courier = $('option:selected', this).val();
    var des = $('#id_subdistrict').val();
    var weight = '<?php if (!empty($tot_berat)) {
                    if ($tot_berat > 0 && $tot_berat < 1) {
                      $tot_berat = 1;
                    }
                    echo $tot_berat;
                  } ?>';

    if (weight === '0' || weight === '') {
      alert('null');
    } else if (courier === '') {
      alert('null');
    } else if (des == 0) {
      $('html, body').animate({
        scrollTop: $(".container").offset().top
      }, 2000);
      // swal("", "Lengkapi alamat pengiriman terlebih dahulu", "error");
      alert('Lengkapi alamat pengiriman terlebih dahulu');
    } else {
      // alert(weight);
      getOrigin(des, weight, courier);
    }
  });

  function number_idr(v) {
    var value = v.toLocaleString(undefined, {
      minimumFractionDigits: 0
    });
    return value;
  }

  function getOrigin(des, weight, courier) {
    $('.loading').remove();
    var str = "'";
    // var $op = $("#datakurir");
    var i, j, x = "";
    var add = 0;
    //biaya tambahan, misal tambahan berat kemasan dll
    $('#datakurir').after('<div class="loading"><i class="fa fa-spinner fa-pulse fa-2x fa-fw color0"></i>Loading ...</div>');
    $.getJSON("<?php echo base_url('member/get_cost/') ?>" + des + "/" + weight + "/" + courier, function(data) {
      if (data.rajaongkir.status.code != "200") {
        alert(data.rajaongkir.status.description);
        // swal("", "" + data.rajaongkir.status.description + "", "error");
      } else if (data.rajaongkir.results[0].costs == '') {
        alert(data.rajaongkir.results[0].name + ', Tidak mendukung pengiriman ini');
        // swal("", "" + data.rajaongkir.results[0].name + ", Tidak mendukung pengiriman ini", "error");
      } else {
        $.each(data.rajaongkir.results, function(i, field) {
          for (i in field.costs) {
            for (j in field.costs[i].cost) {
              x += ('<tr>\
                    <td>\
                      <div class="form-check">\
                        <label class="form-check-label">\
                          <input type="radio" class="form-check-input" name="shiping" id="shiping" onclick="set_ongkir(' + str + (parseInt(field.costs[i].cost[j].value) + parseInt(add)) + str + ')" value="' + field.name + ' - ' + field.costs[i].service + '" required>\
                          <small>\
                            ' + field.name + ' - ' + field.costs[i].service + '\
                            (' + field.costs[i].cost[j].etd + ' hari) - Rp.' + number_idr((field.costs[i].cost[j].value)) + '\
                          </small>\
                        </label>\
                      </div>\
                    </td>\
                  </tr>');
              // x = '<h2>sss</h2>';
              // alert((parseInt(field.costs[i].cost[j].value) + parseInt(add)));
              $("#datakurir").html(x);
            }
          }
        });
      }
      $('.loading').remove();
      total_tagihan();
    });
  }

  function set_ongkir(idr) {
    $('#loadingpage').show();
    $("#loadingpage").addClass("loadingfull");
    $('#total_ongkir').val(idr);
    // var idr = number_idr(parseInt(idr));
    var idr = 'Rp. ' + idr + '';
    $('#jumlahongkir').html(idr);
    var shiping = $("input[type='radio'][name='shiping']:checked").val();
    var set_shipingdesc = $('#shipingdesc').val(shiping);
    // count_summary();
    total_tagihan();
  }


  $('#id_province').select2({
    placeholder: 'Pilih Provinsi',
    language: "id"
  });

  $('#id_district').select2({
    placeholder: 'Pilih kota/kabupaten',
    language: "id"
  });

  $('#id_subdistrict').select2({
    placeholder: 'Pilih Kecamatan',
    language: "id"
  });

  $.ajax({
    type: "GET",
    dataType: "html",
    url: "<?php echo base_url('member/get/province/0') ?>",
    success: function(msg) {
      $("select#id_province").html(msg);
    }
  });

  $('#id_province').change(function() {
    var idp = $('#id_province').val();

    var province_name = $("#id_province option:selected").text();
    $("#province_name").val(province_name);

    $('#id_district').after('<i class="fa fa-spinner fa-pulse fa-2x fa-fw loading"></i>');
    $('#id_district').load('<?php echo base_url('member/get/district/') ?>/' + idp, function(responseTxt, statusTxt, xhr) {
      if (statusTxt === "success")
        $('.loading').remove();
    });
    return false;
  });

  $('#id_district').change(function() {
    var idd = $('#id_district').val();

    var district_name = $("#id_district option:selected").text();
    $("#district_name").val(district_name);

    $('#id_subdistrict').after('<i class="fa fa-spinner fa-pulse fa-2x fa-fw loading"></i>');
    $('#id_subdistrict').load('<?php echo base_url('member/get/subdistrict/') ?>/' + idd, function(responseTxt, statusTxt, xhr) {
      if (statusTxt === "success")
        $('.loading').remove();
    });
    return false;
  });

  $('#id_subdistrict').change(function() {
    var province_name = $("#province_name").val();
    var district_name = $("#district_name").val();
    var subdistrict_name = $("#id_subdistrict option:selected").text();
    $("#subdistrict_name").val(subdistrict_name);
    $("#full_address").val('RT RW/Jalan No Rumah, Desa/Kelurahan, ' + subdistrict_name + ', ' + district_name + ', ' + province_name);
    return false;
  });

  function check_promo() {
    //Ajax Load data from ajax

    let kode_promo = document.getElementById('kode_promo').value;

    $.ajax({
      url: "<?php echo base_url('member/check/promo/'); ?>" + kode_promo,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        if (data == null) {
          document.getElementById('div_promo').classList.remove('has-valid');
          document.getElementById('div_promo').classList.add('has-danger');
          document.getElementById('kode_promo').classList.remove('is-valid');
          document.getElementById('kode_promo').classList.add('is-invalid');
          document.getElementById('feedback_promo').className = 'invalid-feedback';
          document.getElementById('feedback_promo').innerHTML = 'Kode Promo yang anda masukkan tidak tersedia...';
        } else {
          let id_p = data.id_promo;
          let na_p = data.nama_promo;
          let ni_p = data.nilai;
          // alert(data);
          $.ajax({
            url: "<?php echo base_url('member/select_promo/'); ?>" + data.id_promo,
            method: "POST",
            data: {
              "id_promo": data.id_promo,
              "x": "x"
            },
            success: function(data) {
              $('#select_promo').html(data);
              $('#selected_promo').html('<a><b><i>' + na_p + ' - Rp ' + number_idr(parseInt(ni_p)) + '</i></b></a>\
                                          <br><input type="hidden" name="id_promo" id="id_promo" value="' + id_p + '">\
                                          <input type="hidden" name="nilai_promo" id="nilai_promo" value="' + ni_p + '">');
              total_tagihan();
            }
          });

          document.getElementById('div_promo').classList.remove('has-danger');
          document.getElementById('div_promo').classList.add('has-valid');
          document.getElementById('kode_promo').classList.remove('is-invalid');
          document.getElementById('kode_promo').classList.add('is-valid');
          document.getElementById('feedback_promo').className = 'valid-feedback';
          document.getElementById('feedback_promo').innerHTML = 'Kode Promo tersedia...';
          document.getElementById('promo').innerHTML = 'Kode Promo tersedia...';
        }
      }
    });
  }

  function reset_promo() {
    $.ajax({
      url: "<?php echo base_url('member/select_promo/0'); ?>",
      method: "POST",
      success: function(data) {
        $('#select_promo').html(data);
      }
    });
  }

  document.addEventListener("DOMContentLoaded", function(event) {
    total_tagihan();
  });

  function total_tagihan() {
    var subtotal = $('#nilai_subtotal').val();
    var total_ongkir = $('#total_ongkir').val();
    var nilai_promo = $('#nilai_promo').val();
    var total_tagihan = ((parseInt(subtotal) + parseInt(total_ongkir)) - parseInt(nilai_promo));
    $('#total_tagihan').html('Rp.' + number_idr((total_tagihan)) + '');
  }

  function act_checkout() {
    // alert('11');
    var nama_penerima = $('#nama_penerima').val();
    var no_hp_penerima = $('#no_hp_penerima').val();
    var id_province = $('#id_province').val();
    var id_district = $('#id_district').val();
    var id_subdistrict = $('#id_subdistrict').val();
    var province_name = $('#province_name').val();
    var district_name = $('#district_name').val();
    var subdistrict_name = $('#subdistrict_name').val();
    var postal_code = $('#postal_code').val();
    var full_address = $('#full_address').val();

    // alert("nama : " + nama_penerima + " No HP : " + no_hp_penerima);

    $.ajax({
      url: "<?php echo base_url('member/act_checkout'); ?>",
      method: "POST",
      data: {
        nama_penerima: nama_penerima,
        no_hp_penerima: no_hp_penerima,
        id_province: id_province,
        id_district: id_district,
        id_subdistrict: id_subdistrict,
        province_name: province_name,
        district_name: district_name,
        subdistrict_name: subdistrict_name,
        postal_code: postal_code,
        full_address: full_address,
        cart: 1
      },
      success: function(data) {

        alert(data);
        // $('#member_shipping_address_selected').html(data);
        // $('#detail_cart').html(data);
      }
    });
  }
</script>