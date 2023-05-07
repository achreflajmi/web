<?php
include '../../Controller/projet.php';
session_start();



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="icon" href="./apple-touch-icon.png" />
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">

    <title>Distunis Admin</title>
</head>

<body>
    <!--Container -->
    <div class="mx-auto bg-grey-400">
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
                <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                    <div class="flex flex-col">
                        <!-- Stats Row Starts Here -->
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                            <div
                                class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                        $244
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                        Ventes totales
                                    </a>
                                </div>
                            </div>

                            <div
                                class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                        $199.4
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                        Cout total
                                    </a>
                                </div>
                            </div>

                            <div
                                class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                        <?php


                                        $userC = new userC();
                                        $liste = $userC->countUsers();
                                        echo $liste;
                                        ?>
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                        Nombre d'utilisateurs
                                    </a>
                                </div>
                            </div>

                            <div
                                class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                        500
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                        Nombre de produits
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- /Stats Row Ends Here -->

                        <!-- Card Sextion Starts Here -->
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                            <!-- card -->

                            <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                                <div class="px-6 py-2 border-b border-light-grey">
                                    <div class="font-bold text-xl">Categories en tendances</div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table text-grey-darkest">
                                        <thead class="bg-black text-white text-normal">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Produit</th>
                                                <th scope="col">Dernier</th>
                                                <th scope="col">Present</th>
                                                <th scope="col">Variation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>
                                                    <button
                                                        class="bg-blue-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full">
                                                        event 1
                                                    </button>
                                                </td>
                                                <td>4500</td>
                                                <td>4600</td>
                                                <td>
                                                    <span class="text-green-500"><i
                                                            class="fas fa-arrow-up"></i>5%</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>
                                                    <button
                                                        class="bg-primary hover:bg-primary-dark text-white font-light py-1 px-2 rounded-full">
                                                        event 2
                                                    </button>
                                                </td>
                                                <td>10000</td>
                                                <td>3000</td>
                                                <td>
                                                    <span class="text-red-500"><i
                                                            class="fas fa-arrow-down"></i>65%</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">3</th>
                                                <td>
                                                    <button
                                                        class="bg-success hover:bg-success-dark text-white font-light py-1 px-2 rounded-full">
                                                        event 3
                                                    </button>
                                                </td>
                                                <td>10000</td>
                                                <td>3000</td>
                                                <td>
                                                    <span class="text-red-500"><i
                                                            class="fas fa-arrow-down"></i>65%</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">4</th>
                                                <td>
                                                    <button
                                                        class="bg-blue-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full">
                                                        event 4
                                                    </button>
                                                </td>
                                                <td>10000</td>
                                                <td>3000</td>
                                                <td>
                                                    <span class="text-green-500"><i
                                                            class="fas fa-arrow-up"></i>65%</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>
                                                    <button
                                                        class="bg-orange-500 hover:bg-orange-800 text-white font-light py-1 px-2 rounded-full">
                                                        -
                                                    </button>
                                                </td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>
                                                    <span class="text-green-500"><i class="fas fa-arrow-up"></i>-</span>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /card -->

                        </div>
                        <!-- /Cards Section Ends Here -->

                        <!-- Progress Bar -->
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 mt-2">
                            <div class="rounded overflow-hidden shadow bg-white mx-2 w-full pt-2">
                                <div class="px-6 py-2 border-b border-light-grey">
                                    <div class="font-bold text-xl">Progres des produits</div>
                                </div>
                                <div class="">
                                    <div class="w-full">

                                        <div class="shadow w-full bg-grey-light">
                                            <div class="bg-blue-500 text-xs leading-none py-1 text-center text-white"
                                                style="width: 45%">45%
                                            </div>
                                        </div>


                                        <div class="shadow w-full bg-grey-light mt-2">
                                            <div class="bg-teal-500 text-xs leading-none py-1 text-center text-white"
                                                style="width: 59%">59%
                                            </div>
                                        </div>


                                        <div class="shadow w-full bg-grey-light mt-2">
                                            <div class="bg-orange-500 text-xs leading-none py-1 text-center text-white"
                                                style="width: 65%">65%
                                            </div>
                                        </div>


                                        <div class="shadow w-full bg-grey-300 mt-2">
                                            <div class="bg-red-800 text-xs leading-none py-1 text-center text-white"
                                                style="width: 75%">75%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Profile Tabs-->
                        <div
                            class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 p-1 mt-2 mx-auto lg:mx-2 md:mx-2 justify-between">
                            <!--Top user 1-->
                            <a href="">
                                <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                                    <img src="w1Bdydo.jpg" alt="" class="w-full" />
                                    <div class="flex justify-center -mt-8">
                                        <img src="adam (1).jpg" alt=""
                                            class="rounded-full border-solid border-white border-2 -mt-3">
                                    </div>
                                    <div class="text-center px-3 pb-6 pt-2">
                                        <h3 class="text-black text-sm bold font-sans">Touil Ilyes</h3>
                                        <p class="mt-2 font-sans font-light text-grey-dark">admin N#3
                                        </p>
                                    </div>
                                    <div class="flex justify-center pb-3 text-grey-dark">
                                        <div class="text-center mr-3 border-r pr-3">
                                            <h2>34</h2>
                                            <span>Photos</span>
                                        </div>
                                        <div class="text-center">
                                            <h2>42</h2>
                                            <span>Amis</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!--Top user 2-->
                            <a href="">
                                <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                                    <img src="w1Bdydo.jpg" alt="" class="w-full" />
                                    <div class="flex justify-center -mt-8">
                                        <img src="adam (1).jpg" alt=""
                                            class="rounded-full border-solid border-white border-2 -mt-3">
                                    </div>
                                    <div class="text-center px-3 pb-6 pt-2">
                                        <h3 class="text-black text-sm bold font-sans">Touil Ilyes</h3>
                                        <p class="mt-2 font-sans font-light text-grey-dark">admin N#3
                                        </p>
                                    </div>
                                    <div class="flex justify-center pb-3 text-grey-dark">
                                        <div class="text-center mr-3 border-r pr-3">
                                            <h2>34</h2>
                                            <span>Rendu</span>
                                        </div>
                                        <div class="text-center">
                                            <h2>42</h2>
                                            <span>A faire</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!--Top user 3-->
                            <a href="">
                                <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                                    <img src="w1Bdydo.jpg" alt="" class="w-full" />
                                    <div class="flex justify-center -mt-8">
                                        <img src="adam (1).jpg" alt=""
                                            class="rounded-full border-solid border-white border-2 -mt-3">
                                    </div>
                                    <div class="text-center px-3 pb-6 pt-2">
                                        <h3 class="text-black text-sm bold font-sans">Touil Ilyes</h3>
                                        <p class="mt-2 font-sans font-light text-grey-dark">admin N#3
                                        </p>
                                    </div>
                                    <div class="flex justify-center pb-3 text-grey-dark">
                                        <div class="text-center mr-3 border-r pr-3">
                                            <h2>34</h2>
                                            <span>Rendu</span>
                                        </div>
                                        <div class="text-center">
                                            <h2>42</h2>
                                            <span>A faire</span>
                                        </div>
                                    </div>
                                </div>
                            </a>


                        </div>
                        <!--/Profile Tabs-->
                    </div>
                </main>
                <!--/Main-->
            </div>
            <!--Footer-->
            <footer class="bg-grey-darkest text-white p-2">
                <div class="flex flex-1 mx-auto">&copy; DisTunis</div>
                <div class="flex flex-1 mx-auto">Par: <a href="https://themewagon.com/" target=" _blank"> Elli howa</a>
                </div>
            </footer>
            <!--/footer-->

        </div>

    </div>
    <script src="./main.js"></script>
</body>

</html>