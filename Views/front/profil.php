<?php
include '../../Controller/projet.php';
include_once '../../Model/user.php';
session_start();

$liste = null;
if (isset($_SESSION["res"])) {
  $userC = new userC();
  $liste = $userC->vérifierEmail($_SESSION["res"]);

  $uname = $liste['uname'];
  $email = $liste['email'];

  $dateN = $liste['dateN'];
  $image = $liste['image'];

}


if (isset($_POST['modifier'])) {
  $test = null;





  $id = $liste['id'];
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $npswd = password_hash($_POST['npswd'], PASSWORD_DEFAULT);
  ;
  $dateN = $_POST['dateN'];
  $image = $liste['image'];
  $user = new user($uname, $email, $npswd, $dateN, $image);

  $userC = new userC();
  $userC->modifieruser($user, $id);

  header('Location: frontstatique.php');





  var_dump($karim);
}
ob_end_flush();

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Distunis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./apple-touch-icon.png" rel="icon">
  <link href="apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Restaurantly - v3.10.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

  <link rel="stylesheet" href="front/website-menu-03/fonts/icomoon/style.css">

  <link rel="stylesheet" href="front/website-menu-03/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="front/website-menu-03/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="front/website-menu-03/css/style.css">
</head>
<style>
  body {
    width: 100%;
    height: 100vh;
    background: url("bg.png") top center;
    background-size: cover;
    position: relative;
    padding: 0;
  }
</style>

<body>

  <!-- ======= Top Bar ======= -->


  <?php
  $liste = null;
  if (isset($_SESSION["res"])) {
    $userC = new userC();
    $liste = $userC->vérifierEmail($_SESSION["res"]);
    echo '<header class="site-navbar" role="banner">

                <div class="container">
                
                  <div class="row align-items-center">
                
                    <div class="col-11 col-xl-2">
                      <h1 class="mb-0 site-logo"><a href="index.html" class="text-white mb-0">Distunis</a></h1>
                    </div>
                    <div class="col-12 col-md-10 d-none d-xl-block">
                      <nav class="site-navigation position-relative text-right" role="navigation">
                
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li><a href="http://localhost/integration/user/Views/front/frontstatique.php"><span>Mon compte</span></a>
                        </li>
                        <li><a href="about.html"><span>Events</span></a></li>
                        <li><a href="./profil.php"><span>Sécurité</span></a></li>
                        <li><a href="ajouterAdherent.php"><span>Reclamation</span></a></li>
                        <a href="notification.php" class="notification">
                          <span>Notifications</span>
                          <span class="badge">0</span>
                        </a>
                      '
      ?>
    <li>
      <a href="logout.php" class="log">
        <?php

        echo 'logout';
        ?>
      </a>
    </li>
    </ul>
    </nav>
    </div>


    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#"
        class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

    </div>

    </div>


    </header>
    <?php

  } else {
    echo ' 

    <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <img src="./logo.png" class="logo">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Acceuil</a></li>
          <li><a class="nav-link scrollto" href="#about">A propos de nous</a></li>
          <li><a class="nav-link scrollto" href="#menu">Evenements</a></li>
          <li><a class="nav-link scrollto" href="#events">Excursions</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallerie</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        
          
        <!-- End Header -->'
      ?>

    <a href="login.php" class="book-a-table-btn scrollto d-none d-lg-flex">login</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    </div>
    </header>
  <?php } ?>



  <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#"
      class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

  </div>

  </div>


  </header>
  <!-- ======= Hero Section ======= -->



  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>profile</h2>

      </div>
    </div>



    <div class="container" data-aos="fade-up">

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <?php if ($liste != null) { ?>
              <div class="address">
                <img class="imgprofil" src="../back/img/<?php echo $liste['image']; ?>"
                  alt="Image de profil de l'utilisateur"
                  style="border-radius: 50%;  width: 300px;   height: 300px;object-fit: cover;   object-position: center; ">
              </div>
            <?php } else { ?>

              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Emplacement:</h4>
                <p>Tunis,Rue habib bourguiba 535022</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Disponibilité:</h4>
                <p>
                  24/24 7/7
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>Distunis.tn@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Téléphone:</h4>
                <p>+216 56 265 123</p>
              </div>




            <?php } ?>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          <form method="post" role="form" class="">

            <div class="row">
              <div class="col-md-6 form-group">
                <input value=" <?PHP echo $uname ?>" type="text" name="uname" class="form-control" id="uname"
                  placeholder="Name" required></textarea>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input value=" <?PHP echo $email ?>" type="email" class="form-control" name="email" id="email"
                  placeholder="Email" required></textarea>
              </div>
            </div>

            <div class="form-group mt-3">
              <input type="text" class="form-control" name="npswd" rows="8" placeholder="Nouveau mot de passe"
                required></textarea>
            </div>
            <div class="form-group mt-3">
              <input value=" <?PHP echo $dateN ?> " type="text" class="form-control" name="dateN" rows="8"
                placeholder="Date nes" required></textarea>
            </div>
            <div class="form-group mt-3">
              <input type="file" class="form-control" name="image" rows="8" placeholder="Image de profil"
                required></textarea>
            </div>

            <div class="text-center">
              <input type="submit" name="modifier" value="modifier">
            </div>
          </form>



        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>DisTunis</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="">
              <input type="email" name="emailjjjjjhjj"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>DisTunis</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>