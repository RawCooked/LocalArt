<?php

include "../controller/articleA.php";
$c = new articleA();
if (isset($_POST['deleteArticleId'])) {
    $articleId = $_POST['deleteArticleId'];
    // Add proper error handling
    if (!$c->deleteArticle($articleId)) {
        echo "Error deleting article.";
    }
    
}

$category='livre';
$tab = $c->listArticlesByCategory($category);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Article </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicons -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!--load mystyle-->
    <link rel="stylesheet" href="tes2">
    <link rel="stylesheet" href="test1.css">
    <link rel="stylesheet" href="test3.css">
    <link rel="stylesheet" href="test4.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    
    <div class="topnav">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">LOcalArt@Gmail.com <i class="fa fa-envelope mx-2"></i></a>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">025-350-0650<i class="fa fa-phone mx-2"></i></a>
                    
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
      </div>
  <!-- ======= Header ======= -->
  

  <main id="main">



    
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                LocalArt
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>   
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                      <li class="nav-item">
                            <a class="nav-link" href="shop.html">Shop</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="test1.html">Article</a></li>
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
                    <a class="nav-icon position-relative text-decoration-none" href="#"target="_blank" rel="sponsored"></a>
                         <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"><span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span></i>  
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#"target="_blank" rel="sponsored"></a>
                        <i class="fa fa-fw fa-user text-dark mr-3"><span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span></i>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->
    <!-- les images en haut -->
    
    
  <style >
    .city {display:none}
    </style>
    <body>
    
    <div class="w3-container">
    <h2>cliquer sur ce bouton:</h2>
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Info</button>
    
    <div id="id01" class="w3-modal" >
     <div class="w3-modal-content w3-card-4 w3-animate-zoom">
      <header class="w3-container w3-green"> 
       <span onclick="document.getElementById('id01').style.display='none'" 
       class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
       <h2>Header</h2>
      </header>
    
      <div class="w3-bar w3-border-bottom">
       <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'art1')">Litterature</button>
       <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'culture')">écrivain</button>
      </div>
    
      <div id="art1" class="w3-container city">
       <h1>La litterature tunisienne</h1>
       <p>La littérature de la Tunisie désigne l'ensemble des productions, orales et écrites, des populations (12 millions environ en 2023) du territoire tunisien, à toute époque, en toute langue. Elle inclut également celles des écrivains la diaspora tunisienne (plus d'un million, en 2023) et celles des auteurs qui revendiquent, au moins partiellement, leur appartenance à la culture tunisienne.</p>
       </div>
    
      <div id="culture" class="w3-container city">
       <h1>des écrivains tunisens</h1>
       <p><li>Ibn Al-Abbar (1199-1260)</li>
       <li>Abdelaziz El Aroui (1898-1971)</li>
       <li>Tahar Haddad (1899-1935)</li>
       <li>Tahar Guiga (1922-1993), nouvelliste</li>
       <li>Emna Belhadj Yahia (1945- ), enseignante, philosophe, essayiste</li>
        et beaucoup plus d'autres écrivains
    </p>
       
      </div>
      <div class="w3-container w3-light-grey w3-padding">
       <button class="w3-button w3-right w3-white w3-border" 
       onclick="document.getElementById('id01').style.display='none'">Close</button>
      </div>
     </div>
    </div>
    
    </div>
    <script>
     document.getElementsByClassName("tablink")[0].click();
      
      function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
          tablinks[i].classList.remove("w3-light-grey");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.classList.add("w3-light-grey");
      }
      
      </script>    




    <div style="text-align:center">
      <div class="w3-panel w3-leftbar w3-light-grey">
        <p class="w3-xlarge w3-serif"><i>“ Le retour à la culture. Oui, vraiment, à la culture. On ne peut pas consommer grand-chose si l'on reste tranquillement assis à lire des livres. ”</i><br></p>
        <p> Aldous Huxley</p> 
      </div> 
      <!-- The four columns -->
      
      
      <div class="w3-row-padding">
         </div><br>
      <div class="w3-display-bottomleft w3-container w3-padding w3-text-white">culture</div>
      </div>
    
    <!-- ======= Blog Single Section ======= -->
    <center>
    <h2><a href="addArticle.php">Ajouter un article</a></h2>
</center>
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
          <?php foreach ($tab as $article) { ?>
            <div>
            
            
            <table>
                <tr>
                    <td>
                    <form method="POST" action="lvr.php">
                        <input type="submit" name="detaille" class="w3-container w3-light-green" value="Détail"  >
                        <input type="hidden" value=<?PHP echo $article['id_art']; ?> name="id_art">
                    </form><br>
                    <form method="POST" action="">
                        <input type="hidden" value=<?PHP echo $article['id_art']; ?> name="deleteArticleId">
                        <button name="delete_button" type="submit"class="w3-container w3-green" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');">Delete</button>
                    </form>
                    </td>
                </tr>

            
            </table>
           
             
             </div>
             <br>
             <div class="blog-author d-flex align-items-center">

                    <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                    
                    <div id="article">
                        <h4><?= $article['nomprenom_artiste']; ?></h4>
                        <div class="social-links">
                            <!-- You can customize the URLs and icons based on your requirements -->
                            <a class="text-light" href="https://fb.com" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                            <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                        </div>
                        <p>
                            <div class="w3-panel w3-pale-green">
                                <h1 class="w3-opacity">
                                <b><?= $article['titre']; ?></b></h1>
                            </div>
                           
                            <pw>
                            <?= insertLineBreaks($article['contenu'], 40); ?>
                            </pw>
                        </p>
                    </div>
                
             </div>
             
             <?php } 
                        function insertLineBreaks($text, $lineLength) {
                // Insert a line break after every $lineLength characters
                return wordwrap($text, $lineLength, "<br>", true);
            }
             ?>
             
          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">
              <h2> Menu</h2>
              <p>checher une catégorie d'articles spécific</p>
                <div class="w3-dropdown-hover">
                  <button class="w3-button w3-black">Dérouler</button>
                  <div class="w3-dropdown-content w3-bar-block w3-card w3-light-grey" id="myDIV">
                  <input class="w3-input w3-padding" type="text" placeholder="Search.." id="myInput" onkeyup="categories()">
                  <a class="w3-bar-item w3-button" href="listearttab.php">tableaux</a>
                  <a class="w3-bar-item w3-button" href="listartvt.php">vetements traditionnels</a>
                  <a class="w3-bar-item w3-button"href="listeartmon.php">monumens</a>
                  <a class="w3-bar-item w3-button" href="listeartlvr.php">livres</a>
                  <a class="w3-bar-item w3-button" href="listeartville.php">villes</a>
                  </div>
               </div>
            </div>
          
          </div>
        </div>
      </div>
    </section>


<script>
     function categories() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDIV");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>
</div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">Zay Shop</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        123 Consectetur at ligula 10660
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
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
                <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Home</a></li>
                    <li><a class="text-decoration-none" href="#">About Us</a></li>
                    <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
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
                <label class="sr-only" for="subscribeEmail">Email address</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                    <div class="input-group-text btn-success text-light">Subscribe</div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        Copyright &copy; 2021 Company Name 
                        | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->



</script>
<!-- Start Script -->
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/templatemo.js"></script>
<script src="assets/js/custom.js"></script>
<!-- End Script -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


    