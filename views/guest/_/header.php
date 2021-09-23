<!DOCTYPE html>
<html lang="zxx">

<head>
  <title><?php echo MAIN_TITLE ?>Home Page</title>
  <meta charset="UTF-8">
  <meta name="description" content="<?php echo MAIN_DESC ?>">
  <meta name="keywords" content="<?php echo KEYWORDS ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="<?php echo FRONT_ASSETS ?>img/favicon.ico" rel="shortcut icon" /> -->

  <link href="<?php echo FAVICON ?>" rel="icon">

  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo FRONT_ASSETS ?>css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo FRONT_ASSETS ?>css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo FRONT_ASSETS ?>css/flaticon.css" />
  <link rel="stylesheet" href="<?php echo FRONT_ASSETS ?>css/slicknav.min.css" />
  <link rel="stylesheet" href="<?php echo FRONT_ASSETS ?>css/jquery-ui.min.css" />
  <link rel="stylesheet" href="<?php echo FRONT_ASSETS ?>css/owl.carousel.min.css" />
  <link rel="stylesheet" href="<?php echo FRONT_ASSETS ?>css/animate.css" />
  <link rel="stylesheet" href="<?php echo FRONT_ASSETS ?>css/style.css" />

  <style>
    .product-img {
      border-radius: 20px;
    }
  </style>

</head>

<body>
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <header class="header-section">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 text-center text-lg-left">
            <a href="<?php echo base_url() ?>" class="site-logo">
              <img src="<?php echo FRONT_ASSETS ?>img/logo.png" alt="">
            </a>
          </div>
          <div class="col-xl-6 col-lg-5">
            <form class="header-search-form">
              <input type="text" placeholder="Search on Sarlemjus ....">
              <button><i class="flaticon-search"></i></button>
            </form>
          </div>
          <div class="col-xl-4 col-lg-5">
            <div class="user-panel">
              <div class="up-item">
                <i class="flaticon-profile"></i>
                <a href="<?php echo base_url('login') ?>">Log In</a>
              </div>
              <div class="up-item">
                <div class="shopping-card">
                  <i class="flaticon-bag"></i>
                  <span>0</span>
                </div>
                <a href="#">Cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="main-navbar">
      <div class="container">
        <ul class="main-menu">
          <li><a href="#">Home</a></li>
          <li><a href="#">Join Bisnis
            </a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact Us</a>
          </li>
          <li>
            <a href="#">Join Us <span class="new">New</span></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>