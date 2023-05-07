<?php
session_start();

?>
<?php
include_once '../../Controller/projet.php';
include_once '../../Model/user.php';

$error = "";
$user = null;
$userC = new userC();

if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
    $filename = $_FILES['img']['name'];
    $target_file = 'C:/xampp/htdocs/integration/user/VIEWS/back/img/' . $filename;
    $file_extension = pathinfo(
        $target_file,
        PATHINFO_EXTENSION
    );
    $file_extension = strtolower($file_extension);
    $valid_extension = array("png", "jpeg", "jpg");
    if (in_array($file_extension, $valid_extension)) {
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
            $user = new user(
                $_POST['uname'],
                $_POST['email'],
                $_POST['pswd'],
                $_POST['dateN'],
                $filename
            );
            $email = $_POST['email'];
            $res = $userC->vérifierEmail($email);
            if ($res == null) {
                $userC->AddUser($user);
            } else {
                echo 'Lemail existe déjà';
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="icon" type="image/png" href="./apple-touch-icon.png" />
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data"
                        onsubmit="return validateForm();">
                        <h2 class="form-title">Créer votre compte </h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="uname" id="uname"
                                onkeypress="return isLetterKey(event)" placeholder="Nom d'utilisateur " required />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Votre Email"
                                required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="pswd" id="pswd" placeholder="Mot de passe"
                                required />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password"
                                placeholder="Répétez votre mot de passe" required />
                        </div>
                        <div class="form-group">
                            <label for="agree-ter" class="form-input">Date De Naissance</label>
                            <input type="date" name="dateN" id="dateN" class="agree-term" required />

                        </div>

                        <div class="form-group">
                            <label for="agree-term" class="form-input">Votre Image </label>
                            <input type="file" class="email-bt" name="img" id="img" value=""><br><br>

                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit"
                                value="CRÉER VOTRE COMPTE" />
                        </div>
                    </form>
                    <p class="loginhere">
                        Vous avez déjà un compte ?<a href="login.php" class="loginhere-link">se connecter</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/lesjssingup.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>