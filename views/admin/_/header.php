<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title><?php echo MAIN_TITLE . $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="<?php echo MAIN_DESC ?>" />
    <meta name="keywords" content="<?php echo KEYWORDS ?>">
    <meta name="author" content="<?php echo AUTHOR ?>" />

    <link href="<?php echo FAVICON ?>" rel="icon">

    <?php if ($page == "dashboard") { ?>
        <link rel="stylesheet" href="<?php echo ASSETS ?>css/plugins/dataTables.bootstrap4.min.css">
    <?php } elseif ($page == "member" || $page == "product" || $page == "course") { ?>

        <link rel="stylesheet" href="<?php echo ASSETS ?>css/plugins/select2.min.css">
        <link rel="stylesheet" href="<?php echo ASSETS ?>css/plugins/dataTables.bootstrap4.min.css">
        <?php if ($title = "Detail Member") { ?>

            <link rel="stylesheet" href="<?php echo ASSETS ?>css/plugins/ekko-lightbox.css">
            <link rel="stylesheet" href="<?php echo ASSETS ?>css/plugins/lightbox.min.css">
    <?php
        }
    }  ?>

    <link rel="stylesheet" href="<?php echo ASSETS ?>css/style.css">
</head>

<body class="">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <nav class="pcoded-navbar menu-light ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">

                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius" src="<?php echo ASSETS ?>images/user/avatar-2.jpg" alt="User-Profile-Image">
                        <div class="user-details">
                            <div id="more-details"><?php echo $this->session->userdata('log_level_name') ?> <i class="fa fa-caret-down"></i></div>
                        </div>
                    </div>
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="<?php echo base_url('member/profile') ?>" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
                            <!-- <li class="list-inline-item"><a href="email_inbox.html"><i class="feather icon-mail" data-toggle="tooltip" title="Messages"></i><small class="badge badge-pill badge-primary">5</small></a></li> -->
                            <li class="list-inline-item"><a href="<?php echo base_url('logout') ?>" onclick="return confirm('Anda yakin ingin keluar ?');" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
                        </ul>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Menu</label>
                    </li>

                    <li class="nav-item <?php if ($page == "dashboard") {
                                            echo "active";
                                        } ?>"><a href="<?php echo base_url('admin') ?>" class="nav-link"><span class="pcoded-micon"><i class="fas fa-tachometer-alt"></i></span><span class="pcoded-mtext">Dashboard</span></a></li> <!-- fas fa-tachometer-alt -->

                    <li class="nav-item <?php if ($page == "transaction") {
                                            echo "active";
                                        } ?>"><a href="<?php echo base_url('admin/transaction/list/all') ?>" class="nav-link"><span class="pcoded-micon"><i class="fas fa-shopping-cart"></i></span><span class="pcoded-mtext">Transaksi</span></a></li>

                    <li class="nav-item <?php if ($page == "member") {
                                            echo "active";
                                        } ?>"><a href="<?php echo base_url('admin/member/all') ?>" class="nav-link"><span class="pcoded-micon"><i class="fas fa-users"></i></span><span class="pcoded-mtext">Member</span></a></li>

                    <li class="nav-item pcoded-menu-caption">
                        <label>Master</label>
                    </li>

                    <li class="nav-item <?php if ($page == "product") {
                                            echo "active";
                                        } ?>"><a href="<?php echo base_url('admin/master/product/all') ?>" class="nav-link"><span class="pcoded-micon"><i class="fas fa-store"></i></span><span class="pcoded-mtext">Product</span></a></li>

                    <li class="nav-item <?php if ($page == "course") {
                                            echo "active";
                                        } ?>"><a href="<?php echo base_url('admin/master/course') ?>" class="nav-link"><span class="pcoded-micon"><i class="fas fa-graduation-cap"></i></span><span class="pcoded-mtext">Course</span></a></li>

                    <li class="nav-item <?php if ($page == "point") {
                                            echo "active";
                                        } ?>"><a href="<?php echo base_url('admin/master/point') ?>" class="nav-link"><span class="pcoded-micon"><i class="fas fa-star-half-alt"></i></span><span class="pcoded-mtext">Poin</span></a></li>

                    <li class="nav-item <?php if ($page == "bonus") {
                                            echo "active";
                                        } ?>"><a href="<?php echo base_url('admin/master/bonus') ?>" class="nav-link"><span class="pcoded-micon"><i class="fas fa-gift"></i></span><span class="pcoded-mtext">Bonus</span></a></li>

                    <li class="nav-item <?php if ($page == "member_level") {
                                            echo "active";
                                        } ?>"><a href="<?php echo base_url('admin/master/member_level') ?>" class="nav-link"><span class="pcoded-micon"><i class="fas fa-users-cog"></i></span><span class="pcoded-mtext">Level Member</span></a></li>

                    <li class="nav-item pcoded-menu-caption">
                        <label>Laporan</label>
                    </li>

                    <li class="nav-item <?php if ($page == "bonus") {
                                            echo "active";
                                        } ?>"><a href="<?php echo base_url('report/bonus') ?>" class="nav-link"><span class="pcoded-micon"><i class="fas fa-gift"></i></span><span class="pcoded-mtext">Laporan Bonus</span></a></li>


                </ul>

            </div>
        </div>
    </nav>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <img src="<?php echo ASSETS ?>images/logo-mini.png" alt="" class="logo">
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                    <div class="search-bar">
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-shopping-cart"></i></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0 text-center">Keranjang Belanja</h6>
                                <!-- <div class="float-right">
                                    <a href="#!" class="m-r-10">mark as read</a>
                                    <a href="#!">clear all</a>
                                </div> -->
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="<?php echo ASSETS ?>images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="<?php echo ASSETS ?>images/user/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="<?php echo ASSETS ?>images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="<?php echo ASSETS ?>images/user/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="#!">CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-right">
                                    <a href="#!" class="m-r-10">mark as read</a>
                                    <a href="#!">clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="<?php echo ASSETS ?>images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="<?php echo ASSETS ?>images/user/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="<?php echo ASSETS ?>images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="<?php echo ASSETS ?>images/user/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="#!">show all</a>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="<?php echo ASSETS ?>images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                                <span>John Doe</span>
                                <a href="auth-signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                                <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                            </ul>
                        </div>
                    </div>
                </li> -->
            </ul>
        </div>
    </header>