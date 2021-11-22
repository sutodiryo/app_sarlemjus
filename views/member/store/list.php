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

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="row align-items-center m-l-0">
              <div class="col-sm-6">
              </div>
              <div class="col-sm-6 text-right">
                <button class="btn btn-info btn-sm btn-round has-ripple" data-toggle="modal" data-target="#modal-report"><i class="feather icon-shopping-cart"></i> Keranjang Belanja</button>
              </div>
            </div>
            <div class="table-responsive">
              <table id="table-store" class="table mb-0">
                <thead class="thead-light">
                  <tr>
                    <th width="45%">Produk</th>
                    <!-- <th>Category</th> -->
                    <!-- <th>Added Date</th> -->
                    <th width="20%">Harga</th>
                    <th width="15%">Diskon</th>
                    <th width="10%">Stok</th>
                    <!-- <th>Status</th> -->
                    <th width="10%"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($product as $p) {
                    echo "<tr>
                            <td class='align-middle'>
                              <img src='" . ASSETS . "images/product/prod-12.jpg' alt='contact-img' title='contact-img' class='rounded mr-3' height='48' />
                              <p class='m-0 d-inline-block align-middle font-16'>
                              <a href='#!' class='text-body'>$p->name</a>";

                    //   <br />
                    //   <span class='text-warning feather icon-star-on'></span>
                    //   <span class='text-warning feather icon-star-on'></span>
                    //   <span class='text-warning feather icon-star-on'></span>
                    //   <span class='text-warning feather icon-star-on'></span>
                    //   <span class='text-warning feather icon-star-on'></span>
                    // </p>

                    echo "</td>
                            <td class='align-middle'>Rp " . number_format($p->selling_price, 0, ',', '.') . "</td>
                            <td class='align-middle'>
                              $597.66
                            </td>
                            <td class='align-middle'>
                              <span class='badge badge-success'>654</span>
                            </td>
                            <td class='table-action'>
                              <a href='#!' class='btn btn-icon btn-info'><i class='fas fa-cart-plus'></i></a>
                            </td>
                            </tr>";
                  } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<?php $this->load->view('member/_/footer'); ?>