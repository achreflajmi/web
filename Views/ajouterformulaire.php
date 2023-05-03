<?php
    include_once '../Model/formulaire.php';
    include_once '../Controller/formulaireC.php';

    $error = "";

    // create form
    $formulaire = null;

    // create an instance of the controller
$formulaireC = new formulaireC();
    if (
		isset($_POST["host"]) &&		
        isset($_POST["nomEvent"]) &&
		isset($_POST["date_d"])
    &&		  isset($_POST["date_f"])
        &&	      isset($_POST["lieu"])
        &&	       isset($_POST["categorie"])
        &&		
        isset($_POST["programmation"])
        &&		
        isset($_POST["description"])
        &&		
        
        isset($_POST["affiche"])
        &&		
        isset($_POST["numTel"])

        &&		
        isset($_POST["email"])
        &&		
        isset($_POST["prix"])
    
    ) {
        if (
			!empty($_POST['host']) &&
            !empty($_POST["nomEvent"]) && 
			!empty($_POST["date_d"])
      && 
			!empty($_POST["date_f"])  && 
			!empty($_POST["lieu"])  && 
			!empty($_POST["categorie"])  &&
			!empty($_POST["programmation"])  &&
			!empty($_POST["description"])   && 
			!empty($_POST["affiche"])  && 
			!empty($_POST["numTel"])    && 
			!empty($_POST["email"])&& 
			!empty($_POST["prix"])
        ) {
            $formulaire = new formulaire(
				$_POST['host'],
                $_POST['nomEvent'], 
				$_POST['date_d'],
        $_POST['date_f'],
        $_POST['lieu'],
        $_POST['categorie'],
        $_POST['programmation'],
        $_POST['description'],
        $_POST['affiche'],
        $_POST['numTel'],
        $_POST['email'],
        $_POST['prix']

            );
            $formulaireC->Addform($formulaire);
            header('Location:captcha.html');
        }
        else
            $error = "Missing information";
    }

?>

<!DOCTYPE HTML>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Formulaire d'ajout | DISTUNIS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">
  <link rel="stylesheet" href="css/fancybox.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">
  <style>
  .error {
    background-color: rgba(255, 0, 0, 0.1);
    padding: 5px;
    border: 1px solid rgba(255, 0, 0, 0.3);
    border-radius: 5px;
    font-weight: bold;
    color: white;
    margin-top: 10px;
  }

  .error-icon {
    margin-right: 5px;
    color: red;
  }

  .error-input {
    border: 1px solid red;
  }
</style>

</head>

<body>

  <header class="site-header js-site-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.php">
            <img src="logo.png" class="logo-smaller">
          </a></div>
        <div class="col-6 col-lg-8">


          <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <!-- END menu-toggle -->

          <div class="site-navbar js-site-navbar">
            <nav role="navigation">
              <div class="container">
                <div class="row full-height align-items-center">
                  <div class="col-md-6 mx-auto">
                    <ul class="list-unstyled menu">
                      <li><a href="index.php">Home</a></li>
                      <li><a href="Events.php">Evenements</a></li>
                      <li class="active"><a href="formulaire.php">Formulaire d'ajout d'un événement</a></li>

                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- END head -->

  <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)"
    data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-10 text-center" data-aos="fade">
          <h1 class="heading mb-3">Formulaire d'ajout</h1>
          <ul class="custom-breadcrumbs mb-4">
            <li><a href="index.php">Home</a></li>
            <li>&bullet;</li>
            <li>Formulaire d'ajout</li>
          </ul>
        </div>
      </div>
    </div>

    <a class="mouse smoothscroll" href="#next">
      <div class="mouse-icon">
        <span class="mouse-wheel"></span>
      </div>
    </a>
  </section>
  <!-- END section -->

  <section class="section contact-section" id="next">
    <div class="container">
      <div class="row">
        <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            <div class="col-md-12">
              <form  method="post" id="myForm" class="bg-white p-md-5 p-4 mb-5 border" onsubmit="return validateForm()">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="host">Host</label>
                    <input type="text" id="host" name="host" class="form-control" >
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="nomEvent">Nom de l'evenement</label>
                    <input type="text" id="nomEvent" name="nomEvent" class="form-control" >
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="date_d">Date de début l'evenement</label>
                    <input type="datetime-local" id="date_d" name="date_d" class="form-control" >
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="date_f">Date de fin l'evenement</label>
                    <input type="datetime-local" id="date_f" name="date_f" class="form-control" >
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="lieu">Lieu exacte</label>
                    <input type="text" id="lieu" name="lieu" class="form-control" >
                  </div>
                  <div class="row">
                  <div class="col-md-6 form-group">
                    <label for="Categorie" class="font-weight-bold text-black">Catégorie</label>
                    <div class="field-icon-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="categorie" id="categorie" class="form-control" >
                        <option value="Théatre">Théatre</option>
                        <option value="Musique">Musique</option>
                        <option value="Cinéma">Cinéma</option>
                        <option value="Camping">Camping</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="programmation">Programmation</label>
                    <textarea name="programmation" id="programmation" class="form-control" cols="30" rows="8" ></textarea>
                  </div>

                  <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="8" ></textarea>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-6 form-group">
                      <label class="text-black font-weight-bold" for="affiche">Affiche de l'evenement</label>
                      <input type="file" name="affiche" id="affiche" class="form-control-file" >
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="numTel">Numéro de téléphone</label>
                    <input type="text" id="numTel" name="numTel" class="form-control" >
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label class="text-black font-weight-bold" for="email">Email du Host</label>
                    <input type="email" id="email" name="email" class="form-control" >
                    <small id="emailHelp" class="form-text text-muted" >We'll never share your email with anyone else.</small>
                  </div>
                </div>

                  <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="prix">Prix de l'evenement</label>
                    <input type="text" id="prix" name="prix" class="form-control" >
                  </div>
 


                  <div class="row">
                    <div class="col-md-12 form-group">
                      <input type="submit" value="Ajouter l'événement" name="submit"
                        class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                    </div>
                  </div>
                  <div id="myModal" class="modal">


                 </form>
                 <script>

