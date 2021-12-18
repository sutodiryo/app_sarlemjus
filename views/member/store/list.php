<?php $this->load->view('member/_/header'); ?>

<div class="pcoded-main-container">
  <div class="pcoded-content">

    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h5 class="m-b-10"><?php echo $page['header'] ?></h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('member/') . $page['a']['link'] ?>" title="<?php echo $page['a']['title'] ?>"><i class="<?php echo $page['a']['icon'] ?>"></i></a></li>
              <li class="breadcrumb-item"><a href="<?php echo $page['b']['link'] ?>"><?php echo $page['b']['title'] ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>


    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="row align-items-center m-l-0">
              <div class="col-sm-6">
              </div>
              <div class="col-sm-6 text-right">
                <button class="btn btn-info btn-sm btn-round has-ripple" data-toggle="modal" data-target="#modal-report"><i class="feather icon-shopping-cart"></i> Keranjang Belanja</button>
              </div>
            </div>
            <div class="table-responsive">
              <table id="table-store" class="table mb-0">
                <thead class="thead-light">
                  <tr>
                    <th width="35%">Produk</th>
                    <!-- <th>Category</th> -->
                    <!-- <th>Added Date</th> -->
                    <th width="20%">Harga</th>
                    <th width="15%">Diskon</th>
                    <th width="10%">Stok</th>
                    <th width="10%">Jumlah</th>
                    <th width="10%"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($product as $p) {

                    $stock = $p->stock_plus - $p->stock_min;

                    echo "<tr>
                            <td class='align-middle'>
                              <img src='" . ASSETS . "images/product/prod-12.jpg' alt='contact-img' title='contact-img' class='rounded mr-3' height='48' />
                              <p class='m-0 d-inline-block align-middle font-16'>
                              <a href='#!' class='text-body'>$p->name</a>";

                    //   <br />
                    //   <span class='text-warning feather icon-star-on'></span>
                    //   <span class='text-warning feather icon-star-on'></span>
                    //   <span class='text-warning feather icon-star-on'></span>
                    //   <span class='text-warning feather icon-star-on'></span>
                    //   <span class='text-warning feather icon-star-on'></span>
                    // </p>

                    echo "</td>
                            <td class='align-middle'>Rp " . number_format($p->selling_price, 0, ',', '.') . "</td>
                            <td class='align-middle'>
                              $597.66
                            </td>
                            <td class='align-middle'>
                              <span class='badge badge-success'>$stock</span>
                            </td>
                            <td>
                              <input type='number' name='quantity' id='qty_$p->id' value='1' min='1' max='$stock' class='quantity form-control form-control-sm'>
                            </td>
                            <td class='table-action'>
                              <button class='add_cart btn btn-icon btn-info' data-produkid='$p->id' ><i class='fas fa-cart-plus'></i></button>
                            </td>
                            </tr>";
                  } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<?php $this->load->view('member/_/footer'); ?>


