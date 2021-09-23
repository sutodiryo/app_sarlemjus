<?php $this->load->view('admin/_/header'); ?>

<?php $this->session->set_userdata('ref_member', current_url()); ?>

<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 d-inline-block mb-0"><?php echo $title ?></h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a data-toggle="modal" href="#modal_add_bonus" class="btn btn-sm btn-neutral" title="Tambah Bonus Baru"><i class="fa fa-plus"></i> Bonus Baru</a>
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
                                <th width="10%">No</th>
                                <th width="30%">Nama Bonus</th>
                                <th width="20%">Minimal PV</th>
                                <th width="30%">Keterangan</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 0;
                            foreach ($bonus as $b) {
                                $no++;

                                echo "<tr>
                                        <td><span class='lead mb-0'>$no</span></td>
                                        <td><span class='lead mb-0'>$b->nama_bonus</span></td>
                                        <td><span class='lead text-danger mb-0'>$b->total_pv PV</span></td>
                                        <td><textarea class='form-control' readonly>$b->keterangan</textarea></td>
                                        <td class='text-center'>
                                            <a href='javascript:void(0)' onclick=\"edit_bonus('$b->id_bonus')\" class='table-action' data-toggle='tooltip' data-original-title='Edit Bonus'>
                                            <i class='fa fa-edit'></i>
                                            </a>
                                            <a href='" . base_url('admin/del/bonus/') . "$b->id_bonus/' onclick=\"return confirm('Anda yakin ingin menghapus data ini?')\" class='table-action table-action-delete' data-toggle='tooltip' data-original-title='Delete Bonus'>
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


<div class="modal fade" id="modal_add_bonus" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Tambah Bonus Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="<?php echo base_url('admin/add/bonus/'); ?>" method="POST">
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="total_pv">Nilai PV</label>
                                <input type="text" name="total_pv" class="form-control" id="total_pv" placeholder="Nilai PV Minimal Bonus" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-control-label" for="nama_bonus">Nama Bonus</label>
                                <input type="text" name="nama_bonus" class="form-control" id="nama_bonus" placeholder="Nama Bonus" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="keterangan">Keterangan</label>
                                <textarea name="keterangan" class="form-control" id="keterangan" rows="3" required placeholder="Keterangan terkait bonus"></textarea>
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

<div class="modal fade" id="modal_edit_bonus" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="<?php echo base_url('admin/act/update_bonus/0'); ?>" method="POST">
                <input type="hidden" name="id_bonus">
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="total_pv">Nilai PV</label>
                                <input type="text" name="total_pv" class="form-control" id="total_pv" placeholder="Nilai PV Minimal Bonus" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-control-label" for="nama_bonus">Nama Bonus</label>
                                <input type="text" name="nama_bonus" class="form-control" id="nama_bonus" placeholder="Nama Bonus" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="keterangan">Keterangan</label>
                                <textarea name="keterangan" class="form-control" id="keterangan" rows="3" required placeholder="Keterangan terkait bonus"></textarea>
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
    function edit_bonus(id) {
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('admin/get/bonus') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_bonus"]').val(data.id_bonus);
                $('[name="nama_bonus"]').val(data.nama_bonus);
                $('[name="total_pv"]').val(data.total_pv);
                $('[name="keterangan"]').val(data.keterangan);

                $('#modal_edit_bonus').modal('show');
                $('.modal-title').text('Edit Bonus');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax server');
            }
        });
    }
</script>