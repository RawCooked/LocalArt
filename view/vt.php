<?php
include '../Controller/articleA.php';
include '../model/article.php';
include '../model/comment.php';
$error = "";

// create client
$article = null;
// create an instance of the controller
$articleA = new articleA();

if (
    isset($_POST["categorie"]) &&
    isset($_POST["titre"]) &&
    isset($_POST["nomprenom_artiste"]) &&
    isset($_POST["contenu"])
) {
    if (
        !empty($_POST['categorie']) &&
        !empty($_POST["titre"]) &&
        !empty($_POST["nomprenom_artiste"]) &&
        !empty($_POST["contenu"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }

        $article = new articleA(
            null,
            $_POST['categorie'],
            $_POST['titre'],
            $_POST['nomprenom_artiste'],
            $_POST['contenu']
        );

        var_dump($article);

       
        if (isset($_POST['updateArticleId'])) {
            $articleId = $_POST['id_art'];
            $categorie = $_POST['categorie'];
            $titre = $_POST['titre'];
            $nomprenom_artiste = $_POST['nomprenom_artiste'];
            $contenu = $_POST['contenu'];
            // Add proper error handling
            if (!$articleA->updateArticle($articleId, $categorie, $titre, $nomprenom_artiste, $contenu)) {
                echo "Error updating article.";
            }
        }

        header('Location: listartvt.php ');
        exit(); // Stop further execution after the redirect
    }

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ajout'])) {
            $comment = $_POST['comment'];
            $nom = $_POST['nom'];
            $date_creation = date("Y-m-d H:i:s");
            $date_modification = $date_creation;
            $commente= new commentC;
            $commente->addcomment(NULL,$comment,$nom, $date_creation,$date_modification);
            header('Location: listartvt.php ');
            exit;

    }
    $commente= new commentC;
    if (isset($_POST['deletecommentId'])) {
        $commentId = $_POST['deletecommentId'];
        // Add proper error handling
        if (!$commente->deletecomment($commentId)) {
            echo "Error deleting article.";
        }
        
    }
    elseif (isset($_POST['updatecommentId'])) {
        $commentId = $_POST['id_cmnt'];
        $comment = $_POST['comment'];
        $nom = $_POST['nom'];
        $date_modification = date("Y-m-d H:i:s");
        $commente->updatecomment($commentId,$comment,$nom,$date_modification);
        
    }
        

    
          
}


$com = new commentC();
//$articleId = $_POST['id_art'] ?? null;
$cm = $com->listcomments();
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
    
    
  
      <br>   
    <button><a href="listearttab.php">Back to list</a></button>
    <br>

    <?php
    if (isset($_POST['id_art'])) {
        $article = $articleA->showArticle($_POST['id_art']);
    ?>
    <style >
    .city {display:none}
    </style>
    <body>
    
    <div class="w3-container">
    <h2>cliquer sur ce bouton:</h2>
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Update</button><br>
    
    <div id="id01" class="w3-modal" >
     <div class="w3-modal-content w3-card-4 w3-animate-zoom">
      <header class="w3-container w3-green"> 
       <span onclick="document.getElementById('id01').style.display='none'" 
       class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
       <h2>Header</h2>
      </header>
    
      <div class="w3-bar w3-border-bottom">
      <button onclick="openUpdateForm(<?php echo $article['id_art']; ?>)" class="tablink w3-bar-item w3-button" >article</button>
       <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'updateForma')">Changer</button>
      </div>
      <style>
      form label {
    display: block;
    margin-bottom: 10px;
}

form input,
form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

