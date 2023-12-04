<?php
include '../controller/articleA.php';
//include '../model/article.php';






if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['add'])) {
   
          
      $categorie = $_POST['categorie'];
      if ($categorie=="tableau"){
          $titre = $_POST['titre'];
          $nomprenom_artiste = $_POST['nomprenom_artiste'];
          $contenu = $_POST['contenu'];
          $article= new articleA;
          $article->addArticle(NULL,$categorie,$titre,$nomprenom_artiste,$contenu);
          if ($article->checkTitleExists($titre)) {
           echo '<script>alert("Le titre existe déjà dans la base de données.");</script>';
          } 
          else
          {
            header('location:listearttab.php');
          }
         
         }
        if ($categorie=="vetement"){
          $titre = $_POST['titre'];
          $nomprenom_artiste = $_POST['nomprenom_artiste'];
          $contenu = $_POST['contenu'];
          $article= new articleA;
          $article->addArticle(NULL,$categorie,$titre,$nomprenom_artiste,$contenu);
          header('location:listartvt.php');
         }
         if ($categorie=="monument"){
          $titre = $_POST['titre'];
          $nomprenom_artiste = $_POST['nomprenom_artiste'];
          $contenu = $_POST['contenu'];
          $article= new articleA;
          $article->addArticle(NULL,$categorie,$titre,$nomprenom_artiste,$contenu);
          header('location:listeartmon.php');
         }
         if ($categorie=="livre"){
          $titre = $_POST['titre'];
          $nomprenom_artiste = $_POST['nomprenom_artiste'];
          $contenu = $_POST['contenu'];
          $article= new articleA;
          $article->addArticle(NULL,$categorie,$titre,$nomprenom_artiste,$contenu);
          header('location:listeartlvr.php');
         }
         if ($categorie=="ville"){
          $titre = $_POST['titre'];
          $nomprenom_artiste = $_POST['nomprenom_artiste'];
          $contenu = $_POST['contenu'];
          $article= new articleA;
          $article->addArticle(NULL,$categorie,$titre,$nomprenom_artiste,$contenu);
          header('location:listeartville.php');
         }
      }
     

    }
     
  
  //else if()

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

<body >
    
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
    <script>
         function myFunction1() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
      }
    }
    
}
    </script>
   <script>
    function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