const form = document.getElementById('myForm');

function validateForm(event) {
  // prevent form submission
  event.preventDefault();

  // get form input elements
  const hostInput = document.querySelector('#host');
  const nomEventInput = document.getElementById('nomEvent');
  const date_dInput = document.getElementById('date_d');
  const date_fInput = document.querySelector('#date_f');
  const lieuInput = document.querySelector('#lieu');
  const categorieInput = document.querySelector('#Categorie');
  const programmationInput = document.querySelector('#programmation');
  const descriptionInput = document.querySelector('#description');
  const afficheInput = document.querySelector('#affiche');
  const numTelInput = document.querySelector('#numTel');
  const emailInput = document.querySelector('#email');
  const prixInput = document.querySelector('#prix');

  // perform validation on form input elements
  let errors = [];
  if (hostInput.value.trim() === '') {
      errors.push('Le champ "Hôte" est obligatoire.');
    }
  if (nomEventInput.value.trim() === '') {
    errors.push({input: nomEventInput, message: 'Le champ "Nom de l\'événement" est obligatoire.'});
  }
  if (date_dInput.value.trim() === '') {
    errors.push({input: date_dInput, message: 'Le champ "Date de début" est obligatoire.'});
  }
  if (date_fInput.value.trim() === '') {
      errors.push('Le champ "Date de fin" est obligatoire.');
    }
  
    if (lieuInput.value.trim() === '') {
      errors.push('Le champ "Lieu" est obligatoire.');
    }
    if (programmationInput.value.trim() === '') {
      errors.push('Le champ "Programmation" est obligatoire.');
    }
  
    if (descriptionInput.value.trim() === '') {
      errors.push('Le champ "Description" est obligatoire.');
    }
  
    if (afficheInput.value.trim() === '') {
      errors.push('Le champ "Affiche" est obligatoire.');
    }
  if (numTelInput.value.trim() === '') {
    errors.push({input: numTelInput, message: 'Le champ "Numéro de téléphone" est obligatoire.'});
  } else if (!/^[0-9]{8}$/.test(numTelInput.value)) {
    errors.push({input: numTelInput, message: 'Veuillez entrer un numéro de téléphone valide (8 chiffres)'});
  }

  if (emailInput.value.trim() === '') {
    errors.push({input: emailInput, message: 'Le champ "Email" est obligatoire.'});
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
    errors.push({input: emailInput, message: 'Veuillez entrer une adresse email valide'});
  }

  if (prixInput.value.trim() === '') {
    errors.push({input: prixInput, message: 'Le champ "Prix" est obligatoire.'});
  } else if (isNaN(prixInput.value)) {
    errors.push({input: prixInput, message: 'Le prix doit être un nombre.'});
  }

  // remove any existing errors
  const errorElements = document.querySelectorAll('.error');
  errorElements.forEach(errorElement => errorElement.remove());

  if (errors.length > 0) {
    // loop through errors and display them below the input field
    errors.forEach(error => {
      const errorElement = document.createElement('div');
      const errorIcon = document.createElement('i');
      errorElement.classList.add('error'); // add a class for styling purposes
      errorElement.textContent = error.message;
      errorElement.style.color = 'black';
      errorIcon.classList.add('fas', 'fa-exclamation-triangle', 'error-icon'); // add an error icon
      error.input.classList.add('error-input'); // add a class to the input field for styling purposes
      error.input.parentElement.insertBefore(errorElement, error.input.nextElementSibling);
      error.input.parentElement.insertBefore(errorIcon, error.input.nextElementSibling);
    });
  } else {
    // submit form if validation passes
    form.submit();
  }
}