form input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}
           </style>
 
      <div id="updateForma" class="w3-container city">
      <table>
            <tr id="updateForm<?php echo $article['id_art']; ?>" style="display: none;">
                <td colspan="6">
                    <form method="POST" action="" id="upd">
                        <input type="hidden" value=<?PHP echo $article['id_art']; ?> name="id_art">
                        <label>Categorie:</label>
                        <input type="text" id="cat" name="categorie" value="<?php echo $article['categorie']; ?>"><br>
                        <span id="msg1" style="color: red" ></span>
                        <label>Titre:</label>
                        <input type="text" id="title" name="titre" value="<?php echo $article['titre']; ?>"><br>
                        <span id="msg2" style="color: red" ></span>
                        <label>Nom complet de l'artiste:</label>
                        <input type="text" id="nom" name="nomprenom_artiste" value="<?php echo $article['nomprenom_artiste']; ?>"><br>
                        <span id="msg3" style="color: red" ></span>
                        <label>Contenu:</label>
                        <textarea id="art" name="contenu"><?php echo $article['contenu']; ?></textarea><br>
                        <span id="msg4" style="color: red" ></span>
                        <input type="submit" name="updateArticleId" value="Update">
                    </form>
                </td>
            </tr>
        </table>
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
        

        <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8 entries">
                <br>
                <div class="blog-author d-flex align-items-center">
                    <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                    <div id="article">
                        <h4><?= htmlspecialchars($article['nomprenom_artiste']); ?></h4>
                        <div class="social-links">
                            <a class="text-light" href="https://fb.com" target="_blank" rel="sponsored">
                                <i class="fab fa-facebook-f fa-sm fa-fw me-2"></i>
                            </a>
                            <a class="text-light" href="https://www.instagram.com/" target="_blank">
                                <i class="fab fa-instagram fa-sm fa-fw me-2"></i>
                            </a>
                        </div>
                        <p>
                            <div class="w3-panel w3-pale-green">
                                <h1 class="w3-opacity">
                                    <b><?= htmlspecialchars($article['titre']); ?></b>
                                </h1>
                            </div>
                            <pw>
                                <?= insertLineBreaks($article['contenu'], 40); ?>
                            </pw>
                        </p>
                    </div>
                </div>
                <?php foreach ($cm as $index => $commentaire) { ?>
                    <div class="blog-comments">
    <div id="comment-<?php echo $index; ?>" class="comment">
        <div class="d-flex">
            <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt=""></div>
            <div>
                <h5><a href=""><?= $commentaire['nom']; ?></a></h5>
                <p><?= $commentaire['comment']; ?></p>
                <div>Ajouter Le <?= date_format(date_create($commentaire['date_creation']), 'd/m/Y à H:i') ;?></div>
                <?php if ($commentaire['date_creation'] < $commentaire['date_modification']) { ?>
                    <div>Modifié Le <?= date_format(date_create($commentaire['date_modification']), 'd/m/Y à H:i');?> </div> 
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<table>
                <tr>
                    <td>
                    <button onclick="openUpdateFormc(<?php echo $commentaire['id_cmnt']; ?>)">Update</button>
                    </td>
                    <td>
                    <form method="POST" action="">
                        <input type="hidden" value=<?PHP echo $commentaire['id_cmnt']; ?> name="deletecommentId">
                        <button name="delete_button" type="submit"class="w3-container w3-red" onclick="return confirm('Voulez-vous vraiment supprimer ce commentaire?');">Delete</button>
                    </form>
                    </td>
                </tr>
                <tr id="updateFormc<?php echo $commentaire['id_cmnt']; ?>" style="display: none;">
                <td colspan="6">
                    <form method="POST" action="">
                        <input type="hidden" value=<?PHP echo $commentaire['id_cmnt']; ?> name="id_cmnt">
                        <label>Nom:</label>
                        <input type="text"  name="nom" value="<?php echo $commentaire['nom']; ?>"><br>
                        <label>Contenu:</label>
                        <textarea  name="comment"><?php echo $commentaire['comment']; ?></textarea><br>
                        <input type="submit" name="updatecommentId" value="Update">
                    </form>
                </td>
            </tr>
            
            </table>
<?php } ?>

                <div class="blog-comments">
                    <h4 class="comments-count" id="comment">Commentaires</h4>

                    <div class="reply-form" >
                
                  <h4 id="ajcmnt">Ajouter un commentaire</h4>
                  <form action="" method="POST" id="myBtn">
                    
                      <div class="col-md-6 form-group">
                        <input id="noun" name="nom" type= "text" class="w3-panel w3-border w3-border-red w3-hover-border-green" placeholder="Votre nom*" > 
                        <span id="msg5" style="color: red" ></span>
                      </div>
                    
                      <div class="col form-group">
                      <textarea id="cmnt" name="comment" class="w3-panel w3-border w3-border-red w3-hover-border-green" placeholder="Votre commentaire*" autocomplete="off"></textarea>
                        <span id="msg6" style="color: red" ></span>
                      </div>
                      <button id="client" type="submit" name="ajout" value="Save" class="btn btn-primary" style="background-color:green;" >Poster commentaire</button>
                      
                  </form>
  
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function submitForm() {
        // Add your form submission logic here
        // Return false to prevent the form from submitting traditionally
        return false;
    }
</script>
<script>
    function openUpdateFormc(commentId) {
            // Hide all update forms
            document.querySelectorAll('[id^="updateFormc"]').forEach(function two (form) {
                form.style.display = 'none';
            });

            // Show the selected update form
            document.getElementById('updateFormc' + commentId).style.display = 'table-row';
        }
</script>
    <script>
        function openUpdateForm(articleId) {
            // Hide all update forms
            document.querySelectorAll('[id^="updateForm"]').forEach(function (form) {
                form.style.display = 'none';
            });

            // Show the selected update form
            document.getElementById('updateForm' + articleId).style.display = 'table-row';
        }
        <?php }?>
    </script>

    <?php
    function insertLineBreaks($text, $lineLength)
    {
        // Insert a line break after every $lineLength characters
        return wordwrap($text, $lineLength, "<br>", true);
    }
    ?>
    <script>

    document.getElementById('myBtn').addEventListener('submit', function (event) {
        var nom = document.getElementById('noun').value;
        var commentaire = document.getElementById('cmnt').value;

        document.getElementById('msg5').textContent = '';
        document.getElementById('msg6').textContent = '';

        if (nom.trim() === '') {
            document.getElementById('msg5').textContent = 'Le champ du nom ne peut pas être vide.';
            event.preventDefault();
        } else if (!/^[a-zA-Z ]+$/.test(nom)) {
            document.getElementById('msg5').textContent = 'Entrer un nom valide avec des lettres alphabétiques et des espaces.';
            event.preventDefault();
        }

        if (commentaire.trim() === '') {
            document.getElementById('msg6').textContent = 'Le champ du commentaire ne peut pas être vide.';
            event.preventDefault();
        }
    });
