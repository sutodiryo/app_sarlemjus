s<?php $this->load->view('admin/_/header'); ?>

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
                    <th width="30%">Produk</th>
                    <th width="20%" class="text-right">Harga Satuan</th>
                    <th width="15%" class="text-center">Qty</th>
                    <th width="30%" class="text-right">Subtotal</th>
                    <th width="5%"></th>
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

</script>