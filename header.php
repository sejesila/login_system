<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();


$DB_HOST=$_ENV['DB_HOST'];
$DB_USER=$_ENV['DB_USER'];
$DB_PASS=$_ENV['DB_PASS'];
$DB_NAME=$_ENV['DB_NAME'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login System</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"  />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.php">Demo App</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Portfolio</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contact</a></li>
                <?php
                if (isset($_SESSION['useruid'])){
                    echo " <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='profile.php'>Profile</a></li>";
                    echo " <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='includes/logout.inc.php'>Logout</a></li>";
                }
                else{
                    echo " <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='signup'>Sign Up</a></li>";
                    echo " <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='login'>Login</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>