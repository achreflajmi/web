<?php
include_once '../../Model/reponse.php';
include_once '../../Controller/reponseC.php';

$error = "";

// create adherent
$reponse = null;

// create an instance of the controller
$reponseC = new reponseC();
if (
  isset($_POST["id"]) &&
  isset($_POST["texte"]) &&
  isset($_POST["id_reclamation"])
) {
  if (
    !empty($_POST["id"]) &&
    !empty($_POST['texte']) &&
    !empty($_POST["id_reclamation"])

  ) {
    $reponse = new reponse(
      $_POST['id'],
      $_POST['texte'],
      $_POST['id_reclamation']

    );
    $reponseC->modifierreponse($reponse, $_POST["id"]);
    header('Location:gestionreclamation.php');
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

<body>

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>


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
                  <?php
                  if (isset($_POST['id'])) {
                    $reponse = $reponseC->recupererreponse($_POST['id']);
                  }
                  ?>

                  <form action="" method="POST">

                    <input type="hidden" name="id" id="id" value="<?php echo $reponse['id']; ?>" maxlength="20">


                    <input type="text" name="texte" id="contenu" value="<?php echo $reponse['texte']; ?>"
                      maxlength="20">
                    <input type="hidden" name="id_reclamation" id="idpost"
                      value="<?php echo $reponse['id_reclamation']; ?>" maxlength="20">

                    <input type="submit" value="Modifier">


                    <input type="reset" value="Annuler">

                    </tr>
                    </table>
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