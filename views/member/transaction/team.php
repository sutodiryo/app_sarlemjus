<?php $this->load->view('admin/_/header'); ?>

<?php $this->session->set_userdata('ref_member', current_url()); ?>

<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 d-inline-block mb-0"><?php
                                                        date_default_timezone_set('UTC');
                                                        echo "$title - " . date('F Y') . ""; ?></h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a data-toggle="modal" href="#modal_add_sales" class="btn btn-sm btn-warning" title="Transaksi Baru"><i class="ni ni-basket"></i> Jual</a>
                    <a data-toggle="modal" href="#modal_add_purchase" class="btn btn-sm btn-success" title="Transaksi Pembelian Baru"><i class="ni ni-bag-17"></i> Beli</a>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-4 col-md-6">
                    <a href="<?php echo base_url('admin/transaction/all') ?>">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Semua</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo 0; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-md-6">
                    <a href="<?php echo base_url('admin/transaction/purchase') ?>">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Pembelian</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo 0; ?></span>
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
                    <a href="<?php echo base_url('admin/transaction/sales') ?>">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Penjualan</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo 0; ?></span>
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
                                <th width="20%">Nama</th>
                                <th width="20%">Kontak</th>
                                <th width="39%">Alamat</th>
                                <th width="20%">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 0;
                            foreach ($transaction as $t) {
                                $no++;

                                $tgl_pesan  = new DateTime($t->tgl_pesan);

                                echo "<tr onclick=\"location.href='" . base_url('member/detail_transaction/') . "" . $t->id_transaksi . "'\">
                                <td>$no</td>
                                <td><a href='" . base_url('admin/member_detail/') . "$t->id_transaksi'>$t->member</a></td>
                                <td><a href='https://wa.me/62$t->no_hp' class='btn btn-sm btn-slack btn-icon'><i class='fab fa-whatsapp'></i> $t->no_hp</a></td>";

                                echo "  <td>
                                            <ul class='navbar-nav align-items-left ml-auto ml-md-0'>
                                                <li class='nav-item dropdown'>
                                                    <a href='#'title='Klik untuk melihat alamat detail' data-toggle='dropdown'><span class='btn-inner--icon'>$t->no_hp</span></a>
                                                    <div class='dropdown-menu dropdown-menu-right'>
                                                        <textarea cols='30' rows='3' readonly>$t->produk</textarea>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>";

                                echo "<td>";
                                if ($t->status == 0) {
                                    echo "<a class='badge badge-dot mr-4'><i class='bg-red'></i><span class='status'>Priority</span></a>";
                                } else if ($t->status == 1) {
                                    echo "<a class='badge badge-dot mr-4'><i class='bg-orange'></i><span class='status'>Executive</span></a>";
                                } else if ($t->status == 2) {
                                    echo "<a class='badge badge-dot mr-4'><i class='bg-yellow'></i><span class='status'>Business</span></a>";
                                }

                                echo "</td>";

                                echo "</tr>";
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
                    &copy; <?php echo date('Y');?> <a href="https://najahnet.id" class="font-weight-bold ml-1" target="_blank">Najah Network</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="modal fade" id="modal_add_purchase" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Pembelian Official</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="<?php echo base_url('member/act/add_transaction'); ?>" method="POST">
                <input type="hidden" name="tipe" value="0">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="idp">Produk</label>
                                <select name="idp" id="idp" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-idp="1" tabindex="-1" aria-hidden="true" required>
                                    <?php
                                    $no = 0;
                                    foreach ($sel_product as $sp) {
                                        $no++;
                                        echo "<option data-select2-idp='$no' value='$sp->id_produk'>$sp->nama_produk</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="product_quantity">Jumlah (botol/pack)</label>
                                <input type="number" name="product_quantity" class="form-control" id="product_quantity" placeholder="Jumlah">
                            </div>
                        </div>

                        <!-- <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="tgl">Waktu Transaksi</label>
                                <input name="date" class="form-control" type="datetime-local" value="" id="example-datetime-local-input">
                            </div>
                        </div> -->

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_add_sales" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Penjualan Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="<?php echo base_url('admin/add/transaction'); ?>" method="POST">
                <input type="hidden" name="tipe" value="1">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="idm">Member</label>
                                <select name="id_member" id="idm" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-idm="3" tabindex="-3" aria-hidden="true" required>
                                    <?php
                                    $no = 0;
                                    foreach ($sel_member as $sm) {

                                        $count  = strlen($sm->no_hp) - 6;
                                        $no_hp  = substr_replace($sm->no_hp, str_repeat('#', $count), 3, $count);

                                        $no++;
                                        echo "<option data-select2-idm='$no' value='$sm->id_member'>$sm->nama - 0$no_hp</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label class="form-control-label" for="id_produk">Produk</label>
                                <select name="id_produk" id="id_produk" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id_produk="3" tabindex="-3" aria-hidden="true" required>
                                    <!-- <option value="0">Pilih Produk . . .</option> -->
                                    <?php
                                    $no = 0;
                                    foreach ($sel_product as $sm) {
                                        $no++;
                                        echo "<option data-select2-id_produk='$no' value='$sm->id_produk'>$sm->nama_produk</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-control-label" for="product_quantity">Jumlah (botol/pack)</label>
                                <input type="number" name="product_quantity" class="form-control" id="product_quantity" placeholder="Jumlah">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="tgl">Waktu Transaksi</label>
                                <input name="date" class="form-control" type="datetime-local" value="" id="example-datetime-local-input">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('admin/_/footer'); ?>