<?php
//session_start();
include '../Controller/formulaireC.php';
include '../Controller/priceC.php';
include_once '../Model/formulaire.php';
require_once('../Controller/priceC.php');
include_once '../Model/Price.php';
$formulaireC = new formulaireC();
$listeformulaires = $formulaireC->afficherformulaire();
$priceC = new priceC();
$listePrice = $priceC->afficherprice(); 
$error = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="back/dist/styles.css">
    <link rel="stylesheet" href="back/dist/all.css">
    <title>REVERSO DASHBOARD</title>
	<style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
		.stat {
			display: inline-block;
			padding: 10px 20px;
			background-color: #cda45e;
			color: white;
			font-size: 16px;
			border-radius: 5px;
            position: relative;
			text-decoration: none;
			box-shadow: 2px 2px 5px bisque;
			transition: all 0.2s;
		}
		.stat:hover {
			background-color: #cda45e;
			box-shadow: 2px 2px 10px bisque;
		}
        h2 {
    font-size: 1.5em;
    font-family: 'Open Sans', sans-serif;
    font-weight: bold;
    position: relative;
    letter-spacing: 0.05em;
    margin-bottom: 0.5em;
  }
  /* Search box style */
#search-form input[type=text] {
  padding: 10px;
  font-size: 16px;
  border: none;
  width: 75%;
  outline: none;
  float: left;
  background-color: #f1f1f1;
  margin-right: 0;
  border-radius: 3px 0 0 3px;
}

/* Search button style */
#search-form button[type=submit] {
  float: left;
  width: 25%;
  padding: 10px;
  background: #cda45e;
  color: white;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 0 3px 3px 0;
}

/* Search box focus style */
#search-form input[type=text]:focus {
  background-color: #ddd;
}

/* Responsive design for small screens */
@media screen and (max-width: 600px) {
  #search-form input[type=text], #search-form button[type=submit] {
    width: 100%;
    float: none;
    border-radius: 3px;
  }
}

	</style>
</head>
<body>
<!--Container -->
<div class="mx-auto bg-grey-lightest">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">REVERSO DASHBOARD</h1>
                </div>
            </div>
        </header>
        <!--/Header-->
        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar"
            class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
            <ul class="list-reset flex flex-col">
                <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                    <a href="index.html"
                        class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-tachometer-alt float-left mx-2"></i>
                        Dashboard
                        <span><i class="fas fa-angle-right float-right"></i></span>
                    </a>
                </li>
            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                <a href="tables.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    <i class="fas fa-table float-left mx-2"></i>
                    user management
                    <span><i class="fa fa-angle-right float-right"></i></span>
                </a>
            </li>
            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                <a href="mail.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    <i class="fab fa-wpforms float-left mx-2"></i>
                    delivery management
                    <span><i class="fa fa-angle-right float-right"></i></span>
                </a>
            </li>
            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                <a href="gestionsformateurs.html"
                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    <i class="fas fa-table float-left mx-2"></i>
                    training management
                    <span><i class="fa fa-angle-right float-right"></i></span>
                </a></li>
                <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                    <a href="gestionproduit.html"
                        class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-table float-left mx-2"></i>
                        product management
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a></li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="gestionformulaire.html"
                            class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            formulaire management
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a></li>     
            </ul>
        </aside>
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

            <form id="search-form" method="post" style=" display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%; width: 300px;  padding: 10px; ">

    <input type="text" id="search-query" name="search-query" placeholder="Search products...">
    <button type="submit" id="search-button">Search</button>
</form>

<br><br>
<br>

<div class="flex flex-col">
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                    </div>
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                formulaires
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
			<?php
				foreach($listeformulaires as $formulaire){
			?>
<div class="box-container" id="search-results"></div>
			<?php
				}
			?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Set the initial query to an empty string
        var query = '';
        // Send an AJAX request to search_event.php with the initial query
        $.ajax({
            url: 'search_event.php',
            type: 'post',
            data: {query: query},
            success: function(response) {
                $('#search-results').html(response);
            }
        });
        // Handle the form submission
        $('#search-form').submit(function(event) {
            event.preventDefault();
            query = $('#search-query').val();
            $.ajax({
                url: 'search_event.php',
                type: 'post',
                data: {query: query},
                success: function(response) {
                    $('#search-results').html(response);
                }
            });
        });
    });
</script>
                                </table>       
                            </div>
                            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                                <a href="reverso2/index.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    <i class="fab fa-wpforms float-left mx-2"></i>
                                    check formulaire window on  the web site
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                        </div>                   
                    </div>
                </div>


                        <h2>Event Categories Statistics</h2>
	<a href="stat.php" class="stat">View Statistics</a>
                        <main class="bg-white-500 flex-1 p-3 overflow-hidden">
                <div class="flex flex-col">
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                    </div>
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                commission de prix
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                <thead>
				<th class="border w-1/6 px-4 py-2">id</th>
				<th class="border w-1/6 px-4 py-2">Le nouveau prix</th>
				<th class="border w-1/6 px-4 py-2">l'id de l'evenement</th>
        </thead>
			<?php
				foreach($listePrice as $price){
			?>
			<tr>
				<td class="border w-1/6 px-4 py-2"> <?php echo $price['id']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $price['nvPrix']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $price['formulaire_id']; ?></td>

			</tr>

			<?php
				}
			?>
            </main>
        </div>
    </div>
</div>
<!-- Centered Modal -->
<div id='centeredModal' class="modal-wrapper">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
                <div class="flex justify-between items-center">
                    View trainers
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
                </div>
            </div>
            <!-- Modal content -->
            <p>
               Get to know your trainer !
            </p>
            <img src="ezlearn.jpg" alt="Trulli" width="500" height="333">
        </div>
    </div>
</div>
<!-- Centered With a Form Modal -->
<div id='centeredFormModal' class="modal-wrapper">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
                <div class="flex justify-between items-center">
                    Modify trainers
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
                </div>
            </div>
            <!-- Modal content -->
            <form id='form_id' class="w-full">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-first-name">
                            Name
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                            id="grid-first-name" type="text" placeholder="Name">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-first-name">
                            Email
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                            id="grid-first-name" type="text" placeholder="Email">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-last-name">
                            GENDER
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="grid-last-name" type="text" placeholder="Male/Female">
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                        for="grid-first-name">
                        ID
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                        id="grid-first-name" type="text" placeholder="#ID">
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                        for="grid-first-name">
                        Number
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                        id="grid-first-name" type="text" placeholder="12345">
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                        for="grid-first-name">
                        New password
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                        id="grid-first-name" type="text" placeholder="Password">
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
              
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                            for="grid-city">
                            City
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-city" type="text" placeholder="Albuquerque">
                    </div>
                </div>

                <div class="mt-5">
                    <button class='btn btn-primary bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Submit
                    </button>
                    <span
                        class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                        Close
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="./main.js"></script>
</body>
</html>