// add submit event listener to form element
form.addEventListener('submit', validateForm);

</script>
                  </section>

  </div>
  <div class="col-md-10 ml-auto contact-info" data-aos="fade-up" data-aos-delay="200">
    <div class="row">
      <div class="col-md-24">
        <p><span class="d-block">Addresse:</span> <span class="text-black">Ghazela, Ariana</span></p>
        <p><span class="d-block">Numéro de téléphone:</span> <span class="text-black">54268300</span></p>
        <p><span class="d-block">Email:</span> <span class="text-black">info@Distunis.com</span></p>
      </div>
    </div>
  </div>
  </div>


  <section class="section testimonial-section bg-light">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7">
          <h2 class="heading" data-aos="fade-up">People Says</h2>
        </div>
      </div>
      <div class="row">
        <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">

          <div class="testimonial text-center slider-item">
            <div class="author-image mb-3">
              <img src="images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
            </div>
            <blockquote>

              <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
            </blockquote>
            <p><em>&mdash; Jean Smith</em></p>
          </div>

          <div class="testimonial text-center slider-item">
            <div class="author-image mb-3">
              <img src="images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
            </div>
            <blockquote>
              <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to
                leave for the far World of Grammar.&rdquo;</p>
            </blockquote>
            <p><em>&mdash; John Doe</em></p>
          </div>

          <div class="testimonial text-center slider-item">
            <div class="author-image mb-3">
              <img src="images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
            </div>
            <blockquote>

              <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the
                skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own
                road, the Line Lane.&rdquo;</p>
            </blockquote>
            <p><em>&mdash; John Doe</em></p>
          </div>


          <div class="testimonial text-center slider-item">
            <div class="author-image mb-3">
              <img src="images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
            </div>
            <blockquote>

              <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
            </blockquote>
            <p><em>&mdash; Jean Smith</em></p>
          </div>

          <div class="testimonial text-center slider-item">
            <div class="author-image mb-3">
              <img src="images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
            </div>
            <blockquote>
              <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to
                leave for the far World of Grammar.&rdquo;</p>
            </blockquote>
            <p><em>&mdash; John Doe</em></p>
          </div>

          <div class="testimonial text-center slider-item">
            <div class="author-image mb-3">
              <img src="images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
            </div>
            <blockquote>

              <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the
                skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own
                road, the Line Lane.&rdquo;</p>
            </blockquote>
            <p><em>&mdash; John Doe</em></p>
          </div>

        </div>
        <!-- END slider -->
      </div>

    </div>
  </section>



  <section class="section bg-image overlay" style="background-image: url('images/hero_4.jpg');">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
          <h2 class="text-white font-weight-bold">A Best Place To Stay. Reserve Now!</h2>
        </div>
        <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
          <a href="formulaire.php" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
        </div>
      </div>
    </div>
  </section>

  <footer class="section footer-section">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-3 mb-5">
          <ul class="list-unstyled link">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-5">
          <ul class="list-unstyled link">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-5 pr-md-5 contact-info">
          <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
          <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 198
              West 21th Street, <br> Suite 721 New York NY 10016</span></p>
          <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+1)
              435 3533</span></p>
          <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span>
              info@domain.com</span></p>
        </div>
        <div class="col-md-3 mb-5">
          <p>Sign up for our newsletter</p>
          <form action="#" class="footer-newsletter">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email...">
              <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
            </div>
          </form>
        </div>
      </div>
      <div class="row pt-5">
        <p class="col-md-6 text-left">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;
          <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i
            class="icon-heart-o" aria-hidden="true"></i> by <a href="index.php" target="_blank">Distunis</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>

        <p class="col-md-6 text-right social">
          <a href="#"><span class="fa fa-tripadvisor"></span></a>
          <a href="#"><span class="fa fa-facebook"></span></a>
          <a href="#"><span class="fa fa-twitter"></span></a>
          <a href="#"><span class="fa fa-linkedin"></span></a>
          <a href="#"><span class="fa fa-vimeo"></span></a>
        </p>
      </div>
    </div>
  </footer>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>


  <script src="js/aos.js"></script>

  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>


  <script src="js/main.js"></script>
</body>

</html>