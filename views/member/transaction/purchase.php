<?php $this->load->view('admin/_/header'); ?>

<div class="header pb-6">
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

            <?php
            date_default_timezone_set('Asia/Jakarta');
            if (empty($date)) {
                $date = date("Y-m-d H:i:s");
            }

            $date = new DateTime($date);
            ?>

            <div class="row">
                <div class="col-xl-12 col-md-6">
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($date) && !empty($id_member)) { ?>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card border-0">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Produk</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive py-4">
                        <!-- <table class="table table-flush" id="datatable-purchase"> -->
                        <table class="table table-flush" id="">
                            <thead class="thead-light">
                                <tr>
                                    <th width="40%">Nama Produk</th>
                                    <th width="30%">Harga</th>
                                    <th width="30%"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $no = 0;
                                    foreach ($product as $p) {
                                        $no++;
                                        echo "<tr>
                                        <td class='table-user' title='$p->nama_produk'>
                                            <img src='" . ASSETS . "produk/$p->img_1' class='avatar rounded-circle mr-3'>
                                            <b>" . substr($p->nama_produk, 0, 20) . "</b>
                                        </td>
                                        <td>
                                            <span>Rp " . number_format($p->harga, 0, ',', '.') . "</span>
                                            <br>";

                                        $stock = $p->stok - $p->stok_;

                                        if ($stock < 1) {
                                            $disabled = "disabled";
                                        } else {
                                            $disabled = "";
                                        }

                                        if ($stock <= 100) {
                                            echo "<span class='text-red'>" . number_format($stock, 0, '.', '.') . " $p->satuan</span>";
                                        } else if ($stock > 100 && $stock <= 200) {
                                            echo "<span class='text-yellow'>" . number_format($stock, 0, '.', '.') . " $p->satuan</span>";
                                        } else if ($stock > 200) {
                                            echo "<span class='text-green'>" . number_format($stock, 0, '.', '.') . " $p->satuan</span>";
                                        }

                                        echo "  </td>
                                        <td class='text-center'>
                                            <div class='input-group mb-3'>
                                                <input type='number' name='quantity' id='qty_$p->id_produk' value='1' min='1' max='$stock' class='quantity form-control form-control-sm' $disabled>
                                                <div class='input-group-append'>
                                                <button class='add_cart btn btn-sm btn-success' type='button' data-produkstok='$stock' data-produkid='$p->id_produk' data-produknama='$p->nama_produk' data-produkharga='$p->harga' data-berat='$p->berat' $disabled><i class='fa fa-cart-plus'></i></button>
                                                </div>
                                            </div>
                                        </td>";

                                        echo "</tr>";
                                    } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">

                <div class="card border-0">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Keranjang Belanja</h3>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="table-responsive py-4">


                            <form id="save" action="<?php echo base_url('member/act/add_purchase') ?>" method="POST">
                                <input type="hidden" name="date" value="<?php echo $date->format('Y-m-d h:i:s'); ?>" required>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah Barang</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody id="detail_cart">

                                    </tbody>

                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
<?php } ?>
<?php $this->load->view('admin/_/footer'); ?>

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
                            if (!empty($member_shipping_default)) {

                                foreach ($member_shipping_list as $ms) {
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
            let id = $(this).data("produkid");
            let name = $(this).data("produknama");
            let price = $(this).data("produkharga");
            let weight = $(this).data("berat");
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
                        quantity: qty,
                        harga_produk: price,
                        berat_produk: weight,
                        nama_produk: name
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

    function set_kurir() {
        // e.preventDefault();
        var courier = $('option:selected', this).val();
        // var courier = 2;
        var des = $('#id_subdistrict').val();

        // alert(des);
        var weight = '<?php
                        // foreach ($this->cart->contents() as $items) {
                        //     $qty[] = $items['qty'];
                        //     $tot_berat[]  = $items['qty'] * $items['weight'];
                        //     $total_cart     = $this->cart->total();
                        //     $tot_qty        = array_sum($qty);
                        //     $tot_berat      = (array_sum($tot_berat) / 1000);
                        // }
                        $tot_berat = 1;
                        if (!empty($tot_berat)) {
                            if ($tot_berat > 0 && $tot_berat < 1) {
                                $tot_berat = 1;
                            }
                            echo $tot_berat;
                        } ?>';
        if (weight === '0' || weight === '') {
            alert('berat kosong');
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
        // alert(total_tagihan);
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