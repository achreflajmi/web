
<?php
include 'C:\xampp\htdocs\project\Controller\projet.php';
include_once 'C:\xampp\htdocs\project\Model\user.php';

if (isset($_GET['token']) && $_GET['token']!='') {
    

    $db = config::getConnexion();
        $stmt = $db->prepare("SELECT email from user  WHERE token = ?");
        $stmt->execute([ $_GET['token']]);
         $mail= $stmt->fetchColumn()
   
       ?>
 
 <!DOCTYPE html>
       <html lang="en">
       <head>
           <meta charset="UTF-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <title>recuperation mdp</title>
       </head>
       <body>
       <form method="post">
        
            <label for="newpassword"><b>nouveau mdp</b></label>
            <input type="password" name="newpassword" >
            <input type="submit" value ='confirmer' >
         
    </form>
       
       <?php
   
}
if (isset($_POST['newpassword']))
{
    $password=$_POST['newpassword'];
    $sql=" UPDATE user SET pswd =?, token = NULL WHERE email ='" . $mail ."'";
    $stmt = $db->prepare($sql);
        $stmt->execute([$password]);
        echo"mdp modifier avec succ!!!";
        header('Location:login.php');
}
?>


