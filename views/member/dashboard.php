<?php $this->load->view('member/_/header'); ?>

<div class="pcoded-main-container">
    <div class="pcoded-content">

        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <!-- <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard sale</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard sale</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- seo analytics start -->
            <!-- <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>20500</h3>
                        <p class="text-muted">Site Analysis</p>
                        <div id="seo-anlytics1"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>20500</h3>
                        <p class="text-muted">Total Sales</p>
                        <div id="seo-anlytics2"></div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>28000</h3>
                        <p class="text-muted">Total Visits</p>
                        <div id="seo-anlytics3"></div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>59600</h3>
                        <p class="text-muted">Total Usage</p>
                        <div id="seo-anlytics4"></div>
                    </div>
                </div>
            </div> -->
            <!-- seo analytics end -->
            <!-- Latest Order start -->
            <!-- <div class="col-lg-4 col-md-12">
                <div class="card overflow-hidden">
                    <div class="card-body bg-c-green pb-0">
                        <div class="row text-white">
                            <div class="col-auto">
                                <h4 class="m-b-5 text-white">$654</h4>
                                <h6 class="text-white">+1.65(2.56%)</h6>
                            </div>
                            <div class="col text-right">
                                <h6 class="text-white">Friday</h6>
                            </div>
                        </div>
                        <div id="sec-ecommerce-chart-line"></div>
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div id="sec-ecommerce-chart-bar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <h4>$2654.00</h4>
                        <p class="text-muted">Sales in Nov.</p>
                        <div class="row">
                            <div class="col">
                                <p class="text-muted m-b-5">From Market</p>
                                <h6>$1860.00</h6>
                            </div>
                            <div class="col">
                                <p class="text-muted m-b-5">Referral</p>
                                <h6>$500.00</h6>
                            </div>
                            <div class="col">
                                <p class="text-muted m-b-5">Affiliate</p>
                                <h6>$294.00</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card table-card latest-activity-card">
                    <div class="card-header">
                        <h5>Latest Order</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Order ID</th>
                                        <th>Photo</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Deo</td>
                                        <td>#814123</td>
                                        <td><img src="<?php echo ASSETS ?>images/widget/PHONE1.jpg" alt="" class="img-fluid"></td>
                                        <td>Moto G5</td>
                                        <td>10</td>
                                        <td>17-2-2019</td>
                                        <td><label class="badge badge-light-warning">Pending</label></td>
                                        <td><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>Jenny William</td>
                                        <td>#684898</td>
                                        <td><img src="<?php echo ASSETS ?>images/widget/PHONE2.jpg" alt="" class="img-fluid"></td>
                                        <td>iPhone 8</td>
                                        <td>16</td>
                                        <td>20-2-2019</td>
                                        <td><label class="badge badge-light-primary">Paid</label></td>
                                        <td><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>Lori Moore</td>
                                        <td>#454898</td>
                                        <td><img src="<?php echo ASSETS ?>images/widget/PHONE3.jpg" alt="" class="img-fluid"></td>
                                        <td>Redmi 4</td>
                                        <td>20</td>
                                        <td>17-2-2019</td>
                                        <td><label class="badge badge-light-success">Success</label></td>
                                        <td><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Latest Order end -->
            <!-- order  start -->
            <div class="col-md-12 col-xl-4">
                <div class="card bg-c-yellow order-card">
                    <div class="card-body">
                        <h6 class="text-white">Revenue</h6>
                        <h2 class="text-white">$42,562</h2>
                        <p class="m-b-0">$5,032 <i class="feather icon-arrow-up m-l-10"></i></p>
                        <i class="card-icon feather icon-filter"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card bg-c-green order-card">
                    <div class="card-body">
                        <h6 class="text-white">Orders Received</h6>
                        <h2 class="text-white">486</h2>
                        <p class="m-b-0">$5,032 <i class="feather icon-arrow-up m-l-10 m-r-10"></i>$1,055 <i class="feather icon-arrow-down"></i></p>
                        <i class="card-icon feather icon-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card bg-c-yellow order-card">
                    <div class="card-body">
                        <h6 class="text-white">Total Sales</h6>
                        <h2 class="text-white">1641</h2>
                        <p class="m-b-0">$5,032 <i class="feather icon-arrow-down m-l-10 m-r-10"></i>$1,055 <i class="feather icon-arrow-up"></i></p>
                        <i class="card-icon feather icon-radio"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-md-6">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>New Products</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <div class="stock-scroll" style="height:386px;position:relative;">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Product Code</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                            <th>Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sofa</td>
                                            <td>#PHD001</td>
                                            <td>abc@gmail.com</td>
                                            <td><label class="badge badge-light-danger">Out Stock</label></td>
                                            <td>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Computer</td>
                                            <td>#PHD002</td>
                                            <td>cdc@gmail.com</td>
                                            <td><label class="badge badge-light-success">In Stock</label></td>
                                            <td>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td>#PHD003</td>
                                            <td>pqr@gmail.com</td>
                                            <td><label class="badge badge-light-danger">Out Stock</label></td>
                                            <td>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Coat</td>
                                            <td>#PHD004</td>
                                            <td>bcs@gmail.com</td>
                                            <td><label class="badge badge-light-success">In Stock</label></td>
                                            <td>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Watch</td>
                                            <td>#PHD003</td>
                                            <td>cdc@gmail.com</td>
                                            <td><label class="badge badge-light-danger">Out Stock</label></td>
                                            <td>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sofa</td>
                                            <td>#PHD009</td>
                                            <td>xyz@gmail.com</td>
                                            <td><label class="badge badge-light-danger">Out Stock</label></td>
                                            <td>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Coat</td>
                                            <td>#PHD005</td>
                                            <td>dfg@gmail.com</td>
                                            <td><label class="badge badge-light-success">In Stock</label></td>
                                            <td>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-c-yellow"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                                <a href="#!"><i class="fa fa-star f-14 text-muted"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- order  end -->
            <!-- Latest Customers start -->
            <!-- <div class="col-lg-8 col-md-12">
                <div class="card table-card review-card">
                    <div class="card-header borderless ">
                        <h5>Customer Reviews</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="review-block">
                            <div class="row">
                                <div class="col-sm-auto p-r-0">
                                    <img src="<?php echo ASSETS ?>images/user/avatar-2.jpg" alt="user image" class="img-radius profile-img cust-img m-b-15">
                                </div>
                                <div class="col">
                                    <h6 class="m-b-15">John Deo <span class="float-right f-13 text-muted"> a week ago</span></h6>
                                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                                    <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                                    <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                                    <p class="m-t-15 m-b-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    <a href="#!" class="m-r-30 text-muted"><i class="feather icon-thumbs-up m-r-15"></i>Helpful?</a>
                                    <a href="#!"><i class="feather icon-heart-on text-c-red m-r-15"></i></a>
                                    <a href="#!"><i class="feather icon-edit text-muted"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-auto p-r-0">
                                    <img src="<?php echo ASSETS ?>images/user/avatar-4.jpg" alt="user image" class="img-radius profile-img cust-img m-b-15">
                                </div>
                                <div class="col">
                                    <h6 class="m-b-15">Allina D’croze <span class="float-right f-13 text-muted"> a week ago</span></h6>
                                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                                    <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                                    <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                                    <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                                    <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                                    <p class="m-t-15 m-b-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    <a href="#!" class="m-r-30 text-muted"><i class="feather icon-thumbs-up m-r-15"></i>Helpful?</a>
                                    <a href="#!"><i class="feather icon-heart-on text-c-red m-r-15"></i></a>
                                    <a href="#!"><i class="feather icon-edit text-muted"></i></a>
                                    <blockquote class="blockquote m-t-15 m-b-0">
                                        <h6>Allina D’croze</h6>
                                        <p class="m-b-0 text-muted">Lorem Ipsum is simply dummy text of the industry.</p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="text-right  m-r-20">
                            <a href="#!" class="b-b-primary text-primary">View all Customer Reviews</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card ">
                    <div class="card-body ">
                        <h2 class="text-center f-w-400 ">$45,567</h2>
                        <p class="text-center text-muted ">Monthly Profit</p>
                        <div id="monthlyprofit-1"></div>
                        <div class="m-t-20">
                            <div class="row ">
                                <div class="col-6 text-center ">
                                    <h6 class="f-20 f-w-400">$6,234</h6>
                                    <p class="text-muted f-14 m-b-0">Today</p>
                                </div>
                                <div class="col-6 text-center ">
                                    <h6 class="f-20 f-w-400">$4,387</h6>
                                    <p class="text-muted f-14 m-b-0">Yesterday</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body ">
                        <h2 class="text-center f-w-400 ">2,413</h2>
                        <p class="text-center text-muted ">Total Sales</p>
                        <div id="monthlyprofit-2"></div>
                        <div class="m-t-20">
                            <div class="row ">
                                <div class="col-6 text-center ">
                                    <h6 class="f-20 f-w-400">1578</h6>
                                    <p class="text-muted f-14 m-b-0">Today</p>
                                </div>
                                <div class="col-6 text-center ">
                                    <h6 class="f-20 f-w-400">1028</h6>
                                    <p class="text-muted f-14 m-b-0">Yesterday</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        </div>
    </div>

    <?php $this->load->view('member/_/footer'); ?>