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

    <!-- Course -->

  </div>
</div>

<?php $this->load->view('member/_/footer'); ?>