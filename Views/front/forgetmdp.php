<?php
session_start();
?>
<?php
include 'C:\xampp\htdocs\project\Controller\projet.php';

require_once("C:/xampp\htdocs\project\PHPMailer-master\src\PHPMailer.php");
require("C:/xampp\htdocs\project\PHPMailer-master\src\SMTP.php");
require("C:/xampp\htdocs\project\PHPMailer-master\src\Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>

<!doctype html>
<html lang="zxx">

<head> 
<link href="./apple-touch-icon.png" rel="icon">
  <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>pillloMart</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!--::header part start::-->
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
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

         <?php
                                if (isset($_SESSION["res"])) { 
                                  $userC = new userC(); 
                         $liste = $userC->vérifierEmail($_SESSION["res"]);
                                   ?>
                    
                                         <a href="logout.php" class="book-a-table-btn scrollto d-none d-lg-flex"> 
                                              <?php
                                 echo ($liste["uname"]);                                   
?>
</a>
</li>
                                <?php
                            } else {
                                ?>
                                    <a href="login.php"
        class="book-a-table-btn scrollto d-none d-lg-flex">login</a></li>
                                <?php  } ?>



    </div>
  </header><!-- End Header -->
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>reset password</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                           
                            
                        </div>
                    </div>
                </div>
                
                <form class="row contact_form" action="" method="post" >
                                <div class="col-md-12 form-group p_star">
                            
                                    <input type="text" class="form-control" id="email" name="email" 
                                        placeholder="email">
                                </div>
                            
                                <div class="col-md-12 form-group">
                                  
                                    <button type="submit" value="submit"  name="submit" class="btn_3">obtenir le code de verification                                    </button>
                                 
                                </div>
                                </li>
                            </form>
                              

                               
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php

if (isset($_POST['email'])) {
    $db = config::getConnexion();
    $mail =new PHPMailer(true);
    $token = uniqid();
    $url="http://localhost/project/VIEWS/front/token.php?token=$token" ;
   /* ini_set('sendmail_path', "\"C:\xampp\sendmail\sendmail.exe\" -t");
    ini_set('SMTP','smtp.gmail.com');
    ini_set('smtp_port', 2525);
    ini_set('smtp_ssl', 'auto');
    ini_set('auth_username','aissa.swiden@esprit.tn');
    ini_set('auth_password','201JMT1854');*/
    $mail1 ='abdelkarim.arouchi@esprit.tn';
    $subject = 'Mot de passe oublié';
    $message = "Bonjour, voici votre lien de reinitialisation : $url";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From:" . $mail1 . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

   // $mail->SMTPDebug = 4;
    $mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP 
    $mail->CharSet="UTF-8";

   // $mail->isSendmail();;
    $mail->Host = 'smtp.gmail.com'; // Spécifier le serveur SMTP
    $mail->SMTPAuth = true; // Activer authentication SMTP
    $mail->SMTPOptions = array(
        'ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>true,
        )
        );
        $mail->SMTPSecure = 'tls'; // Accepter SSL
        $mail->Port = 587;

    $mail->Username = 'abdelkarim.arouchi@esprit.tn'; // Votre adresse email d'envoi
    $mail->Password = '211JMT2854'; // Le mot de passe de cette adresse email
    $mail->addAddress($_POST['email']); 
    
  
    
   
$mail->Subject ='Mot de passe oublié';
$mail->Body ="Bonjour, voici votre lien de reinitialisation : $url";
$mail->isHTML(true);

$mail->smtpConnect();
//mail($_POST['mail'], $subject, $message, $headers )
$userC = new userC(); 
$verifmail=NULL;
$verifmail=$userC->vérifierEmail($_POST['email']);
if ($verifmail!=NULL){
    if ($mail->Send()) {
        $stmt = $db->prepare("UPDATE user SET token = ? WHERE email = ?");
        $stmt->execute([$token, $_POST['email']]);
        echo "E-mail envoyé";
    } else {
        echo "Une erreur est survenue";
    }
}else {
    echo 'mail nexiste pas ';
}}
?>

    <!--================login_part end =================-->

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="footer_iner section_bg">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-8">
                        <div class="footer_menu">
                            <div class="footer_logo">
                                
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="social_icon">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="copyright_part">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="copyright_text">
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/mixitup.min.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>
    
</html>