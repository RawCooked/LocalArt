
<?php

include '../Controller/reclamationc.php';
include '../model/reclamation.php';
$error = "";

// create client
$reclamation = null;
// create an instance of the controller
$reclamationC = new reclamationC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["sujet"]) &&
    isset($_POST["texte"]) 
    
    
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["sujet"]) &&
        !empty($_POST["texte"]) 
        
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $reclamation = new reclamation(
            null,
            $_POST['nom'],
            $_POST['sujet'],
            $_POST['texte']
            
        );

        var_dump($reclamation);
        $reclamationC->updateJoueur($reclamation, $_POST['id_rec']);
       // $reclamationC->updatereclamation($reclamation, $_POST['id_rec']);

        header('Location:listreclamation.php');
    } else
        $error = "Missing information";
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
    
    <link rel="stylesheet" href="assets/css/custom.css">
   

    <!-- Load fonts style after rendering the layout styles -->
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    
    <link rel="stylesheet" href="assets/css/fontawesome.min.css"> 


</head>

<body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">
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

            <a class="navbar-brand text-success logo h1 align-self-center" style="color: red;" href="index.html">
                LocalArt
            </a>
            </div>
                  
    </nav>
   

    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            
    

            <h1 id="contactText" class="h1">modifier votre reclamations</h1>
            
            
            <p>
              le client est le roi 
            </p>
            


        </div>
    </div>




   <!-- <a href="listreclamation.php"></a>-->
   <a href="listereclamation.php"></a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <?php
    if (isset($_POST['id_rec'])) {
        $reclamation = $reclamationC->showreclamation($_POST['id_rec']);
    }
        
    ?>




    <div class="container py-5">
        <div class="row py-5">
        <form  class="col-md-9 m-auto" method="post" role="form" id="myForm"  novalidate >
    <div class="row">
        <div class="col-md-6 form-container slide-from-left">
            
            <div  class="form-group" >
                
                <label for="inputname">nom</label>
                
                <input type="text" id="nom" name="nom" value="<?php echo $reclamation['nom']; ?>" />
    <span id="erreurnom" style="color: red"></span>
                
                
            </div>
        
           
        
            <div class="form-group">
                <label for="inputsubject">Sujet</label>
                
                <select class="form-control" id="sujet" name="sujet">
        <option value="Signaler un texte abus" <?php echo ($reclamation['sujet'] == 'Signaler un texte abus') ? 'selected' : ''; ?>>Signaler un texte abus</option>
        <option value="Signaler un problème" <?php echo ($reclamation['sujet'] == 'Signaler un problème') ? 'selected' : ''; ?>>Signaler un problème</option>
        <option value="Autres" <?php echo ($reclamation['sujet'] == 'Autres') ? 'selected' : ''; ?>>Autres</option>
    </select>
    <span id="erreursujet" style="color: red"></span>
        </div>
            <div class="form-group">
            <label for="texte">texte</label>
            <input type="text" id="texte" name="texte" value="<?php echo $reclamation['texte']; ?>" />
    <span id="erreurtexte" style="color: red"></span>
            </div>

        
            <br>
            <br>
            <br>
            <input type="hidden" name="id_rec" value="<?php echo $reclamation['id_rec']; ?>" />
            
            <button  type="submit" class="btn btn-success btn-lg px-3" >modifier</button>
            
            
        </div>
        <div class="col-md-6">
        <img id="titre" src="image/img.jpg" alt="image" class="img slide-from-right" width="100%" height = "99%">
        </div>
    </div>

</form>

           
        </div>
    </div>

    <!-- Start Script -->
    
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/contact.js"></script>
    

    
    <!-- End Script -->
  
</body>


</html>








