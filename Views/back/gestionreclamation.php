<?php
  // session_start();

	include '../../Controller/AdherentC.php';
	$adherentC=new AdherentC();
	$listeAdherents=$adherentC->afficheradherents();
    if (isset($_POST['tri']))
    {
        if($_POST['tri']=="triAsc")
        {$listeAdherents=$adherentC->triuserAsc();}
        if($_POST['tri']=="triDes")
        {$listeAdherents=$adherentC->triuserdesc();}
        
    }
 
    
	include '../../Controller/reponseC.php';
	$reponseC=new reponseC();
	$listereponses=$reponseC->afficherreponses(); 

// Connect to the database
$dsn = 'mysql:host=localhost;dbname=web';
$username = 'root';
$password = '';
$conn = new PDO($dsn, $username, $password);

// Archive a row if the 'archive' button was clicked
if (isset($_GET['archive'])) {
  $id = $_GET['archive'];
  
  // Copy the row from 'reclamation' to 'archive'
  $stmt = $conn->prepare("INSERT INTO archive (id, nom, description, email) SELECT id, nom, description, email FROM reclamation WHERE id = ?");
  $stmt->execute([$id]);

  // Delete the row from 'reclamation'
  $stmt = $conn->prepare("DELETE FROM reclamation WHERE id = ?");
  $stmt->execute([$id]);
  
}

