<?php $this->load->view('admin/_/header'); ?>

<?php $this->session->set_userdata('ref_member', current_url()); ?>

<style>
    .icon-shipping {
        font-size: 150%;
    }

    .s-active {
        color: orangered;
    }

    .inline {
        display: flex;
        margin: auto;
    }
</style>

<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 d-inline-block mb-0"><?php
                                                        date_default_timezone_set('Asia/Jakarta');
                                                        if (empty($date)) {
                                                            $bulan = date("F Y");
                                                        } else {
                                                            $bulan = date_format(date_create($date), "F Y");
                                                        }

                                                        echo "$title <small>($bulan)</small>"; ?></h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="<?php echo base_url('member/product_stock') ?>" class="btn btn-sm btn-info" title="Stok Produk"><i class="fa fa-archive"></i> Stok</a>
                    <a href="<?php echo base_url('member/add_sales') ?>" class="btn btn-sm btn-warning" title="Transaksi Penjualan Baru"><i class="ni ni-basket"></i> Jual</a>
                    <a href="<?php echo base_url('member/add_purchase') ?>" class="btn btn-sm btn-success" title="Transaksi Pembelian Baru"><i class="ni ni-bag-17"></i> Beli</a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <a href="<?php echo base_url('member/transaction/purchase') ?>">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Pembelian</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php if (!empty($stat->beli)) {
                                                                                    $beli = $stat->beli;
                                                                                } else {
                                                                                    $beli = 0;
                                                                                }
                                                                                echo "Rp " . number_format($beli, 0, ',', '.') . ""; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-md-6">
                    <a href="<?php echo base_url('member/transaction/sales') ?>">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Penjualan</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php if (!empty($stat->jual)) {
                                                                                    $jual = $stat->jual;
                                                                                } else {
                                                                                    $jual = 0;
                                                                                }
                                                                                echo "Rp " . number_format($jual, 0, ',', '.') . ""; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Filter Bulan</h3>
                            <form role="form" class="form-light" action="<?php echo base_url('member/transaction/all'); ?>" method="POST">
                                <div class="row">
                                    <div class="col-xl-12 col-md-6">
                                        <div class="form-group">
                                            <input name="date" class="form-control" onchange="this.form.submit()" type="month" value="<?php
                                                                                                                                        if (empty($date)) {
                                                                                                                                            $date = date("Y-m");
                                                                                                                                        }

                                                                                                                                        echo $date;
                                                                                                                                        ?>" id="example-month-input">

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th width="1%">No</th>
                                <th width="15%">ID Transaksi</th>
                                <th width="4%" class="text-center">Tipe</th>
                                <th width="30%" class="text-center">Status</th>
                                <th width="50%" class="text-center">Detail Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 0;
                            foreach ($transaction as $t) {
                                $no++;

                                $tgl_pesan  = new DateTime($t->tgl_pesan);

                                echo "<tr>
                                <td>$no</td>
                                <td>TR-00" . $t->id_member . "00" . $t->id_transaksi . "";
                                if ($t->tipe == 1) {
                                    echo "<br><small>Menjual ke : " . substr($t->member_to, 0, 25) . "</small>";
                                }
                                echo "</td>";

                                // echo "  <td>$t->produk (Rp " . number_format($t->product_price, 0, ',', '.') . ") x $t->product_quantity = Rp " . number_format($t->total, 0, ',', '.') . "</td>";

                                echo "<td class='text-center'>";
                                if ($t->tipe == 0) {
                                    echo "<span class='btn btn-sm btn-info'>Beli</span>";
                                    $st0    = "Belum Bayar";
                                    $st1    = "Dikemas";
                                } else if ($t->tipe == 1) {
                                    echo "<span class='btn btn-sm btn-warning'>Jual</span>";
                                    $st0     = "<small>Belum Dikonfirmasi</small>";
                                    $st1    = "<small>Sudah Dikonfirmasi</small>";
                                }
                                echo "</td>";

                                echo "<td class='inline'>";
                                if ($t->tipe == 0) {
                                    if ($t->status == 0) {
                                        echo "<div class='inline'>
                                    <div class='s-active text-center'><i class='icon-shipping fa fa-wallet'></i><br><span style='font-size:80%;'>$st0</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-box-open'></i><br><span style='font-size:80%;'>$st1</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-truck'></i><br><span style='font-size:80%;'>Dikirim</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-thumbs-up'></i><br><span style='font-size:80%;'>Diterima</span></div>&emsp;
                                    <div class='text-center'><a href='" . base_url('member/set/trans_cancel/') . "$t->id_transaksi' onclick=\"return confirm('Anda yakin ingin membatalkan transaksi ini...?')\" title='Set Dibatalkan'><i class='icon-shipping fa fa-times-circle'></i><br><span style='font-size:80%;'>Batalkan</span></a></div>&emsp;
                                    </div>";
                                    } else if ($t->status == 1) {
                                        echo "<div class='inline'>
                                    <div class='text-center'><i class='icon-shipping fa fa-wallet'></i><br><span style='font-size:80%;'>$st0</span></div>&emsp;
                                    <div class='s-active text-center'><i class='icon-shipping fa fa-box-open'></i><br><span style='font-size:80%;'>$st1</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-truck'></i><br><span style='font-size:80%;'>Dikirim</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-thumbs-up'></i><br><span style='font-size:80%;'>Diterima</span></div>&emsp;
                                    <div class='text-center'><a href='" . base_url('member/set/trans_cancel/') . "$t->id_transaksi' onclick=\"return confirm('Anda yakin ingin membatalkan transaksi ini...?')\" title='Set Dibatalkan'><i class='icon-shipping fa fa-times-circle'></i><br><span style='font-size:80%;'>Batalkan</span></a></div>&emsp;
                                    </div>";
                                    } else if ($t->status == 2) {
                                        echo "<div class='inline'>
                                    <div class='text-center'><i class='icon-shipping fa fa-wallet'></i><br><span style='font-size:80%;'>$st0</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-box-open'></i><br><span style='font-size:80%;'>$st1</span></div>&emsp;
                                    <div class='s-active text-center'><i class='icon-shipping fa fa-truck'></i><br><span style='font-size:80%;'>Dikirim</span></div>&emsp;
                                    <div class='text-center'><a href='" . base_url('member/set/trans_done/') . "$t->id_transaksi' onclick=\"return confirm('Pastikan paket yang anda terima sesuai dengan pesanan anda...!')\"><i class='icon-shipping fa fa-thumbs-up'></i></i><br><span style='font-size:80%;'>Diterima</span></a></div>&emsp;
                                    <div class='text-center'><a href='" . base_url('member/set/trans_cancel/') . "$t->id_transaksi' onclick=\"return confirm('Anda yakin ingin membatalkan transaksi ini...?')\" title='Set Dibatalkan'><i class='icon-shipping fa fa-times-circle'></i><br><span style='font-size:80%;'>Batalkan</span></a></div>&emsp;
                                    </div>";
                                    } else if ($t->status == 3) {
                                        echo "<div class='inline'>
                                    <div class='text-center'><i class='icon-shipping fa fa-wallet'></i><br><span style='font-size:80%;'>$st0</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-box-open'></i><br><span style='font-size:80%;'>$st1</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-truck'></i><br><span style='font-size:80%;'>Dikirim</span></div>&emsp;
                                    <div class='s-active text-center'><i class='icon-shipping fa fa-thumbs-up'></i></i><br><span style='font-size:80%;'>Diterima</div>&emsp;
                                    <div class='text-center'><a href='" . base_url('member/set/trans_cancel/') . "$t->id_transaksi' onclick=\"return confirm('Anda yakin ingin membatalkan transaksi ini...?')\" title='Set Dibatalkan'><i class='icon-shipping fa fa-times-circle'></i><br><span style='font-size:80%;'>Batalkan</span></a></div>&emsp;
                                    </div>";
                                    } else if ($t->status == 4) {
                                        echo "<div class='inline'>
                                    <div class='text-center'><i class='icon-shipping fa fa-wallet'></i><br><span style='font-size:80%;'>$st0</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-box-open'></i><br><span style='font-size:80%;'>$st1</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-truck'></i><br><span style='font-size:80%;'>Dikirim</span></div>&emsp;
                                    <div class='s-active text-center'><i class='icon-shipping fa fa-thumbs-up'></i></i><br><span style='font-size:80%;'>Diterima</span></div>&emsp;
                                    <div class='text-center'><a href='" . base_url('member/set/trans_cancel/') . "$t->id_transaksi' onclick=\"return confirm('Anda yakin ingin membatalkan transaksi ini...?')\" title='Set Dibatalkan'><i class='icon-shipping fa fa-times-circle'></i><br><span style='font-size:80%;'>Batalkan</span></a></div>&emsp;
                                    </div>";
                                    } else if ($t->status == 5) {
                                        echo "<div class='inline'>
                                    <div class='text-center'><i class='icon-shipping fa fa-wallet'></i><br><span style='font-size:80%;'>$st0</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-box-open'></i><br><span style='font-size:80%;'>$st1</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-truck'></i><br><span style='font-size:80%;'>Dikirim</span></div>&emsp;
                                    <div class='text-center'><i class='icon-shipping fa fa-thumbs-up'></i></i><br><span style='font-size:80%;'>Diterima</span></div>&emsp;
                                    <div class='s-active text-center'><i class='icon-shipping fa fa-times-circle'></i><br><span style='font-size:80%;'>Dibatalkan</span></div>&emsp;
                                    </div>";
                                    }
                                } elseif ($t->tipe == 1) {
                                    if ($t->status == 0) {
                                        echo "<div class='inline'>
                                        <div class='s-active text-center'><i class='icon-shipping fa fa-thumbs-down'></i><br><span style='font-size:80%;'>Belum Dikonfirmasi</span></div>&emsp;
                                        <div class='text-center'><i class='icon-shipping fa fa-thumbs-up'></i><br><span style='font-size:80%;'>Dikonfirmasi</span></div>&emsp;
                                        <div class='text-center'><a href='" . base_url('member/set/trans_cancel/') . "$t->id_transaksi' onclick=\"return confirm('Anda yakin ingin membatalkan transaksi ini...?')\" title='Set Dibatalkan'><i class='icon-shipping fa fa-times-circle'></i><br><span style='font-size:80%;'>Dibatalkan</span><a/></div>&emsp;
                                        </div>";
                                    } else if ($t->status == 3) {
                                        echo "<div class='inline'>
                                        <div class='text-center'><i class='icon-shipping fa fa-thumbs-down'></i><br><span style='font-size:80%;'>Belum Dikonfirmasi</span></div>&emsp;
                                        <div class='s-active text-center'><i class='icon-shipping fa fa-thumbs-up'></i><br><span style='font-size:80%;'>Dikonfirmasi</span></div>&emsp;
                                        <div class='text-center'><a href='" . base_url('member/set/trans_cancel/') . "$t->id_transaksi' onclick=\"return confirm('Anda yakin ingin membatalkan transaksi ini...?')\" title='Set Dibatalkan'><i class='icon-shipping fa fa-times-circle'></i><br><span style='font-size:80%;'>Dibatalkan</span></a></div>&emsp;
                                        </div";
                                    } else if ($t->status == 5) {
                                        echo "<div class='inline'>
                                        <div class='text-center'><i class='icon-shipping fa fa-thumbs-down'></i><br><span style='font-size:80%;'>Belum Dikonfirmasi</span></div>&emsp;
                                        <div class='text-center'><i class='icon-shipping fa fa-thumbs-up'></i><br><span style='font-size:80%;'>Dikonfirmasi</span></div>&emsp;
                                        <div class='s-active text-center'><i class='icon-shipping fa fa-times-circle'></i><br><span style='font-size:80%;'>Dibatalkan</span></div>&emsp;
                                        </div";
                                    }
                                }

                                $q = $this->db->query("SELECT   quantity,price,
                                                                (SELECT nama_produk FROM produk WHERE produk.id_produk=transaksi_produk.id_produk) AS produk,
                                                                (SELECT satuan FROM produk WHERE produk.id_produk=transaksi_produk.id_produk) AS satuan
                                                        FROM transaksi_produk WHERE id_transaksi='$t->id_transaksi'")->result();
                                echo "</td>
                                <th>
                                    <table style=\"padding:0px;\" class='table table-flush table-hover'>";

                                if ($t->tipe == 0) {
                                    echo "<thead style=\"padding:0px;\" >
                                            <tr style=\"padding:0px;\">
                                                <th style=\"padding:1px; text-align:right;\" width='40%'>(Total + Ongkir)</th>
                                                <th style=\"padding:1px; text-align:right;\" width='5%'></th>
                                                <th style=\"padding:1px; text-align:center;\" width='20%'>Promo</th>
                                                <th style=\"padding:1px; text-align:right;\" width='5%'></th>
                                                <th style=\"padding:1px; text-align:right;\" width='30%'>Total Tagihan</th>
                                            </tr>  
                                        </thead>
                                        <tbody style=\"padding:0px;\" >  
                                            <tr style=\"padding:0px;\">
                                                <td style=\"padding:1px; text-align:right;\">(" . number_format($t->total, 0, ',', '.') . " + " . number_format($t->ongkir, 0, ',', '.') . ")</td>
                                                <td style=\"padding:1px; text-align:right;\"> - </td>
                                                <td style=\"padding:1px; text-align:center;\" >" . number_format($t->nilai_promo, 0, ',', '.') . "</td>
                                                <td style=\"padding:1px; text-align:right;\"> = </td>
                                                <td style=\"padding:1px; text-align:right;\" >" . number_format($t->total - $t->nilai_promo + $t->ongkir, 0, ',', '.') . "</td>
                                            </tr>
                                        </tbody>";
                                } elseif ($t->tipe == 1) {
                                    echo "<thead style=\"padding:0px;\" >
                                            <tr style=\"padding:0px;\">
                                                <th style=\"padding:1px; text-align:right;\" width='60%'>Bukti Transfer</th>
                                                <th style=\"padding:1px; text-align:right;\" width='40%'>Total</th>
                                            </tr>  
                                        </thead>
                                        <tbody style=\"padding:0px;\" >
                                            <tr style=\"padding:0px;\">
                                                <td style=\"padding:1px; text-align:right;\" ><a href='" . base_url('public/upload/bukti_transfer/') . "$t->bukti_transfer' target='_blank'>Lihat File</a></td>
                                                <td style=\"padding:1px; text-align:right;\" >" . number_format($t->total, 0, ',', '.') . "</td>
                                            </tr>
                                        </tbody>";
                                }

                                echo "</table>
                                <div class='text-right'><small>";
                                foreach ($q as $prod) {
                                    echo "($prod->produk : $prod->quantity $prod->satuan )";
                                    // var_dump($q);
                                }
                                echo "</small></div>
                            </th>
                            
                            </tr>";
                            } ?>

                        </tbody>
                    </table>
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

<?php $this->load->view('admin/_/footer'); ?>