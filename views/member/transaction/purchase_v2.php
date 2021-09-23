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
                                        <td class='table-user'>
                                            <img src='" . ASSETS . "produk/$p->img_1' class='avatar rounded-circle mr-3'>
                                            <b>$p->nama_produk</b>
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
                                                <button class='add_cart btn btn-sm btn-success' type='button' data-produkstok='$stock' data-produkid='$p->id_produk' $disabled>Tambahkan ke Keranjang <i class='fa fa-cart-plus'></i></button>
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
        <!-- <div class="col-xl-6 col-md-6">

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
            </div> -->
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

    $(document).ready(function() {

        $('.add_cart').click(function() {
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
                        // $('#detail_cart').html(data);
                        $.ajax({
                            url: "<?php echo base_url('member/load_qty_cart') ?>",
                            success: function(resp) {
                                $('#qty-cart-a').html(resp);
                                $('#qty-cart-b').html(resp);
                                $('#qty-cart-c').html(resp);
                                getList();
                            }
                        });
                    }
                });
            }
        });
    });
</script>