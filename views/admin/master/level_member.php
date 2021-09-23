<?php $this->load->view('admin/_/header'); ?>

<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 d-inline-block mb-0"><?php echo $title ?></h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a data-toggle="modal" href="#modal_add_level" class="btn btn-sm btn-neutral" title="Tambah Level Baru"><i class="fa fa-plus"></i> Level Baru</a>
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
                    <table class="table table-flush" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th width="1%">No</th>
                                <th width="29%">Nama Level</th>
                                <th width="10%">Nilai</th>
                                <th width="20%">SMP</th>
                                <th width="30%">Keterangan</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 0;
                            foreach ($level as $l) {
                                $no++;

                                echo "<tr>
                                        <td><span class='lead mb-0'>$no</span></td>
                                        <td><span class='lead mb-0'>$l->nama_level</span></td>
                                        <td><span class='lead text-danger mb-0'>$l->nilai PV</span></td>
                                        <td><span class='lead mb-0'>Rp " . number_format($l->smp, 0, ',', '.') . "</span></td>
                                        <td>
                                            <textarea class='form-control' style=\"font-size:10px;\" readonly>Diskon : $l->diskon%
$l->keterangan PV</textarea></td>
                                        <td class='text-center'>
                                            <a href='javascript:void(0)' onclick=\"edit_level('$l->id_member_level')\" class='table-action' data-toggle='tooltip' data-original-title='Edit Level'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <a href='" . base_url('admin/del/member_level/') . "$l->id_member_level' onclick=\"return confirm('Anda yakin ingin menghapus data ini?')\" class='table-action table-action-delete' data-toggle='tooltip' data-original-title='Delete Level'>
                                                <i class='fas fa-trash'></i>
                                            </a>
                                        </td>
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
                    &copy; <?php echo date('Y');?> <a href="https://najahnet.id" class="font-weight-bold ml-1" target="_blank">Najah Network</a>
                </div>
            </div>
        </div>
    </footer>
</div>


<div class="modal fade" id="modal_add_level" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Tambah Level Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="<?php echo base_url('admin/add/member_level'); ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-control-label" for="nama_level">Nama Level</label>
                                <input type="text" name="nama_level" class="form-control" id="nama_level" placeholder="Nama Level Member" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="nilai">Member Value</label>
                                <input type="number" min="0" step="0.01" name="nilai" class="form-control" id="nilai" placeholder="Member Value" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-control-label" for="smp">Standar Minimal Pembelian</label>
                                <input type="number" min="0" name="smp" class="form-control" id="smp" placeholder="Standar Minimal Pembelian Perbulan" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="diskon">Diskon (%)</label>
                                <input type="number" min="0" step="0.01" name="diskon" class="form-control" id="diskon" placeholder="Diskon Pembelian" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="keterangan">Keterangan</label>
                                <textarea name="keterangan" class="form-control" id="keterangan" rows="3" required placeholder="Keterangan"></textarea>
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

<div class="modal fade" id="modal_edit_level" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="<?php echo base_url('admin/act/update_member_level/0'); ?>" method="POST">
                <input type="hidden" name="id_member_level">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-control-label" for="nama_level">Nama Level</label>
                                <input type="text" name="nama_level" class="form-control" id="nama_level" placeholder="Nama Level Member" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="nilai">Member Value</label>
                                <input type="number" min="0" step="0.01" name="nilai" class="form-control" id="nilai" placeholder="Member Value" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-control-label" for="smp">Standar Minimal Pembelian</label>
                                <input type="number" min="0" name="smp" class="form-control" id="smp" placeholder="Standar Minimal Pembelian Perbulan" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="diskon">Diskon</label>
                                <input type="number" min="0" step="0.01" name="diskon" class="form-control" id="diskon" placeholder="Diskon Pembelian" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="keterangan">Keterangan</label>
                                <textarea name="keterangan" class="form-control" id="keterangan" rows="3" required placeholder="Keterangan"></textarea>
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

<script type="text/javascript">
    function edit_level(id) {
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('admin/get/member_level') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_member_level"]').val(data.id_member_level);
                $('[name="nama_level"]').val(data.nama_level);
                $('[name="nilai"]').val(data.nilai);
                $('[name="smp"]').val(data.smp);
                $('[name="diskon"]').val(data.diskon);
                $('[name="keterangan"]').val(data.keterangan);

                $('#modal_edit_level').modal('show');
                $('.modal-title').text('Edit Member Level');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax server');
            }
        });
    }
</script>