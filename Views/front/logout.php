<?php

session_start();
$_SESSION["res"] = null;

header('Location:  login.php');
