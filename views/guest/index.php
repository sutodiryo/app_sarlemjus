<?php $this->load->view('guest/_/header') ?>

<section class="hero-section">
	<div class="hero-slider owl-carousel">
		<div class="hs-item set-bg" data-setbg="<?php echo FRONT_ASSETS ?>img/bg.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-7 text-white">
						<span>New Products</span>
						<h2>Sarlemjus</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
						<a href="#" class="site-btn sb-line">DISCOVER</a>
						<a href="#" class="site-btn sb-white">ADD TO CART</a>
					</div>
				</div>
				<div class="offer-card text-white">
					<span>from</span>
					<h2>$29</h2>
					<p>SHOP NOW</p>
				</div>
			</div>
		</div>
		<div class="hs-item set-bg" data-setbg="<?php echo FRONT_ASSETS ?>img/bg-2.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-7 text-white">
						<span>New Products</span>
						<h2>Sarlemjus Cofee</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
						<a href="#" class="site-btn sb-line">DISCOVER</a>
						<a href="#" class="site-btn sb-white">ADD TO CART</a>
					</div>
				</div>
				<div class="offer-card text-white">
					<span>from</span>
					<h2>$29</h2>
					<p>SHOP NOW</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="slide-num-holder" id="snh-1"></div>
	</div>
</section>

<section class="features-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 p-0 feature">
				<div class="feature-inner">
					<div class="feature-icon">
						<img src="<?php echo FRONT_ASSETS ?>img/icons/1.png" alt="#">
					</div>
					<h2>Fast Secure Payments</h2>
				</div>
			</div>
			<div class="col-md-4 p-0 feature">
				<div class="feature-inner">
					<div class="feature-icon">
						<img src="<?php echo FRONT_ASSETS ?>img/icons/2.png" alt="#">
					</div>
					<h2>Premium Products</h2>
				</div>
			</div>
			<div class="col-md-4 p-0 feature">
				<div class="feature-inner">
					<div class="feature-icon">
						<img src="<?php echo FRONT_ASSETS ?>img/icons/3.png" alt="#">
					</div>
					<h2>Free & fast Delivery</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="top-letest-product-section">

	<div class="container">
		<div class="section-title">
			<h2>Frequently Asked Question</h2>
		</div>

		<div id="accordion" class="accordion-area">
			<div class="panel">
				<div class="panel-header" id="headingOne">
					<!-- <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button> -->
					<button class="panel-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">information</button>
				</div>
				<div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="panel-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
						<p>Approx length 66cm/26" (Based on a UK size 8 sample)</p>
						<p>Mixed fibres</p>
						<p>The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5'8"</p>
					</div>
				</div>
			</div>
			<div class="panel">
				<div class="panel-header" id="headingTwo">
					<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
				</div>
				<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
					<div class="panel-body">
						<img src="./img/cards.png" alt="">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
					</div>
				</div>
			</div>
			<div class="panel">
				<div class="panel-header" id="headingThree">
					<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
				</div>
				<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
					<div class="panel-body">
						<h4>7 Days Returns</h4>
						<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<!-- <section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>LATEST PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?php echo FRONT_ASSETS ?>/img/product/1.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<div class="tag-new">New</div>
						<img src="<?php echo FRONT_ASSETS ?>/img/product/2.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Black and White Stripes Dress</p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?php echo FRONT_ASSETS ?>/img/product/3.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?php echo FRONT_ASSETS ?>/img/product/4.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?php echo FRONT_ASSETS ?>/img/product/6.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
			</div>
		</div>
	</section> -->

<section class="product-filter-section">
	<div class="container">
		<div class="section-title">
			<h2>BROWSE TOP SELLING PRODUCTS</h2>
		</div>
		<ul class="product-filter-menu">
			<li><a href="#">Minuman</a></li>
			<li><a href="#">Snack</a></li>
			<li><a href="#">Paket</a></li>
			<li><a href="#">Promo</a></li>
			<!-- <li><a href="#">DRESSES</a></li>
				<li><a href="#">COATS</a></li>
				<li><a href="#">JUMPERS</a></li>
				<li><a href="#">LEGGINGS</a></li> -->
		</ul>
		<div class="row">

			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<img class="product-img" src="<?php echo FRONT_ASSETS ?>/img/product/5.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Sarlemjus Coffee</p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<div class="tag-sale">ON SALE</div>
						<img class="product-img" src="<?php echo FRONT_ASSETS ?>/img/product/6.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Sarlemjus Chocolate</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<img class="product-img" src="<?php echo FRONT_ASSETS ?>/img/product/7.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Sarlemjus U Gula</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<img class="product-img" src="<?php echo FRONT_ASSETS ?>/img/product/8.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Sarlemjus Tea</p>
					</div>
				</div>
			</div>
			<!-- <div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="<?php echo FRONT_ASSETS ?>/img/product/9.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="<?php echo FRONT_ASSETS ?>/img/product/10.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Black and White Stripes Dress</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="<?php echo FRONT_ASSETS ?>/img/product/11.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="<?php echo FRONT_ASSETS ?>/img/product/12.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div> -->
		</div>
		<div class="text-center pt-5">
			<button class="site-btn sb-line sb-dark">LOAD MORE</button>
		</div>
	</div>
</section>

<section class="banner-section">
	<div class="container">
		<div class="banner set-bg" data-setbg="<?php echo FRONT_ASSETS ?>img/banner-bg.jpg">
			<div class="tag-new">NEW</div>
			<span>New Products</span>
			<h2>SARLEMJUS</h2>
			<a href="#" class="site-btn">SHOP NOW</a>
		</div>
	</div>
</section>

<?php $this->load->view('guest/_/footer') ?>