<script type="text/javascript">
  'use strict';

  let id_promo = 0;
  // let id_kurir = $('#id_kurir').val();
  let id_kurir = 0;

  $('#id_kurir').val('2');

  function cartshow(idp) {
    let id_promo = idp;
    let id_kurir = $('#id_kurir').val();
    $('#detail_cart').load("<?php echo base_url('member/cart_load/'); ?>" + id_promo + "/" + id_kurir);
  }

  $('#id_kurir').on('change', function() {

    let id_kurir = $('#id_kurir').val();
    $('#detail_cart').load("<?php echo base_url('member/cart_load/'); ?>" + id_promo + "/" + id_kurir);
  });

  $(document).ready(function() {

    $('.add_cart').click(function() {
      alert('aaa');
      let id = $(this).data("produkid");
      let qty = $('#qty_' + id).val();
      var stok = $(this).data("produkstok");
      if (qty > stok) {
        alert('Jumlah produk yang anda pilih melebihi stok tersedia (' + stok + ')');
      } else {
        $.ajax({
          url: "<?php echo base_url('member/cart_add/') ?>" + id_promo + "/" + id_kurir,
          method: "POST",
          data: {
            id_produk: id,
            quantity: qty
          },
          success: function(data) {
            $('#detail_cart').html(data);
          }
        });
      }
    });

    // Load shopping cart
    $('#detail_cart').load("<?php echo base_url('member/cart_load/'); ?>" + id_promo + "/" + id_kurir);

    //Hapus Item Cart
    $(document).on('click', '.hapus_cart', function() {
      let row_id = $(this).attr("id"); //mengambil row_id dari artibut id
      $.ajax({
        url: "<?php echo base_url('member/cart_del/'); ?>" + id_promo + "/" + id_kurir,
        method: "POST",
        data: {
          row_id: row_id
        },
        success: function(data) {
          $('#detail_cart').html(data);
        }
      });
    });
  });


  function updateQty(rowid, id_produk) {
    var row = rowid;
    var qty = $('#qty' + row).val();
    var id_produk = id_produk;
    $.ajax({
      url: "<?php echo base_url('member/update_qty_cart'); ?>",
      method: "POST",
      data: {
        "rowid": row,
        "qty": qty,
        "id_produk": id_produk
      },
      success: function(data) {
        $('#detail_cart').html(data);
        cartshow();
        //   getList();
      }
    });
  }


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
          // document.getElementById("submit").disabled = true;
        } else {
          // alert(data.id_promo);
          cartshow(data.id_promo);
          document.getElementById('div_promo').classList.remove('has-danger');
          document.getElementById('div_promo').classList.add('has-valid');
          document.getElementById('kode_promo').classList.remove('is-invalid');
          document.getElementById('kode_promo').classList.add('is-valid');
          document.getElementById('feedback_promo').className = 'valid-feedback';
          document.getElementById('feedback_promo').innerHTML = 'Kode Promo tersedia...';
          // document.getElementById("submit").disabled = false;
          document.getElementById('promo').innerHTML = 'Kode Promo tersedia...';
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // alert('Error get data from ajax server');
        // document.getElementById("submit").disabled = true;
      }
    });
  }

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
      url: "<?php echo base_url('api/shipping/add_shipping_address'); ?>",
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

  function set_kurir() {
    // e.preventDefault();
    var courier = $('option:selected', this).val();
    // var courier = 2;
    var des = $('#id_subdistrict').val();

    // alert(des);
    $.ajax({
      url: "<?php echo base_url('member/get_weight/echo'); ?>",
      method: "GET",
      success: function(data) {
        var weight = data;
        // alert (weight);
        if (weight === '0' || weight === '') {
          alert('Keranjang belanja anda masih kosong');
        } else if (courier === '') {
          alert('Anda belum memilih kurir');
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
      }
    });

  }

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
    $('#datakurir').after('<th class="loading"><i class="fa fa-spinner fa-pulse fa-2x fa-fw color0"></i>Loading ...</th>');
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
              x += ('<div class="form-check">\
                                    <label class="form-check-label">\
                                    <input type="radio" class="form-check-input" name="shiping" id="shiping" onclick="set_ongkir(' + str + (parseInt(field.costs[i].cost[j].value) + parseInt(add)) + str + ')" value="' + field.name + ' - ' + field.costs[i].service + '" required>\
                                        ' + field.name + ' - ' + field.costs[i].service + '\
                                        (' + field.costs[i].cost[j].etd + ' hari) - Rp.' + number_idr((field.costs[i].cost[j].value)) + '\
                                    </label>\
                                </div>\
                                <br>');
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

    // alert(total_tagihan);
  }

  function act_checkout() {
    // alert('11');
    var nama_penerima = $('#shipping_selected_name').val();
    var no_hp_penerima = $('#shipping_selected_no_hp').val();
    var total_tagihan = $('#total_ongkir').val();

    var id_province = $('#id_province').val();
    var id_district = $('#id_district').val();
    var id_subdistrict = $('#id_subdistrict').val();
    var province_name = $('#province_name').val();
    var district_name = $('#district_name').val();
    var subdistrict_name = $('#subdistrict_name').val();
    var postal_code = $('#postal_code').val();
    var full_address = $('#full_address').val();

    alert("nama : " + nama_penerima + " No HP : " + no_hp_penerima + " Total : " + total_tagihan);

  }
</script>