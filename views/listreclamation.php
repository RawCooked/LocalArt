<?php
include "../controller/reclamationc.php";

$c = new reclamationC();
$tab = $c->listreclamation();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <!-- Add your CSS and other head elements here -->
    <!-- ... -->

    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">








    
</head>

<body>
    
    <style>
    /* Reset some default styles */
    body,
    h1,
    h2,
    h3,
    p,
    ol,
    ul {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
        line-height: 1.6;
    }

    /* Style du titre principal */
    h1 {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    /* Style du conteneur principal */
    .container {
        display: flex;
        flex-direction: column;
        margin: 3%;
        border: 1px solid darkgray;
        border-radius: 5px;
        padding: 30px;
    }

    /* Style de la table */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    /* Style des en-têtes de colonnes */
    .table th {
        background-color: #f2f2f2;
        padding: 10px;
        text-align: left;
    }

    /* Style des cellules de données */
    .table td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    /* Style du bouton supprimer */
    .button-delete {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
    }

    .button-delete:hover {
        background-color: #c82333;
    }

    /* Style de la navigation breadcrumb */
    .breadcrumb {
        background-color: #f8f9fa;
        padding: 8px 15px;
        border-radius: 5px;
    }

    /* Style du pied de page */
    .footer {
        text-align: center;
        margin-top: 20px;
        padding: 10px;
        background-color: #f2f2f2;
    }

    /* Ajoutez d'autres styles au besoin */
    </style>




    <center>
        <h1>Voici la liste des réclamations</h1>
        <!--
        <h2><a href="addreclamation.php">Ajouter une réclamation</a></h2>
-->
    </center>

    <div
        style="display: flex; flex-direction:column; margin: 3%; border-width: 1px; border-color:darkgray; border-radius: 5px; border-style: solid; padding: 30px;">
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Data Tables</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Tables</li>
                        <li class="breadcrumb-item active">Data</li>
                        <li class="breadcrumb-item">statistique</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Datatables</h5>
                                <p>Add lightweight datatables to your project with using the <a
                                        href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                        DataTables</a> library. Just add <code>.datatable</code> class name to any table
                                    you wish to convert to a datatable</p>

                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">id_rec</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">sujet</th>
                                            <th scope="col">texte</th>
                                            <th scope="col">modifier</th>
                                            <th scope="col">supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tab as $reclamation) { ?>
                                        <tr>
                                            <td><?= $reclamation['id_rec']; ?></td>
                                            <td><?= $reclamation['nom']; ?></td>
                                            <td><?= $reclamation['sujet']; ?></td>
                                            <td><?= $reclamation['texte']; ?></td>
                                            <td>
                                                <form method="POST" action="updatereclamation.php">
                                                    <input type="submit" name="update" value="modifier">
                                                    <input type="hidden" value=<?PHP echo $reclamation['id_rec']; ?>
                                                    name="id_rec">
                                                </form>
                                            </td>
                                            <td>
                                                <button> <a
                                                        href="deletereclamation.php?id_rec=<?= $reclamation['id_rec']; ?>">supprimer</a></button>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main><!-- End #main -->
    </div>

    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>