<footer id="app-gym-footer" class="app-gym-footer-section position-relative">
  <span class="app-gym-footer-shape1 position-absolute"><img src="<?php echo GUEST_ASSETS ?>img/footer-bg-2.png" alt=""></span>
  <span class="app-gym-footer-shape2 position-absolute"><img src="<?php echo GUEST_ASSETS ?>img/gym/p-shape1.png" alt=""></span>
  <span class="app-gym-footer-shape3 position-absolute"><img src="<?php echo GUEST_ASSETS ?>img/gym/f-sh3.png" alt=""></span>
  <!-- <span class="app-gym-footer-shape4 position-absolute"><img src="<?php echo GUEST_ASSETS ?>img/gym/f-sh2.png" alt=""></span> -->
  <div class="container">
    <div class="app-gym-footer-widget-area">
      <div class="row">
        <div class="col-lg-5 col-md-6">
          <div class="app-gym-footer-widget  app-gym-headline pera-content ul-li-block">
            <div class="app-gym-logo-widget">
              <div class="app-gym-footer-logo">
                <a href="#"><img src="<?php echo GUEST_ASSETS ?>img/logo.png" alt=""></a>
              </div>
              <p>Hedatat non proident, sunt in culpa qui offic ia dolore eu fugiat nul lamco laboris nisi ut aliq uip ex ea commodo consequat. Duis aute irure dolor in reprehe fugiat </p>
              <div class="app-gym-footer-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-3">
          <div class="app-gym-footer-widget app-gym-headline pera-content ul-li-block">
            <div class="app-gym-footer-menu">
              <h3 class="widget-title">Company</h3>
              <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Our Story</a></li>
                <li><a href="#">Career</a></li>
                <li><a href="#">Special Offers</a></li>
                <li><a href="#">Team Members</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-3">
          <div class="app-gym-footer-widget app-gym-headline pera-content ul-li-block">
            <div class="app-gym-footer-menu">
              <h3 class="widget-title">Useful Links</h3>
              <ul>
                <li><a href="#">Popular Courses</a></li>
                <li><a href="#">Discounts</a></li>
                <li><a href="#">Legal Advice</a></li>
                <li><a href="#">Refunds</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="app-gym-footer-widget app-gym-headline pera-content ul-li-block">
            <div class="app-gym-twitter">
              <h3 class="widget-title">Recent Tweets</h3>
              <div class="app-gym-twitter-area">
                <div class="app-gym-twitter-content">
                  <div class="app-gym-twitter-icon float-left">
                    <i class="fab fa-twitter"></i>
                  </div>
                  <div class="app-gym-twitter-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisi cing elit <a href="#">bit.ly/43Esd</a></p>
                  </div>
                </div>
                <div class="app-gym-twitter-content">
                  <div class="app-gym-twitter-icon float-left">
                    <i class="fab fa-twitter"></i>
                  </div>
                  <div class="app-gym-twitter-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisi cing elit <a href="#">bit.ly/43Esd</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="app-gym-footer-copyright position-relative clearfix">
      <div class="copyright-text float-left">
        <p>Copyright © <?= date('Y') ?> <a href="<?= base_url() ?>">PT. Shahana Plus Sukses</a></p>
      </div>
      <div class="copyright-menu float-right ul-li">
        <ul>
          <li><a href="#">Terms & Condition </a></li>
          <li><a href="#">Privacy Policy </a></li>
          <li><a href="<?= base_url('login') ?>">Login </a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<script src="<?php echo GUEST_ASSETS ?>js/jquery.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/popper.min.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/appear.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/bootstrap.min.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/jquery.fancybox.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/tilt.jquery.min.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/owl.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/typer-new.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/odometer.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/parallax-scroll.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/rbtools.min.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/rs6.min.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/wow.min.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/side-demo.js"></script>
<script src="<?php echo GUEST_ASSETS ?>js/gym.js"></script>
<script type="text/javascript">
  var revapi8,
    tpj;

  function revinit_revslider81() {
    jQuery(function() {
      tpj = jQuery;
      revapi8 = tpj("#rev_slider_8_1");
      if (revapi8 == undefined || revapi8.revolution == undefined) {
        revslider_showDoubleJqueryError("rev_slider_8_1");
      } else {
        revapi8.revolution({
          DPR: "dpr",
          sliderLayout: "fullwidth",
          visibilityLevels: "1240,1024,778,480",
          gridwidth: 1240,
          gridheight: 1080,
          perspective: 600,
          perspectiveType: "global",
          editorheight: "1080,768,960,720",
          responsiveLevels: "1240,1024,778,480",
          progressBar: {
            disableProgressBar: true
          },
          navigation: {
            onHoverStop: false
          },
          parallax: {
            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 30],
            type: "scroll",
            origo: "slidercenter",
            speed: 0
          },
          fallbacks: {
            allowHTML5AutoPlayOnAndroid: true
          },
        });
      }

    });
  }
  var once_revslider81 = false;
  if (document.readyState === "loading") {
    document.addEventListener('readystatechange', function() {
      if ((document.readyState === "interactive" || document.readyState === "complete") && !once_revslider81) {
        once_revslider81 = true;
        revinit_revslider81();
      }
    });
  } else {
    once_revslider81 = true;
    revinit_revslider81();
  }
</script>
</body>

</html>