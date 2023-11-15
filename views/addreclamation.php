<?php
include '../Controller/reclamationc.php';
include '../model/reclamation.php';

$error = "";

// create an instance of the controller
$reclamationC = new reclamationC();

// check if id_rec is provided for updating
if (isset($_GET['id_rec'])) {
    $id_rec = $_GET['id_rec'];
    $reclamation = $reclamationC->showreclamation($id_rec);
} else {
    $reclamation = null; // for adding new reclamation
}

if (isset($_POST["nom"]) && isset($_POST["sujet"]) && isset($_POST["texte"])) {
    if (!empty($_POST['nom']) && !empty($_POST["sujet"]) && !empty($_POST["texte"])) {
        if ($reclamation) {
            // Update existing reclamation
            $reclamation->setdate($_POST['nom']);
            $reclamation->setsujet($_POST['sujet']);
            $reclamation->settexte($_POST['texte']);

            $reclamationC->updateJoueur($reclamation, $id_rec);
        } else {
            // Add new reclamation
            $reclamation = new reclamation(null, $_POST['nom'], $_POST['sujet'], $_POST['texte']);
            $reclamationC->addreclamation($reclamation);
        }

        header('Location:listreclamation.php');
       // header('location:updatereclamation.php');
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>LocalArt - Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    -->
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <!--
    <link rel="stylesheet" href="assets/css/custom.css">
-->
    
    <!-- Load fonts style after rendering the layout styles -->
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css"> 
    
    <link rel="stylesheet" href="assets/css/taraji.css">
    


    <!-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->





</head>

<body>
    
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@LocalArt.tn</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" style="color: brown;" href="index.html">
                LocalArt
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">à propos</a>
                        </li>
                      <li class="nav-item">
                            <a class="nav-link" href="shop.html">boutique</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="article.html">Article</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            
    

            <h1 id="contactText" class="h1">Contactez Nous</h1>
            
            
            <p>
               Chers client , nous sommes à votre disposition pour répondre à vos questions .
            </p>
            
<a href="#tempaltemo_footer" class="u-active-palette-1-base u-align-left u-black u-border-none u-btn u-button-style u-hover-palette-1-base u-btn-2">savoir plus</a>

        </div>
    </div>
    
    <div class="container py-5">
        <div class="row py-5">
            <form  class="col-md-9 m-auto" method="post" role="form" id="myForm"  novalidate >
                <div class="row">
                    <div class="col-md-6 form-container slide-from-left">
                        
                        <div  class="form-group" >
                            
                            <label for="inputname">nom</label>
                            
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" >
                            <span id="mynom"></span>
                            
                            
                        </div>
                    
                       
                    
                        <div class="form-group">
                            <label for="inputsubject">Sujet</label>
                            
                            <select class="form-control" id="sujet" name="sujet">
                                
                                <option>Signaler un texte abus</option>
                                <option >Signaler un problème</option>
                                <option >Autres</option>
                            </select>
                            <span id="myobjet"></span>
                    </div>
                        <div class="form-group">
                            <label for="inputmessage">Texte</label>
                            
                            <textarea class="form-control" id="texte" name="texte" placeholder="Texte" rows="8"></textarea>
                            <span id="mytexte"></span>
                        </div>

                    
                        <br>
                        <br>
                        <br>
                        
                        
                        <button  type="submit" class="btn btn-success btn-lg px-3" >Envoyer</button>
                        
                        
                    </div>
                    <div class="col-md-6">
                    <img id="titre" src="image/img.jpg" alt="image" class="img slide-from-right" width="100%" height = "99%">
                    </div>
                </div>
            </form>
        </div>
    </div>
  
    <!--
    <script src="rh\templatemo_559_zay_shop\assets\js\animations.js"></script>
    -->

    <!-- Start Map -->
    <div id="mapid" style="width: 100%; height: 300px;"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script>
       

    // Initialize the map
    
    var mymap = L.map('mapid').setView([36.8065, 10.1815], 13);



// Add a tile layer (replace with your preferred tile layer)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(mymap);

// Add a marker

L.marker([36.8065, 10.1815]).addTo(mymap)

    .bindPopup("<b>LocalArt</b> eCommerce Site<br />Position.")
    .openPopup();

// Disable scroll wheel zoom and touch zoom
mymap.scrollWheelZoom.disable();
mymap.touchZoom.disable();



    </script>
    
    <!-- Start Footer -->
    
    <footer class="bg-dark" id="tempaltemo_footer" >
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">LocalArt boutique</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            123 Consectetur at ligula 10660
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">92993232</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">info@localArt.tn</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Luxury</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                        <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Popular Dress</a></li>
                        <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Shoes</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Plus d'Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">acceuil</a></li>
                        <li><a class="text-decoration-none" href="#">à propos</a></li>
                        <li><a class="text-decoration-none" href="#">boutique localisation</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="#">Contact</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email addresse</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email addresse">
                        <div class="input-group-text btn-success text-light">S'inscrire</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2023 Local-Art
                            | concue par <a rel="sponsored" href="https://www.instagram.com/hedi_yedes/" target="_blank">LocalArt</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/contact.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    <!-- End Script -->
  
</body>


</html>


