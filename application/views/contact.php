<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/styles/navbar.css">
    <link rel="stylesheet" href="assets/styles/contact.css">

</head>

<body>

<main class="container">

    <nav class="sidebar">
        <div class="logo">
            <img src="assets/img/logo.png" alt="logo" class="logoimg">
            <h1>Tasklist</h1>
        </div>
        <div class="menu">
            <a href="<?php echo base_url('overview')?>"><i class="fa fa-home"></i></a>
            <a href="<?php echo base_url('tasklist')?>"><i class="fa-solid fa-square-check"></i></a>
            <a href="<?php echo base_url('contact')?>" class="active"><i class="fa fa-user"></i></a>
            <a href="<?php echo base_url('home')?>"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </nav>
        
    <div class="content">

        <div class="header">
            <img src="assets/img/logo.png" alt="logo" class="logoimg">
            <h1>Contact Us</h1>
            <div class="openMenu" id="menuIcon">
                <i class="fa-solid fa-bars"></i>
                <ul class="nav-list">
                    <li><a href="<?php echo base_url('overview')?>"><i class="fa fa-home"></i></a></li>
                    <li><a href="<?php echo base_url('tasklist')?>"><i class="fa-solid fa-square-check"></i></a></li>
                    <li><a href="<?php echo base_url('contact')?>" class="active"><i class="fa fa-user"></i></a></li>
                    <li><a href="<?php echo base_url('home')?>"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                </ul>
            </div>
        </div>
        <hr/>

        <!-- Contact -->
        <div class="contact">

            <div class="contact_address">
                
                <div class="address">
                    <i class="fa-solid fa-phone"></i>
                    <p>+66 123456789</p>
                </div>

                <div class="address">
                    <i class="fa-light fa-at"></i>
                    <p>contact@tasklist.com</p>
                </div>

            </div>

        </div>

    </div>

</main>

<script src="assets/js/sidebar.js"></script>

</body>
</html>