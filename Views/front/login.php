<?php
session_start();

?>
<?php
    include '../../Controller/projet.php';
	include_once '../../Model/user.php';

	 
// Google reCAPTCHA API keys settings 
$secretKey  = '6Lep-6slAAAAADE5NgHx2I4U4S9UrTDL9ajGn7-H'; 
 
// Email settings 
$recipientEmail = 'karimarouchi123@gmail.com'; 
 
	$userC = new userC();
    if(isset($_POST['email']) && isset($_POST['pswd'])) {
        $email = $_POST['email'];
        $pswd = $_POST['pswd'];
        // Vérifier si l'utilisateur existe dans la base de données
		$res=$userC->login($email,$pswd);
		$verif=password_verify($res['pswd'], $pswd );
		
        if ($res == null && $verif== null) {
			$messageerr="Email ou mot de passe incorrect";
			
			
		}
		else {
			// If the form is submitted 
$postData = $statusMsg = ''; 
$status = 'error'; 
$postData = $_POST; 
			if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
 
				// Verify the reCAPTCHA API response 
				$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
				 
				// Decode JSON data of API response 
				$responseData = json_decode($verifyResponse); 
				 
				// If the reCAPTCHA API response is valid 
				if($responseData->success){ 
					
			$_SESSION["res"] = $_POST['email'];
			$status = 'success'; 
					$statusMsg = 'Thank you! Your contact request has been submitted successfully.'; 
					$postData = ''; 
			// Check the user's role
			$role = $res['role'];
			if($role == 1) {
				header("Location: frontstatique.php");
			} else if($role == 2) {
				header("Location: ../back/back.php");
			}
			if (isset($_SESSION["res"]))
			{
			var_dump($_SESSION["res"]);
			echo $_SESSION["res"]; 
		    }
		}
		else{
			$statusMsg = 'Please check the reCAPTCHA checkbox.'; 
		}
		   
			}
			
		}}
		

?>

<!DOCTYPE html>

<html lang="en">

<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="./apple-touch-icon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="csslogin/util.css">
	<link rel="stylesheet" type="text/css" href="csslogin/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="./apple-touch-icon.png" alt="IMG">
				</div>

				<form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
					<span class="login100-form-title">
						Se connecter
					</span>
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
			
						<input class="input100" type="email" name="email"  id="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pswd" id="pswd" placeholder="Mot de passe">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					   <!-- Google reCAPTCHA box -->
    <div class="g-recaptcha" data-sitekey="6Lep-6slAAAAADwZ3SL-meiOknV5nBbaoKjDsu3c"></div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" value="SUBMIT">
							se connecter
	
						</button>
						
					</div>

					<div class="text-center p-t-12">

						<a class="txt2" href="forgetmdp.php">
							Nom d'utilisateur / Mot de passe oublié ?
						</a>
					</div>


					<div class="text-center p-t-136">
						
                        <a href="signup.php" class="btn">créer votre compte</a>
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>