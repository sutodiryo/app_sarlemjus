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
      <div class="col-sm-12">

        <div class="card">
          <div class="card-header">
            <div class="row align-items-center m-l-1 mb-3">
              <div class="col-sm-6">
                <h5><?= $course_category->name ?></h5>
              </div>
              <div class="col-sm-6 text-right ">
                <a class="btn btn-danger btn-sm btn-round has-ripple" href="<?= base_url('member/course') ?>"><i class="feather feather icon-arrow-left"></i> Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="row">

          <?php foreach ($course as $c) { ?>

            <div class="col-lg-6 col-sm-6">
              <div class="card">
                <div class="thumbnail">
                  <div class="thumb">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://youtube.com/embed/<?= $c->media_link ?>"></iframe>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="job-meta-data mb-1"><i class="fab fa-youtube"></i>Kelas Video</div>
                  <hr>
                  <h5 class="job-card-desc"><?= $c->title ?></h5>
                  <p><?= $c->description ?></p>
                  <!-- <div class="job-meta-data"><i class="far fa-handshake"></i>10 Years</div> -->
                </div>
              </div>
            </div>

          <?php } ?>

        </div>
      </div>
    </div>

  </div>
</div>

<?php $this->load->view('member/_/footer'); ?>