// Unarchive a row if the 'unarchive' button was clicked
if (isset($_GET['unarchive'])) {
  $id = $_GET['unarchive'];
  
  // Copy the row from 'archive' to 'reclamation'
  $stmt = $conn->prepare("INSERT INTO reclamation (id, nom, description, email) SELECT id, nom, description, email FROM archive WHERE id = ?");
  $stmt->execute([$id]);

  // Delete the row from 'archive'
  $stmt = $conn->prepare("DELETE FROM archive WHERE id = ?");
  $stmt->execute([$id]);
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    
    <title>DisTunis</title>
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
                        <img src="./logo.png" class="logok" width="200px">
                    </div>
                    <div class="p-1 flex flex-row items-center">
                        <a href="https://github.com/tailwindadmin/admin"
                            class="text-white p-2 mr-2 no-underline hidden md:block lg:block"></a>



                        <a href="#" onclick="" class="text-white p-2 no-underline hidden md:block lg:block"></a>
                        <div id="ProfileDropDown"
                            class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                            <ul class="list-reset">
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My
                                        account</a></li>
                                <li><a href="#"
                                        class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a>
                                </li>
                                <li>
                                    <hr class="border-t mx-2 border-grey-ligght">
                                </li>
                                <li><a href="#"
                                        class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a>
                                </li>
                            </ul>
                        </div>
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
                            <a href="affruser.php"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-table float-left mx-2"></i>
                                utilisateur
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                            <a href="gestionreclamation.php"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fab fa-wpforms float-left mx-2"></i>
                                Réclamations
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>

                        <li class="w-full h-full py-3 px-2">
                            <a href="#"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="far fa-file float-left mx-2"></i>
                                Pages
                                <span><i class="fa fa-angle-down float-right"></i></span>
                            </a>
                            <ul class="list-reset -mx-2 bg-white-medium-dark">
                                <li class="border-t mt-2 border-light-border w-full h-full px-2 py-3">
                                    <a href=""
                                        class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                        Page d'enregistrement
                                        <span><i class="fa fa-angle-right float-right"></i></span>
                                    </a>
                                </li>
                                <li class="border-t border-light-border w-full h-full px-2 py-3">
                                    <a href="register.html"
                                        class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                        Page de connexion
                                        <span><i class="fa fa-angle-right float-right"></i></span>
                                    </a>
                                </li>
                                <li class="border-t border-light-border w-full h-full px-2 py-3">
                                    <a href="404.html"
                                        class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                        Page 404
                                        <span><i class="fa fa-angle-right float-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </aside>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <!--Horizontal form-->
                      
                        <!--/Horizontal form-->

                        <!--Underline form-->
                    
                        <!--/Underline form-->
                    </div>
                    <!-- /Cards Section Ends Here -->

                    <!--Grid Form-->

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Reclamations
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                <thead>
				              <th class="border w-1/6 px-4 py-2">ID</th>
				                 <th class="border w-1/6 px-4 py-2">Objet</th>
				                  <th class="border w-1/6 px-4 py-2">Message</th>
				           <th class="border w-1/6 px-4 py-2">email</th>
                         <th  class="border w-1/6 px-4 py-2">Archiver</th>
				         <th  class="border w-1/6 px-4 py-2">Supprimer</th>
                         <th  class="border w-1/6 px-4 py-2">Repondre</th>
                         <th  class="border w-1/6 px-4 py-2">Modifier</th>



                         </thead>
			              <?php
				     foreach($listeAdherents as $reclamation){
			   ?>
		    	<tr>
				<td class="border w-1/6 px-4 py-2"> <?php echo $reclamation['id']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $reclamation['nom']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $reclamation['description']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $reclamation['email']; ?></td>
                
              <?php   echo "<td><a href='?archive=".$reclamation['id']."' >Archive</a></td>"; ?>
              
				
				<td>
					<form method="POST" action="modifieradherent.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reclamation['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimeradherent.php?id=<?php echo $reclamation['id']; ?>">Supprimer</a>
				</td>
                <td>
					<a href="ajouterreponse.php?id=<?php echo $reclamation['id']; ?>">Repondre</a>
				</td>
         
			 </tr>
			  <?php
				}
			  ?>
                                </table>
                               
                            </div>
                            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                                <input id="search-input" type="text" placeholder="Search...">
                                <form action="" method="POST">
    <select name="tri" id="tri">
    <option value= tri>choissir une tri</option>
        <option value="triAsc">alphabetasc</option>
        <option value="triDes">alphabetdes</option>
        <input type="submit" value="Trier">
    </select>
                                
                            </li>

                        </div>

                    </div>


                    <!--/Grid Form-->
                </div>

                <title>AJAX Search Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#search-input").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

<body>
    <br><br>


                                              <!--table reponse -->


                <div class="reponse"></div>

                <div class="flex flex-col">
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <!--Horizontal form-->
                      
                        <!--/Horizontal form-->

                        <!--Underline form-->
                    
                        <!--/Underline form-->
                    </div>
                    <!-- /Cards Section Ends Here -->

                    <!--Grid Form-->

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                               Reponses                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                <thead>
				       <th class="border w-1/6 px-4 py-2">ID</th>
				       <th class="border w-1/6 px-4 py-2">ID Reclamation</th>
				         <th class="border w-1/6 px-4 py-2">Reponse</th>
                
            	       <th  class="border w-1/6 px-4 py-2">Modifier</th>
				       <th  class="border w-1/6 px-4 py-2">Supprimer</th>
                        </thead>
			          <?php
				     foreach($listereponses as $reponse){
			     ?>
		    	 <tr>
                    <form method="post">
				 <td class="border w-1/6 px-4 py-2"> <?php echo $reponse['id']; ?></td>
				 <td class="border w-1/6 px-4 py-2"><?php echo $reponse['id_reclamation']; ?></td>
				 <td class="border w-1/6 px-4 py-2"><?php echo $reponse['texte']; ?></td>
          
              
				
				 <td>
					<form method="POST" action="modifierreponse.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reponse['id']; ?> name="id">
					</form>
				 </td>
				 <td>
					<a href="supprimerreponse.php?id=<?php echo $reponse['id']; ?>">Supprimer</a>
				 </td>
			     </tr>
			     <?php
				  }
			       ?>
                       </table>
                               
                            </div>
                            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                               Archive                           </div>
                              <table id="archiveTable">
                                <tr>
                                <?php // Display the 'archive' table
$stmt = $conn->prepare("SELECT * FROM archive");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
echo "<tr>
<th class='border w-1/6 px-4 py-2' >ID</th>
<th class='border w-1/6 px-4 py-2'>Nom</th>
<th class='border w-1/6 px-4 py-2'>Description</th>
<th class='border w-1/6 px-4 py-2'>Email</th>
<th class='border w-1/6 px-4 py-2'>Action</th>
</tr>";
foreach ($rows as $row) {
  echo "<tr>";
  echo "<td class='border w-1/6 px-4 py-2'>".$row['id']."</td>";
  echo "<td class='border w-1/6 px-4 py-2'>".$row['nom']."</td>";
  echo "<td class='border w-1/6 px-4 py-2'>".$row['description']."</td>";
  echo "<td class='border w-1/6 px-4 py-2'>".$row['email']."</td>";
  echo "<td class='border w-1/6 px-4 py-2'><a href='?unarchive=".$row['id']."'>Unarchive</a></td>";
  echo "</tr>";
}
echo "</table>";?>
                                </tr>
                              </table>
                            </li>
                        </div>
                    </div>
                    <!--/Grid Form-->
                </div>
            </main> 
            <!--/Main-->
        </div>
    </div>
</div>
<script src="./main.js"></script>

</body>

</html>