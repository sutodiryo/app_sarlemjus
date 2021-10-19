<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sarlemjus | Minuman kesehatan yang sudah teruji khasiat dan manfaatnya</title>
  <!-- <title><?php echo MAIN_TITLE ?>Home Page</title> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo MAIN_DESC ?>">
  <meta name="keywords" content="<?php echo KEYWORDS ?>">
  <link rel="shortcut icon" href="<?php echo FAVICON ?>" type="image/x-icon">
  <!-- <link rel="shortcut icon" href="<?php echo FAVICON ?>" type="image/x-icon"> -->

  <link rel="stylesheet" href="<?php echo GUEST_ASSETS ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo GUEST_ASSETS ?>css/fontawesome-all.css">
  <link rel="stylesheet" href="<?php echo GUEST_ASSETS ?>css/flaticon-4.css">
  <link rel="stylesheet" href="<?php echo GUEST_ASSETS ?>css/animate.css">
  <link rel="stylesheet" href="<?php echo GUEST_ASSETS ?>css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="<?php echo GUEST_ASSETS ?>css/odometer-theme-default.css">
  <link rel="stylesheet" href="<?php echo GUEST_ASSETS ?>css/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo GUEST_ASSETS ?>css/rs6.css">
  <link rel="stylesheet" href="<?php echo GUEST_ASSETS ?>css/style.css">
  <link rel="stylesheet" href="<?php echo GUEST_ASSETS ?>css/side-demo.css">
  <link rel="stylesheet" href="<?php echo GUEST_ASSETS ?>css/gym.css">
</head>

<body class="app-gym">
  <!-- <div id="app-gym-preloader"></div> -->
  <div class="up">
    <a href="#" class="scrollup text-center"><i class="fas fa-angle-up"></i></a>
  </div>
  <header id="app-gym-header" class="app-gym-main-header">
    <div class="container">
      <div class="app-gym-brand-logo float-left">
        <a href="#"><img src="<?php echo GUEST_ASSETS ?>img/logo.png" alt=""></a>
      </div>
      <div class="app-gym-main-header-menu clearfix">
        <div class="header-gym-cta-btn text-center float-right">
          <a href="<?= base_url('join_us') ?>">Join Us</a>
        </div>
        <nav class="app-gym-main-navigation float-right clearfix ul-li">
          <ul id="app-gym-main-nav" class="nav navbar-nav clearfix">
            <!-- <li class="side-demo position-relative"><a href="#!">Demos</a> <span>New</span></li> -->
            <li class="active"><a href="<?= base_url() ?>">Home</a></li>
            <li><a href="<?= base_url('join') ?>">Join Bisnis</a></li>
            <li><a href="<?= base_url('about') ?>">About Us</a></li>
            <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
            <!-- <li class="dropdown">
              <a href="#">Blog</a>
              <ul class="dropdown-menu clearfix">
                <li><a href="blog.html">Blog Page</a></li>
                <li><a href="blog-single.html">Blog Details</a></li>
              </ul>
            </li> -->
          </ul>
        </nav>
      </div>
      <div class="app-gym-mobile_menu position-relative">
        <div class="app-gym-mobile_menu_button app-gym-open_mobile_menu">
          <i class="fas fa-bars"></i>
        </div>
        <div class="app-gym-mobile_menu_wrap">
          <div class="mobile_menu_overlay app-gym-open_mobile_menu"></div>
          <div class="app-gym-mobile_menu_content">
            <div class="app-gym-mobile_menu_close app-gym-open_mobile_menu">
              <i class="fas fa-times"></i>
            </div>
            <div class="m-brand-logo text-center">
              <a href="%21.html#"><img src="<?php echo GUEST_ASSETS ?>img/logo.png" alt=""></a>
            </div>
            <nav class="app-gym-mobile-main-navigation  clearfix ul-li">
              <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li><a href="<?= base_url('join') ?>">Join Bisnis</a></li>
                <li><a href="<?= base_url('about') ?>">About Us</a></li>
                <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
  </header>