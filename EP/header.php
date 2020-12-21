<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EP SHOP</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- OwlCarousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <?php
        require ('functions.php');
    ?>

</head>
<body>

<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-primary font-size-12 text-black-50">Večna pot 113, 1000 Ljubljana</p>
        <div class="d-flex font-primary font-size-14">
            <?php
                if (isset($_SESSION["useruid"])){
                    echo "<p class=\"px-3 border-right text-dark\">Hello ".$_SESSION["useruid"]."</p>";
                    echo "<a href=\"editProfile.php\" class=\"px-3 text-dark\">Edit profile</a>";
                    echo "<a href=\"Template/includes/logout.inc.php\" class=\"px-3 text-dark\">Log Out</a>";
                }
                else{
                    echo "<a href=\"login.php\" class=\"px-3 border-right text-dark\">Log in</a>";
                    echo "<a href=\"signup.php\" class=\"px-3 text-dark\">Sign Up</a>";
                }
            ?>

        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark color-secondary-bg">
        <a class="navbar-brand" href="index.php"><i class="fab fa-shopware"></i> EP SHOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto font-primary">

                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="list.php">Products</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
            </ul>
            <form action="#" class="font-size-14 font-primary">
                <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product ->getDataCurrent('cart', $_SESSION["userid"] ?? 1)); ?></span>
                </a>
            </form>
        </div>
    </nav>
</header>

<main id="main-site">