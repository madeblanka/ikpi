<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Postingan Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('front/assets/img/favicon.png')?>" rel="icon">
  <link href="<?= base_url('front/assets/img/apple-touch-icon.png')?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('front/assets/vendor/aos/aos.css')?>" rel="stylesheet">
  <link href="<?= base_url('front/assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?= base_url('front/assets/vendor/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">
  <link href="<?= base_url('front/assets/vendor/boxicons/css/boxicons.min.css')?>" rel="stylesheet">
  <link href="<?= base_url('front/assets/vendor/glightbox/css/glightbox.min.css')?>" rel="stylesheet">
  <link href="<?= base_url('front/assets/vendor/swiper/swiper-bundle.min.css')?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('front/assets/css/style.css')?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v3.6.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">BizLand<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="<?= site_url('front/')?>">Home</a></li>
          <li><a class="nav-link scrollto" href="<?= site_url('front/')?>">Beranda</a></li>
          <li><a class="nav-link scrollto" href="<?= site_url('front/')?>">Postingan</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
          <div class="d-flex justify-content-between align-items-center">
              <h2>Postingan Detail</h2>
            </div>
            
        </div>
    </section><!-- Breadcrumbs Section -->
    
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
             <?php foreach($postingan as $p):?>
            
            <div class="row gy-4">
                
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar1)?>" alt="<?= $p->keterangan1?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar2)?>" alt="<?= $p->keterangan2?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar3)?>" alt="<?= $p->keterangan3?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar4)?>" alt="<?= $p->keterangan4?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar5)?>" alt="<?= $p->keterangan5?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar6)?>" alt="<?= $p->keterangan6?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar7)?>" alt="<?= $p->keterangan7?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar8)?>" alt="<?= $p->keterangan8?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar9)?>" alt="<?= $p->keterangan9?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar10)?>" alt="<?= $p->keterangan10?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar11)?>" alt="<?= $p->keterangan11?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar12)?>" alt="<?= $p->keterangan12?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar13)?>" alt="<?= $p->keterangan13?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar14)?>" alt="<?= $p->keterangan14?>">
                            </div>
                            
                            <div class="swiper-slide">
                                <img src="<?= base_url('postingan/'.$p->gambar15)?>" alt="<?= $p->keterangan15?>">
                            </div>
                            
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3><?= $p->nama?></h3>
              <ul>
                <li><strong>Tanggal Event</strong>: <?= $p->tanggal?></li>
                <li><strong>Di Upload </strong>: <?= $p->created_at?></li>
                <li><strong>Terahir Dirubah </strong>: <?= $p->updated_at?></li>
                <!-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> -->
              </ul>
            </div>
            <div class="portfolio-description">
              <p>
                <?= $p->keterangan?>
              </p>
            </div>
          </div>
        <?php endforeach?>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('front/assets/vendor/aos/aos.js')?>"></script>
  <script src="<?= base_url('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?= base_url('front/assets/vendor/glightbox/js/glightbox.min.js')?>"></script>
  <script src="<?= base_url('front/assets/vendor/isotope-layout/isotope.pkgd.min.js')?>"></script>
  <script src="<?= base_url('front/assets/vendor/php-email-form/validate.js')?>"></script>
  <script src="<?= base_url('front/assets/vendor/purecounter/purecounter.js')?>"></script>
  <script src="<?= base_url('front/assets/vendor/swiper/swiper-bundle.min.js')?>"></script>
  <script src="<?= base_url('front/assets/vendor/waypoints/noframework.waypoints.js')?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('front/assets/js/main.js')?>"></script>

</body>

</html>