</script>

</script>
<script>

       document.getElementById('upd').addEventListener('submit', function (event) {
    var category = document.getElementById('cat').value;
    var title = document.getElementById('title').value;
        var artistName = document.getElementById('nom').value;
    var articleContent = document.getElementById('art').value;

    // Reset error messages
    document.getElementById('msg1').textContent = '';
    document.getElementById('msg2').textContent = '';
    document.getElementById('msg3').textContent = '';
    document.getElementById('msg4').textContent = '';
  
    // Check if category is selected
    if (category === '') {
        document.getElementById('msg1').textContent = 'vous devez selectionner une categorie*.';
        event.preventDefault();
    }

    // Check if title is filled and contains only alphabetic characters
    if (title === '' || !/^[a-zA-Z]+$/.test(title)) {
        document.getElementById('msg2').textContent = 'entrer un titre valide seulement avec des lettes alphabitiques*.';
        event.preventDefault();
    }

    // You can add more validation for date fields, and other fields as needed

    // Check if artist name is filled and contains only alphabetic characters
    if (artistName === '' || !/^[a-zA-Z]+$/.test(artistName)) {
        document.getElementById('msg3').textContent = 'entrer un nom valide seulement avec des lettes alphabitiques*.';
        event.preventDefault();
    }

    // Check if article content is filled
    if (articleContent === '') {
        document.getElementById('msg4').textContent = 'cette entrer est obligatoire*.';
        event.preventDefault();
    }
});




</script>
    
    

</body>

</html>