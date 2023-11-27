<?php
// Start the session
session_start();

include 'C:/xampp/htdocs/LocalArt/Controller/userC.php';


if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

} else {
    header('Location: login.php');
    exit;
}

$user1 = new userC();
$userActual = $user1->getUserById($userId);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop - About Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
    <style>

        @import url(https://fonts.googleapis.com/css?family=Cormorant+Garamond);

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html {
            font-family: "Cormorant Garamond", serif;
            text-transform: uppercase;
            box-sizing: inherit;
            font-size: 10.5px;
            letter-spacing: 1px;
            text-shadow: 0 0 2px rgba(0, 0, 0, .5),
            -1px -1px 1px rgba(179, 179, 179, .5),
            1px 1px 0 rgba(255, 255, 255, 0.55),
            0 1px 3px white;
            overflow: hidden;
            color: #191919;
            background-color: azure;
        }

        button {
            display: block;
            position: relative;
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            text-transform: inherit;
            letter-spacing: inherit;
            text-shadow: inherit;
            cursor: pointer;
            outline: inherit;
            z-index: 10;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .big {
            font-size: 150%;
        }

        .med {
            font-size: 100%;
            letter-spacing: .5px;
        }

        .small {
            font-size: 65%;
            letter-spacing: .5px;
        }

        .no-space {
            letter-spacing: 0px;
        }

        .card {
            background-color: #f4f1eb;
            background-image: url("https://www.transparenttextures.com/patterns/paper-fibers.png");
            height: 200px;
            width: 350px;
            margin: 20vh auto 0 auto;
            padding: 20px 10px 10px 10px;
            transform: rotateX(60deg) rotateY(0deg) rotateZ(45deg);
            /*transform-origin: 50% 100%;*/
            box-shadow: 0;
            transition: transform .4s ease,
            box-shadow .4s ease;
        }

        .card:hover {
            cursor: pointer;
            transform: rotateX(60deg) rotateY(0deg) rotateZ(45deg) translateZ(10px);
            box-shadow: 20px 20px 20px rgba(0, 0, 0, .4);
        }

        .card:focus {
            transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg) translateZ(10px);
            box-shadow: 0px 10px 10px rgba(0, 0, 0, .4);
        }

        .card:focus::before {
            transform: skewX(0deg) translateX(0px) translateY(0px);
            height: 0px;
        }

        .card:focus::after {
            transform: skewY(0deg) translateX(0px) translateY(0px);
            width: 0px;
        }

        .card::before,
        .card::after {
            content: "";
            position: absolute;
            display: block;
            background-color: grey;
            transition: transform .4s ease,
            height .4s ease,
            width .4s ease;
        }

        .card::before {
            width: 100%;
            height: 6px;
            bottom: 0;
            left: 0;
            transform: skewX(45deg) translateX(-3px) translateY(6px);
        }

        .card::after {
            height: 100%;
            width: 6px;
            top: 0;
            right: 0;
            transform: skewY(45deg) translateX(6px) translateY(-3px);
        }

        .row {
            display: block;
            text-align: center;
        }

        .row:nth-child(2) {
            margin: 35px 0 50px 0;
        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        p {
            margin: 0;
        }
    </style>
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
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

    <!-- open Banner -->
    <div style="height: 3000">
    <button class="card">
        <div class="row clearfix">
            <div class="left big">212 555 6342</div>
            <div class="right"><p><span class="big">P</span>ierce &amp; <span class="big">P</span>ierce</p><p><span class="med no-space">M</span><span class="small no-space">ergers and </span><span class="med no-space">A</span><span class="small no-space">cquisitions</span></p></div>
        </div>
        <div class="row">
            <p><span class="big">P</span>atrick <span class="big">Bateman</span></p>
            <p><span class="big">V</span>ice <span class="big">P</span>resident</p>
        </div>
        <div class="row">
            <p><span class="med">358 E</span><span class="small">xchange </span><span class="med">P</span><span class="small">lace </span><span class="med">N</span><span class="small">ew </span><span class="med">Y</span><span class="small">ork</span><span class="med">, N. Y. 10099 F</span><span class="small">ax </span><span class="med">212 555 6390 T</span><span class="small">elex </span><span class="med">10 4534</span>
            </p>
        </div>
    </button>
    </div>
    <!-- Close Banner -->


    <!-- Start Footer -->
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
                            <a rel="nofollow" class="text-light text-decoration-none" target="_blank" href="http://fb.com/templatemo"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
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
                            | Designed by <a rel="sponsored" href="https://templatemo.com/page/1" target="_blank">TemplateMo</a>
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
    <script>

    </script>
    <!-- End Script -->
</body>


</html>