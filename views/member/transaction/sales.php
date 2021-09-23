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

<div class="container-fluid mt--6">
    <div class="row">

        <div class="col-xl-12 col-md-6">
            <div class="card">
                <div class="card-body">

                    <h3 class="card-title mb-3">Member Pembeli</h3>

                    <form id="sel_member" action="<?php echo base_url('member/add_sales'); ?>" method="POST">
                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="form-group">
                                    <select name="id_member_to" id="member" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-member="3" tabindex="-3" aria-hidden="true" required>
                                        <option value="0">Pilih Member</option>
                                        <?php
                                        $no = 0;
                                        foreach ($sel_member as $sm) {

                                            $count  = strlen($sm->no_hp) - 6;
                                            $no_hp  = substr_replace($sm->no_hp, str_repeat('#', $count), 3, $count);
                                            $no++;
                                            echo "<option data-select2-member='$no' value='$sm->id_member'>$sm->nama - 0$no_hp</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php if (!empty($id_member_to)) { ?>
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
                        <!-- <table class="table table-flush" id="datatable-sales"> -->
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
                                            <b title='$p->nama_produk'>" . substr($p->nama_produk, 0, 20) . "</b>
                                        </td>
                                        <td>
                                            <span>Rp " . number_format($p->harga, 0, ',', '.') . "</span>
                                            <br>";
                                        // $stock = $p->stok - $p->stok_;

                                        $stock = (($p->stock_plus_buy + $p->stock_plus_buy_member) - ($p->stock_min_sell_member + $p->stock_min_broken));

                                        if ($stock < 1) {
                                            $disabled = "disabled";
                                        } else {
                                            $disabled = "";
                                        }

                                        if ($stock < 100) {
                                            echo "<span class='text-red'>" . number_format($stock, 0, '.', '.') . " $p->satuan</span>";
                                        } else if ($stock >= 100 && $stock < 200) {
                                            echo "<span class='text-yellow'>" . number_format($stock, 0, '.', '.') . " $p->satuan</span>";
                                        } else if ($stock >= 200) {
                                            echo "<span class='text-green'>" . number_format($stock, 0, '.', '.') . " $p->satuan</span>";
                                        }

                                        echo "</td>
                                        <td class='text-center'>
                                            <div class='input-group mb-3'>
                                                <input type='number' name='quantity' id='qty_$p->id_produk' value='1' min='1' max='$stock' class='quantity form-control form-control-sm' $disabled>
                                                <div class='input-group-append'>
                                                <button class='add_cart btn btn-sm btn-success' type='button' data-produkstok='$stock' data-produkid='$p->id_produk' data-produknama='$p->nama_produk' data-produkharga='$p->harga' $disabled><i class='fa fa-cart-plus'></i></button>
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


                            <!-- <form enctype="multipart/form-data" id="save" action="<?php echo base_url('member/act/add_sales') ?>" method="POST"> -->
                            <?php echo form_open_multipart('member/act/add_sales', 'id="save"'); ?>
                            <input type="hidden" name="id_member_to" value="<?php echo $id_member_to ?>" required>
                            <input type="hidden" name="date" value="<?php echo $date->format('Y-m-d h:i:s'); ?>" required>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
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

        <?php } ?>
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
<?php $this->load->view('admin/_/footer'); ?>

<script type="text/javascript">
    'use strict';

    var DatatableBasic = (function() {
        var $dtBasic = $('#datatable-sales');

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



    $(window).bind('beforeunload', function() {
        <?php $this->cart->destroy(); ?>
    });
    $('#member').on('select2:select', function() {
        $('#sel_member').submit();
    });

    $(document).ready(function() {
        $('#member').val(<?php echo $id_member_to ?>);
        $('#member').select2().trigger('change');

        $('.add_cart').click(function() {
            var id = $(this).data("produkid");
            var name = $(this).data("produknama");
            var price = $(this).data("produkharga");
            var qty = $('#qty_' + id).val();
            var stok = $(this).data("produkstok");
            if (qty > stok) {
                alert('Jumlah Barang yang anda pilih melebihi stok tersedia (' + stok + ')');
            } else {
                $.ajax({
                    url: "<?php echo base_url('member/cart_add_sales/') ?>",
                    method: "POST",
                    data: {
                        id_produk: id,
                        quantity: qty,
                        harga_produk: price,
                        nama_produk: name
                    },
                    success: function(data) {
                        $('#detail_cart').html(data);
                        // alert(qty);
                    }
                });
            }
        });

        // Load shopping cart
        $('#detail_cart').load("<?php echo base_url('member/cart_load_sales/'); ?>");

        //Hapus Item Cart
        $(document).on('click', '.hapus_cart', function() {
            var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url: "<?php echo base_url('member/cart_del_sales/'); ?>",
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
</script>