function openImg(imgName) {
  var i, x;
  x = document.getElementsByClassName("picture");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(imgName).style.display = "block";
}

   </script>
    <div class="w3-sidebar w3-bar-block  w3-animate-left" style="display:none" id="mySidebar">
      <button class="w3-bar-item w3-button w3-dark-grey w3-large" 
      onclick="w3_close()">Close &times;</button>
      <a href="#article" class="w3-bar-item w3-button w3-green">consulter Article</a>
      <a href="#ajart" onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button">Ajout Article</a>
      <a href="#comment" class="w3-bar-item w3-button">consulter commentaire</a>
      <a href="#ajcmnt" class="w3-bar-item w3-button">Ajout commentaire</a>
    </div>
    <div>
      <button class="w3-button w3-white w3-xxlarge" onclick="w3_open()">&#9776;</button>
    </div> 
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
       <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'art1')">art</button>
       <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'culture')">culture</button>
       <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'tun')">La tunisie</button>
       <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'ar')">ajouter article</button>
      </div>
    
      <div id="art1" class="w3-container city">
       <h1>art</h1>
       <p>Ensemble des procédés, des connaissances et des règles intéressant l'exercice d'une activité ou d'une action quelconque que nous somme capable à observer</p>
       </div>
    
      <div id="culture" class="w3-container city">
       <h1>culture</h1>
       <p>La culture est un ensemble lié de manières de penser, de sentir et d'agir plus ou moins formalisées qui, étant apprises et partagées par une pluralité de personnes, servent, d'une manière à la fois objective et symbolique</p>
       
      </div>
    
      <div id="tun" class="w3-container city">
       <h1>Tunisie</h1>
       <p>est un État arabophone et à majorité musulmane d'Afrique du Nord souverain depuis 1956</p><br>
      </div>
      <div id="ar" class="w3-container city">
       <h1 id="ajart">Ajouter un article</h1>
       <form  action="" method="POST" id="artBtn">
                  <div class="row">
                    <div class="col-md-6 form-group">
                    <select class="form-control" id="cat" type= "text" name="categorie">
                       <option value="">Choisir une catégorie*</option>
                        <option>tableau</option>
                        <option >vetement</option>
                        <option >monument</option>
                        <option >livre</option>
                        <option >ville</option>
                    </select>
                      <span id="msg3" ></span> 
                      
                    </div><br>
                    <div class="col-md-6 form-group">
                      <input id="title" type= "text" class="form-control" name="titre" placeholder="titre* " autocomplete="off"> 
                      <span id="msg4" style="color: red" ></span>
                    </div>
                   

                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input id="nom" type= "text" class="form-control" name="nomprenom_artiste" placeholder="nom complet*" > 
                      <span id="msg7" style="color: red"></span>
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col form-group">
                      <textarea id="art" type= "text" class="form-control" name="contenu" placeholder="Votre Article*"autocomplete="off"></textarea>
                        <label id="msg8" style="color: red"></label>
                    </div>
                  </div>
                  <div>
                    <button id="buttonId" onclick=""  type="submit" name="add" value="Save" class="btn btn-primary" style="background-color:green; " >Poster article</button>
                  </div>
                  
                  
                </form>
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
        <p class="w3-xlarge w3-serif"><i>“L’art de plaire est l’art de tromper.”</i><br></p>
        <p>VAUVENARGUES</p> 
      </div> 
      <!-- The four columns -->
      <div class="w3-container">
        <p>cliquer sur les images si dessous:</p>
      </div>
      
      <div class="w3-row-padding">
        <div class="w3-col s3 w3-container">
        <a href="javascript:void(0)" class="w3-hover-opacity" onclick="openImg('img1');">
          <img src="image5.jpg" alt="img1" height="250px" style="width:100%">
        </a>
        </div>
        <div class="w3-col s3 w3-container">
          <a href="javascript:void(0)" class="w3-hover-opacity" onclick="openImg('img2');">
            <img src="image2.jpg" alt="img2" height="250px" style="width:100%">
          </a>
        </div>
        <div class="w3-col s3 w3-container">
          <a href="javascript:void(0)" class="w3-hover-opacity" onclick="openImg('img3');">
            <img src="image6.jpeg" alt="img3" height="250px"style="width:100%">
          </a>
        </div>
        <div class="w3-col s3 w3-container">
          <a href="javascript:void(0)" class="w3-hover-opacity" onclick="openImg('img4');">
            <img src="image4.jpg" alt="img4" height="250px" style="width:100%">
          </a>
        </div>
      </div><br>
      
      <div id="img1" class="picture w3-display-container" style="display:none">
        <img src="image5.jpg" alt="img1" style="width:100%">
        <span onclick="this.parentElement.style.display='none'" 
        class="w3-display-topright w3-button w3-transparent w3-text-white">&times;</span>
        <div class="w3-display-bottomleft w3-container w3-padding w3-text-white">Maison tunisienne</div>
      </div>
      
      <div id="img2" class="picture w3-display-container" style="display:none">
        <img src="image2.jpg" alt="img2" style="width:100%">
        <span onclick="this.parentElement.style.display='none'" 
        class="w3-display-topright w3-button w3-transparent w3-text-white">&times;</span>
        <div class="w3-display-bottomleft w3-container w3-padding w3-text-white">art</div>
      </div>
      
      <div id="img3" class="picture w3-display-container" style="display:none">
        <img src="image6.jpeg" alt="img3" style="width:100%">
        <span onclick="this.parentElement.style.display='none'" 
        class="w3-display-topright w3-button w3-transparent">&times;</span>
        <div class="w3-display-bottomleft w3-container w3-padding w3-text-white">Mosqué</div>
      </div>
      
      <div id="img4" class="picture w3-display-container" style="display:none">
        <img src="image4.jpg" alt="img4" style="width:100%">
        <span onclick="this.parentElement.style.display='none'" 
        class="w3-display-topright w3-button w3-transparent w3-text-white">&times;</span>
        <div class="w3-display-bottomleft w3-container w3-padding w3-text-white">culture</div>
      </div>
    </div>
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
            <div class="blog-author d-flex align-items-center">
              <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
             <div id="article">
                <h4>Mari Donal</h4>
                <div class="social-links">
                    <a class="text-light" href="https://fb.com" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                </div>
                <p>
                    <h5>L'art regroupe les oeuvres humaines destinees à toucher les sens et les émotions du public</h5>  
                </p>
              </div>
            </div>
            
            <div class="blog-comments">

              <h4 class="comments-count"id="comment">Commentaires</h4>
              <div id="comment-2" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan, 2020</time>
                    <p>
                      Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                    </p>
                  </div>
                </div>

                <div id="comment-reply-1" class="comment comment-reply">
                  <div class="d-flex">
                    <div class="comment-img"><img src="assets/img/blog/comments-3.jpg" alt=""></div>
                    <div>
                      <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                      <time datetime="2020-01-01">01 Jan, 2020</time>
                      <p>
                        Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.

                        Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.

                        Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.
                      </p>
                    </div>
                  </div>

                  <div id="comment-reply-2" class="comment comment-reply">
                    <div class="d-flex">
                      <div class="comment-img"><img src="assets/img/blog/comments-4.jpg" alt=""></div>
                      <div>
                        <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                        <time datetime="2020-01-01">01 Jan, 2020</time>
                        <p>
                          Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                        </p>
                      </div>
                    </div>

                  </div><!-- End comment reply #2-->

                </div><!-- End comment reply #1-->

              </div><!-- End comment #2-->
              
                

            </div><!-- End blog comments -->

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
                  <a class="w3-bar-item w3-button" href="listeartmon.php">monumens</a>
                  <a class="w3-bar-item w3-button" href="listeartlvr.php">livres</a>
                  <a class="w3-bar-item w3-button" href="listeartville.php">villes</a>
                  </div>
               </div>
            </div>
            <div class="w3-container">
              <h5>Déplacez la souris sur "localisation" ou "citation":</h5>
            
              <div class="w3-dropdown-hover">localisation
                <div class="w3-dropdown-content w3-card-4" style="width:250px">
                  <img src="image7.png" alt="London" style="width:100%">
                  <div class="w3-container">
                    <p>c'est une zone de la gouvernement Arina une des quatre gouvernements de la grande tunis</p>
                    <p>C'est la ou se déroule nos heures d'étude à esprit </p>
                  </div>
                </div>
              </div>
              
              <div class="w3-dropdown-hover">citation
                <div class="w3-dropdown-content w3-card-4" style="width:250px">
                  <img src="image8.png" alt="Tokyo" style="width:100%">
                  <div class="w3-container">
                    <p>notre groupe est notre identitée</p>
                    <p>il est composé par six membres</p>
                  </div>
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
<script>

       document.getElementById('artBtn').addEventListener('submit', function (event) {
    var category = document.getElementById('cat').value;
    var title = document.getElementById('title').value;
        var artistName = document.getElementById('nom').value;
    var articleContent = document.getElementById('art').value;

    // Reset error messages
    document.getElementById('msg3').textContent = '';
    document.getElementById('msg4').textContent = '';
    document.getElementById('msg7').textContent = '';
    document.getElementById('msg8').textContent = '';
  
    // Check if category is selected
    if (category === '') {
        document.getElementById('msg3').textContent = 'vous devez selectionner une categorie*.';
        event.preventDefault();
    }

    // Check if title is filled and contains only alphabetic characters
    if (title === '' || !/^[a-zA-Z]+$/.test(title)) {
        document.getElementById('msg4').textContent = 'entrer un titre valide seulement avec des lettes alphabitiques*.';
        event.preventDefault();
    }

    // You can add more validation for date fields, and other fields as needed

    // Check if artist name is filled and contains only alphabetic characters
    if (artistName === '' || !/^[a-zA-Z]+$/.test(artistName)) {
        document.getElementById('msg7').textContent = 'entrer un nom valide seulement avec des lettes alphabitiques*.';
        event.preventDefault();
    }

    // Check if article content is filled
    if (articleContent === '') {
        document.getElementById('msg8').textContent = 'cette entrer est obligatoire*.';
        event.preventDefault();
    }
});


</script>


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
  

    