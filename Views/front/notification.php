<!DOCTYPE html>
<html lang="en">
<?php
include_once '../../Controller/reponseC.php';
include_once '../../Model/reponse.php';

// database configuration
$dsn = 'mysql:host=localhost;dbname=web;charset=utf8mb4';
$username = 'root';
$password = '';

try {
  // create a new PDO instance
  $pdo = new PDO($dsn, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // retrieve data from the "reponse" table
  $stmt = $pdo->query('SELECT id ,texte FROM reponse');
  $reponses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  // handle database connection errors
  echo 'Connection failed: ' . $e->getMessage();
}
?>




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
    background-image: url('hero-bg.png');
    background-size: cover;
    background-position: center;
  }

  table {
    border-collapse: collapse;
    border: 1px solid #fff;
    color: black;
    font-family: Arial, sans-serif;
    font-size: 14px;
    width: 100%;
  }

  th,
  td {
    padding: 50px;
    text-align: left;
    background-color: rgba(255, 255, 255, 0.4);

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
              <div class="row justify-content-center">
                <table c>
                  <thead>
                    <tr>
                      <th>Reclamation num°:</th>

                      <th>Reponse</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($reponses as $reponse): ?>
                      <tr>
                        <td>
                          <?= $reponse['id'] ?>
                        </td>
                        <td>
                          <?= $reponse['texte'] ?>
                        </td>

                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
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

</body>