<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon"  href="./apple-touch-icon.png" />
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
  
 
    <style>td {
      border: 1px solid #EEEEEE !important;
  text-align: center;
}</style>
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
               
            </div>
        </header>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                <div class="flex">

                </div>
                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border ">
                        <a href="back.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                   
                   
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href=""
                            class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                           utilisateur
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="mail.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                            Maill
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
                                <a href="login.html"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Login Page
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            <li class="border-t border-light-border w-full h-full px-2 py-3">
                                <a href="register.html"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Register Page
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            <li class="border-t border-light-border w-full h-full px-2 py-3">
                                <a href="404.html"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    404 Page
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
                                Les Clients
                            </div>
                            <div class="p-3">
                                <table  class="table-responsive w-full rounded" id="dataTable">
                                    <thead>
                                      <tr>
                                        <th class="border w-1/7 px-4 py-2">id</th>
                                        <th class="border w-1/6 px-4 py-2">uname</th>
                                        <th class="border w-1/6 px-4 py-2">email</th>
                                        <th class="border w-1/6 px-4 py-2">password</th>
                                        <th class="border w-1/6 px-4 py-2">date nessance</th>
                                        <th class="border w-1/6 px-4 py-2">image</th>
                                        <th  class="border w-1/2 px-4 py-2">role</th>
                                        <th  class="border w-1/2 px-4 py-2">option</th>
                                       

                                      </tr>
                                     
                                      <?php
include '../../Controller/projet.php';

$userC = new userC(); 
$liste = $userC->afficherUser();
if (isset($_POST['tri']))
    {
        if($_POST['tri']=="triAsc")
        {$liste=$userC->triuserAsc();}
        if($_POST['tri']=="triDes")
        {$liste=$userC->triuserdesc();}
        if($_POST['tri']=="tri")
        {$liste=$userC->afficherUser();}
    }

if (isset($liste) ) {
  foreach ($liste as $user) {
?>
  <tr>
    <td><?php echo $user['id']; ?></td>
    <td><?php echo $user['uname']; ?></td>
    <td><?php echo $user['email']; ?></td>
    <td><?php echo '*******'; ?></td>
    <td><?php echo $user['dateN']; ?></td>
    <td><img src="img/<?php echo $user['image']; ?>" alt="" style="width: 70px; height: 70px"></td>
    <td><?php echo $user['role']; ?></td>
    <td>
        <a href="updateuser.php?id=<?php echo $user['id']; ?>" class="btn">Modifier</a>
        <a href="deleteuser.php?id=<?php echo $user['id']; ?>" class="btn">Supprimer</a>
    </td>
  </tr>
<?php 
  }
} else {
  echo "Aucun utilisateur trouvé.";
}
?>

</tr>
                                    
                                    </thead>
                                </table>
                               
                            </div>
                            
                        </div>
                        
                    </div>
                    <div style="display: flex; align-items: center;  margin-left: 20px;">
                    <!--/RECHERCHE -->
                        <label for="Recherche">Recherche</label>
                        <input class="border px-4 py-2" onkeyup="myFunction()" id="myInput" type="text" style="margin-right: 10px;">
                        <form action="" method="POST">
    <select name="tri" id="tri">
    <option value= tri>choissir une tri</option>
        <option value="triAsc">alphabetasc</option>
        <option value="triDes">alphabetdes</option>
        <input type="submit" value="Trier">
    </select>
    <br>

                    </div>

                    <!--/Grid Form-->
                </div>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; My Design</div>
        </footer>
        <!--/footer-->
        

    </div>

</div>
<!-- Centered Modal -->
<div id='centeredModal' class="modal-wrapper">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
                <div class="flex justify-between items-center">
                    Modal header
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
                </div>
            </div>
            <!-- Modal content -->
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint impedit placeat nulla accusamus tempora,
                error inventore, ducimus est soluta voluptatem eligendi, saepe ullam non ratione laboriosam itaque
                cumque? Eaque, excepturi.
            </p>
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
                    Modal header
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
                            First Name
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                            id="grid-first-name" type="text" placeholder="Jane">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-last-name">
                            Last Name
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="grid-last-name" type="text" placeholder="Doe">
                    </div>
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

<script>
    function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script src="./main.js"></script>

</body>

</html>