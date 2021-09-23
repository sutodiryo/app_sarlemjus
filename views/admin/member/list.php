<?php $this->load->view('admin/_/header'); ?>

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10"><?php echo $title;
                                                if ($title2 != '') {
                                                    echo " $title2->level_name";
                                                } ?></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a>Member</a></li>
                            <!-- <li class="breadcrumb-item"><a href="<?php echo base_url('admin/member/all') ?>">Member</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
            foreach ($member_stat as $ms) {

                echo "<div class='col-lg-3 col-md-6'>
                <a href='" . base_url('admin/member/') . "$ms->id' class='card'>
                    <div class='card-body'>
                        <div class='row align-items-center'>
                            <div class='col-12'>
                                <h4 class='text-c-default'>$ms->total $ms->level_name</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>";
            }
            ?>

            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h5>Parents List </h5>
                    </div> -->
                    <div class="card-body">
                        <div class="row align-items-center m-l-1 mb-3">
                            <div class="col-sm-6">
                                <button class="btn btn-secondary btn-sm btn-round has-ripple" data-toggle="modal" data-target="#modal_tambah_member"><i class="feather icon-filter"></i> Filter</button>
                            </div>
                            <div class="col-sm-6 text-right ">
                                <a class="btn btn-info btn-sm btn-round has-ripple" href="<?= base_url('admin/member/add/new') ?>"><i class="feather icon-plus"></i> Tambah Member</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="table_member" class="table table-bordered table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="40%">Name</th>
                                        <th width="20%">Alamat</th>
                                        <th width="10%">Email</th>
                                        <th width="10%">No HP</th>
                                        <th width="5%">Level</th>
                                        <th width="10%" class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($member as $m) {
                                        echo "<tr>
                                        <td>#$m->id</td>
                                        <td><img src='" . ASSETS . "images/upload/member/avatar-1.jpg' class='img-radius' width='30px' height='30px'> $m->name</td>
                                        <td>$m->address</td>
                                        <td>$m->email</td>
                                        <td>$m->phone</td>
                                        <td>$m->level_name</td>
                                        <td class='text-center'>
                                            <div class='btn-group mb-2 mr-2'>
                                                <button class='btn btn-outline-secondary dropdown-toggle btn-sm has-ripple' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Action<span class='ripple ripple-animate' style='height: 118.875px; width: 118.875px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -31.8125px; left: -7.5px;'></span></button>
                                                <div class='dropdown-menu' style=''>
                                                    <a class='dropdown-item' href='" . base_url('admin/member/detail/') . "$m->id' target='_blank'><i class='feather icon-eye'></i> Detail</a>
                                                    <a class='dropdown-item' href='#!'><i class='feather icon-edit'></i> Edit</a>
                                                    <div class='dropdown-divider'></div>
                                                    <a class='dropdown-item' href='#!' onclick=\"return confirm('Anda yakin ingin menghapus data ini ?');\" ><i class='feather icon-trash-2'></i> Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- subscribe end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<!-- <div class="modal fade" id="modal_tambah_member" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">Name</label>
                                <input type="text" class="form-control" id="Name" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Email">Email</label>
                                <input type="email" class="form-control" id="Email" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Subject">Subject</label>
                                <input type="text" class="form-control" id="Subject" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label" for="Address">Address</label>
                                <textarea class="form-control" id="Address" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Sex">Select Sex</label>
                                <select class="form-control" id="Sex">
                                    <option value=""></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Icon">Profie Image</label>
                                <input type="file" class="form-control" id="Icon" placeholder="sdf">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Occupation">Joining Date</label>
                                <input type="date" class="form-control" id="Occupation" placeholder="123">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Age">Age</label>
                                <input type="text" class="form-control" id="Age" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-danger">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

<?php $this->load->view('admin/_/footer'); ?>

<!-- <div class="modal fade" id="modal_add_member" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Tambah Member Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="<?php echo base_url('admin/add/member'); ?>" method="POST">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-control-label" for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama lengkap sesuai KTP" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="level_add">Level</label>
                                <select class="form-control" id="level_add" name="level">
                                    <?php
                                    foreach ($level as $lv) {
                                        echo "<option value='$lv->id_member_level'>$lv->level_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <?php date_default_timezone_set('Asia/Jakarta'); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="id_upline_add">Upline</label>
                                <select name="id_upline" id="id_upline_add" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id_upline_add="1" tabindex="-1" aria-hidden="true" required>
                                    <option value="0">Tidak ada</option>
                                    <?php
                                    $no = 0;
                                    foreach ($sel_member as $sm) {
                                        $no++;
                                        echo "<option data-select2-id_upline_add='$no' value='$sm->id'>$sm->nama - $sm->phone</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="phone">No HP (WA)</label>
                                <input type="number" name="phone" class="form-control" id="phone" placeholder="No HP aktif" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="id_location_add">Kota/Kabupaten</label>
                                <select name="id_location" id="id_location_add" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id_location_add="1" tabindex="-1" aria-hidden="true" required>
                                    <?php
                                    $no = 0;
                                    foreach ($lokasi as $lk) {
                                        $no++;
                                        echo "<option data-select2-id_location_add='$no' value='$lk->id_location'>$lk->location_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="alamat">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="3" required placeholder="Alamat lengkap"></textarea>
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

<div class="modal fade" id="modal_edit_member" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="<?php echo base_url('admin/act/update_member/0'); ?>" method="POST">
                <input type="hidden" name="id_member">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-control-label" for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama lengkap sesuai KTP" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="level">Level</label>
                                <select class="form-control" id="level" name="level">
                                    <?php
                                    foreach ($level as $lv) {
                                        echo "<option value='$lv->id_member_level'>$lv->level_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <?php date_default_timezone_set('Asia/Jakarta'); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="id_upline">Upline</label>
                                <select name="id_upline" id="id_upline" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id_upline="1" tabindex="-1" aria-hidden="true" required>
                                    <option value="0">Tidak ada</option>
                                    <?php
                                    $no = 0;
                                    foreach ($sel_member as $sm) {
                                        $no++;
                                        echo "<option data-select2-id_upline='$no' value='$sm->id_member'>$sm->nama - $sm->phone</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="phone">No HP (WA)</label>
                                <input type="number" name="phone" class="form-control" id="phone" placeholder="No HP aktif" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="kota">Kota/Kabupaten</label>
                                <select name="kota" id="kota" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id_admin="1" tabindex="-1" aria-hidden="true" required>
                                    <?php
                                    $no = 0;
                                    foreach ($lokasi as $lk) {
                                        $no++;
                                        echo "<option data-select2-id_location='$no' value='$lk->id_location'>$lk->location_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="alamat">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="3" required placeholder="Alamat lengkap"></textarea>
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
</div> -->

<script type="text/javascript">
    function edit_member(id_member) {
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('admin/get/member') ?>/" + id_member,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_member"]').val(data.id_member);
                $('[name="id_upline"]').val(data.id_upline);
                $('[name="nama"]').val(data.nama);
                $('[name="phone"]').val(data.phone);
                $('[name="email"]').val(data.email);
                $('[name="level"]').val(data.level);
                $('[name="kota"]').val(data.id_location);
                $('[name="address"]').val(data.address);

                $('#modal_edit_member').modal('show');
                $('.modal-title').text('Edit Member');
                $('#id_upline').select2().trigger('change');
                $('#kota').select2().trigger('change');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax server');
            }
        });
    }
</script>