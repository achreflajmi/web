<?php
include '../Model/formulaire.php';
include '../Controller/formulaireC.php';
$pdo = new PDO('mysql:host=localhost;dbname=events', 'root', '');
$limit = 6;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$stmt_count = $pdo->prepare("SELECT COUNT(*) AS num_rows FROM formulaire");
$stmt_count->execute();
$num_rows = $stmt_count->fetch(PDO::FETCH_ASSOC)['num_rows'];
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Evenements</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-6JvBzWGwK6tJ0lPfQTlsHvXG0cOS6gugJnKud+bNvNpqDz7z8bJOTmwV2cKkH/9ah+8/QdPxKjJ7Etan/dy3Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">
  <link rel="stylesheet" href="css/fancybox.min.css">
  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">
  <style>
 /* Pagination style */
.pagination {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 20px 0;
  font-size: 16px;
  background-color: #cda45e;
  border-radius: 4px;
  padding: 10px;
}

/* Pagination link style */
.pagination a {
  color: #555;
  text-decoration: none;
  padding: 8px 16px;
  margin: 0 4px;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

/* Active pagination link style */
.pagination a.active {
  background-color: #2196F3;
  color: white;
}

/* Disabled pagination link style */
.pagination a.disabled {
  color: #aaa;
  pointer-events: none;
}

/* Pagination link hover style */
.pagination a:hover:not(.active) {
  background-color: #ddd;
}

.btn.btn-outline-white-primary {
  background-color: #cda45e;
  color: black;
  border-color: #cda45e;
  font-weight: bold;
}

.btn.btn-outline-white-primary:hover {
  background-color: #B99976 ;
  color: #000;
  font-weight: bold;
  transition: all 0.2s ease;
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
          <div class="site-navbar js-site-navbar">
            <nav role="navigation">
              <div class="container">
                <div class="row full-height align-items-center">
                  <div class="col-md-6 mx-auto">
                    <ul class="list-unstyled menu">
                      <li><a href="index.php">Home</a></li>
                      <li class="active"><a href="events.php">Events</a></li>
                      <li><a href="ajouterformulaire.php">Formulaire d'ajout d'un événement</a></li>
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
  <section class="site-hero inner-page overlay" style="background-image: url(./crowd.jpg);"
    data-stellar-background-ratio="1.5">
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-10 text-center" data-aos="fade">
          <h1 class="heading mb-3">Events</h1>
          <ul class="custom-breadcrumbs mb-4">
            <li><a href="index.php">Home</a></li>
            <li>&bullet;</li>
            <li>Events</li>
          </ul>
        </div>
      </div>
    </div>
    <a class="mouse smoothscroll" href="#next">
      <div class="mouse-icon">
        <span class="mouse-wheel"></span>
      </div>
    </a>
    <section class="section blog-post-entry bg-light" id="next">
      <div class="container">
        <div class="row">
          <?php
          $start = 0;
          $per_page = 6;
          $page = isset($_GET['page']) ? $_GET['page'] : 1;
          $start = ($page - 1) * $per_page;
          // Connect to your database using PDO.
          $dsn = 'mysql:host=localhost;dbname=events;charset=utf8mb4';
          $username = 'root';
          $password = '';
          $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
          );
          try {
            $pdo = new PDO($dsn, $username, $password, $options);
          } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
          }
          // Your database query here with LIMIT and OFFSET using $start and $per_page variables.
          $sql = "SELECT f.*, p.nvPrix 
        FROM `events`.`formulaire` f
        INNER JOIN `events`.`price` p ON f.id = p.formulaire_id
        LIMIT :start, :per_page";
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':start', $start, PDO::PARAM_INT);
          $stmt->bindParam(':per_page', $per_page, PDO::PARAM_INT);
          $stmt->execute();
          $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
          // Get the total number of events from your database.
          $sql = "SELECT COUNT(*) as count FROM formulaire";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          $total_events = $result['count'];
          // Calculate the total number of pages.
          $total_pages = ceil($total_events / $per_page);
          // Pagination links.
          if ($total_pages > 1): ?>
            <div id="app" class="container">
              <ul class="pagination">
                <li class="pagination-previous<?= ($page == 1) ? ' is-disabled' : '' ?>">
                  <a href="<?= ($page > 1) ? '?page=' . ($page - 1) : '' ?>">
                    <span class="icon">
                      <i class="fa-regular fa-angles-right fa-2xs" style="color: #cda45e;"></i>
                    </span>
                    <span class="text">
                      <?= ($page > 1) ? 'Previous' : '' ?>
                    </span>
                  </a>
                </li>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                  <?php if ($page == $i): ?>
                    <li class="pagination-number active">
                      <span>
                        <?= $i ?>
                      </span>
                    </li>
                  <?php elseif (abs($page - $i) <= 2): ?>
                    <li class="pagination-number">
                      <a href="?page=<?= $i ?>">
                        <span>
                          <?= $i ?>
                        </span>
                      </a>
                    </li>
                  <?php elseif ($i == 1 || $i == $total_pages): ?>
                    <li class="pagination-number">
                      <a href="?page=<?= $i ?>">
                        <span>
                          <?= $i ?>
                        </span>
                      </a>
                    </li>
                  <?php elseif (abs($page - $i) == 3): ?>
                    <li class="pagination-ellipsis">
                      <span>...</span>
                    </li>
                  <?php endif; ?>
                <?php endfor; ?>
                <li class="pagination-next<?= ($page == $total_pages) ? ' is-disabled' : '' ?>">
                  <a href="<?= ($page < $total_pages) ? '?page=' . ($page + 1) : '' ?>">
                    <span class="text">
                      <?= ($page < $total_pages) ? 'Next' : '' ?>
                    </span>
                    <span class="icon">
                      <i class="fa-regular fa-angles-left fa-2xs" style="color: #cda45e;"></i>
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          <?php endif;
          foreach ($events as $event) {
            $sql = "SELECT f.*, p.nvPrix 
        FROM `events`.`formulaire` f
        INNER JOIN `events`.`price` p ON f.id = p.formulaire_id";
            $stmt = $pdo->query($sql);
            $id = $event['id'];
            $host = $event['host'];
            $nomEvent = $event['nomEvent'];
            $date_d = $event['date_d'];
            $date_f = $event['date_f'];
            $lieu = $event['lieu'];
            $categorie = $event['categorie'];
            $description = $event['description'];
            $affiche = $event['affiche'];
            $prix = $event['prix'];
            $row['nvPrix'] = $event['nvPrix'];
            echo '
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="100">
  <div class="media media-custom d-block mb-4 h-100">
    <a href="#" class="mb-4 d-block"><img src="' . $affiche . '" alt="Image placeholder" class="img-fluid"></a>
    <div class="media-body">
      <span class="meta-post">' . $date_d . ' </span>
      <br>
      <span class="meta-post">' . $date_f . '</span>
      <br>
      <a href="reservation.php" class="price-text">' . $row['nvPrix'] . ' TND</a>
      <h2 class="mt-0 mb-3"><a href="#">' . $nomEvent . '</a></h2>
      <span class="badge badge-primary">' . $categorie . '</span>
      <div class="HeaderContent__BreadcrumbWrapper-cj90ax-0 cpwmvU">
        <nav aria-label="Breadcrumb">
          <ul class="Box-omzyfs-0 Alignment-sc-1fjm9oq-0 fAyvMa">
            <li class="Box-omzyfs-0 Alignment-sc-1fjm9oq-0 jQalas">
              <svg viewBox="0 0 24 24" name="TN" width="16" height="16">
                <circle fill="#D80027" cx="12" cy="12" r="12"></circle>
                <circle fill="#F0F0F0" cx="12" cy="12" r="5.739"></circle>
                <path
                  d="M12.707 9.806l.985 1.356 1.594-.517-.986 1.356.984 1.357-1.594-.52-.986 1.356.001-1.676L11.111 12l1.595-.517z"
                  fill="#D80027"></path>
                <path
                  d="M13.304 15.391a3.391 3.391 0 111.614-6.375 4.174 4.174 0 100 5.967c-.48.26-1.03.408-1.614.408z"
                  fill="#D80027"></path>
              </svg>
              <a href="#" class="Link__StyledLink-k7o46r-0 dxNiKF Breadcrumb__StyledLink-fnbmus-0 heeKjO" color="primary">' . $lieu . '</a>
            </li>
            <li class="Box-omzyfs-0 Alignment-sc-1fjm9oq-0 jQalas">
              <svg width="16" height="16" viewBox="0 0 10 10" aria-label="Circle">
                <circle cx="50%" cy="50%" r="5" fill="currentColor"></circle>
              </svg>
              <a href="#" class="Link__StyledLink-k7o46r-0 dxNiKF Breadcrumb__StyledLink-fnbmus-0 heeKjO" color="primary">' . $host . '</a>
            </li>
          </ul>
        </nav>
      </div>
      <p>' . $description . '</p>
      <p><a href="reservation.php" class="btn btn-third">Réserver</a></p>
    </div>
  </div>
</div>
';
          }
          ?>
        </div>
    </section>
    <section class="section bg-image overlay" style="background-image: url('images/hero_4.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
            <h2 class="text-white font-weight-bold">A Best Place To Avoid Reality. Reserve Now!</h2>
          </div>
          <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
            <a href="ajouterformulaire.php" class="btn btn-primary py-3 text-white px-5">Ajouter un
              événement</a>
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
              <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">The Rooms &amp; Suites</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Restaurant</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span>
                198 West 21th Street, <br> Suite 721 New York NY 10016</span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span>
                (+1) 435 3533</span></p>
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
            <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with
            <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
              target="_blank">Colorlib</a>
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