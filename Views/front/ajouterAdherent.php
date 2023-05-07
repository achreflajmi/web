<?php
include '../../Controller/projet.php';
include_once '../../Model/user.php';
session_start();
$liste = null;
if (isset($_SESSION["res"])) {
  $userC = new userC();
  $liste = $userC->vérifierEmail($_SESSION["res"]);


}

ini_set("SMTP", "localhost");
ini_set("smtp_port", "465");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // récupérer les champs du formulaire
  $email = $liste['email'];

  // construction du message
  $message = "Bonjour,

  Merci de nous avoir fait part de votre réclamation, notre équipe vous répondra dans les plus brefs délais.";

  // envoi du mail
  $to = $email;
  $subject = "Réclamation";


  if (mail($to, $subject, $message)) {
    // afficher un message de confirmation

  } else {
    // afficher un message d'erreur
    echo "<p>Sorry, something went wrong. Please try again later.</p>";
  }
}
include_once '../../Model/Adherent.php';
include_once '../../Controller/AdherentC.php';

$error = "";

// create adherent
$reclamation = null;


// create an instance of the controller
$adherentC = new AdherentC();
if (
  isset($_POST["nom"]) &&
  isset($_POST["description"])
) {
  if (
    !empty($_POST['nom']) &&
    !empty($_POST["description"])
  ) {
    $reclamation = new reclamation(
      $_POST['id'],
      $_POST['nom'],
      $_POST['description'],
      $email = $liste['email']
    );
    echo $liste['id'];
    $adherentC->ajouteradherent($reclamation);
  } else
    $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

  <link rel="stylesheet" href="front/website-menu-03/fonts/icomoon/style.css">

  <link rel="stylesheet" href="front/website-menu-03/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="front/website-menu-03/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="front/website-menu-03/css/style.css">

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Distunis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./apple-touch-icon.png" rel="icon">
  <link href="apple-touch-icon.png" rel="apple-touch-icon">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="front/css/style.css">
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->

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

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <header class="site-navbar" role="banner">

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
              <li><a href="contact.html"><span>Reclamation</span></a></li>
              <a href="notification.php" class="notification">
                <span>Notifications</span>
                <span class="badge">0</span>
              </a>
            </ul>

          </nav>
        </div>


        <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#"
            class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

      </div>

    </div>
    </div>

  </header>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/main.js"></script>
  <section class="ftco-section">
    <div class="container1">
      <div class="row justify-content-center">

      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
          <div class="wrapper">
            <div class="row justify-content-center">

              <div class="col-lg-8">
                <div class="contact-wrap">
                  <h3 class="mb-4 text-center">Votre avis compte pour nous !</h3>
                  <div id="form-message-warning" class="mb-4 w-100 text-center"></div>
                  <div id="form-message-success" class="mb-4 w-100 text-center">
                    Your message was sent, thank you!
                  </div>
                  <form method="POST" id="contactForm" name="contactForm" class="contactForm"
                    action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="id" id="id" placeholder="id">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" class="form-control" name="nom" id="nom" placeholder="Objet"
                            onkeypress="return isEmpty()">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea name="description" class="form-control" id="description" cols="30" rows="8"
                            placeholder="Saisir votre Reclamation"></textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="submit" value="Envoyer" class="btn btn-primary">
                          <div class="submitting"></div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/main.js"></script>
  <script> function isEmpty() {
      var str = document.forms['myForm'].firstName.value;
      if (!str.replace(/\s+/, '').length) {
        alert("Le champ Name est vide!");
        return false;
      }
    }</script>

  <script>
    const form = document.querySelector('#contactForm');

    form.addEventListener('submit', function (event) {
      event.preventDefault();

      // Perform validation logic here
      const nom = form.elements.nom.value;
      const description = form.elements.description.value;

      if (nom === '') {
        // Change the CSS to indicate an error
        form.nom.style.backgroundColor = 'red';
      } else if (description === '') {
        form.description.style.backgroundColor = 'red';

      }
      else { form.submit(); }
    });
  </script>
</body>