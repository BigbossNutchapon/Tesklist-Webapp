<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasklist</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- custom js links -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/overview.css">

</head>
<body>
    <main class="container">
        <nav class="sidebar">
            <div class="logo">
                <img src="assets/img/logo.png" alt="logo" class="logoimg">
                <h1>Tasklist</h1>
            </div>
            <div class="menu">
                <a href="<?php echo base_url('overview')?>" class="active"><i class="fa fa-home"></i></a>
                <a href="<?php echo base_url('tasklist')?>"><i class="fa-solid fa-square-check"></i></a>
                <a href="<?php echo base_url('contact')?>"><i class="fa fa-user"></i></a>
                <a href="<?php echo base_url('home')?>"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </nav>
        <div class="content">
            <div class="header">
                <img src="assets/img/logo.png" alt="logo" class="logoimg">
                <h1>Welcome</h1>
                <h1 id="overview">Overview</h1>
                <div class="openMenu" id="menuIcon">
                    <i class="fa-solid fa-bars"></i>
                    <ul class="nav-list">
                        <li><a href="<?php echo base_url('overview')?>"><i class="fa fa-home"></i></a></li>
                        <li><a href="<?php echo base_url('tasklist')?>" class="active"><i class="fa-solid fa-square-check"></i></a></li>
                        <li><a href="<?php echo base_url('contact')?>"><i class="fa fa-user"></i></a></li>
                        <li><a href="<?php echo base_url('home')?>"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                    </ul>
                </div>
            </div>
            <hr/>
            <h2 class="sub-heading">Overview</h2>     
                

            <section>
                <div class="circles-container">
                    <!-- <div class="circle"> -->
                        <svg width="134" height="134">
                            <circle cx="50%" cy="50%" r="50%" fill="#FFA59D" />
                            <text id="today" fill="black" font-weight="600" font-size="60" text-anchor="middle" alignment-baseline="middle" x="50%" y="50%"></text>
                        </svg>
                    <!-- </div> -->
                    <!-- <div class="circle"> -->
                        <svg width="134" height="134">
                            <circle cx="50%" cy="50%" r="50%" fill="#95B8F3" />
                            <text id="pending" fill="black" font-weight="600" font-size="60" text-anchor="middle" alignment-baseline="middle" x="50%" y="50%"></text>
                        </svg>
                    <!-- </div> -->
                    <!-- <div class="circle"> -->
                        <svg width="134" height="134">
                            <circle cx="50%" cy="50%" r="50%" fill="#CBE3B3" />
                            <text id="done" fill="black" font-weight="600" font-size="60" text-anchor="middle" alignment-baseline="middle" x="50%" y="50%"></text>
                        </svg>
                    <!-- </div> -->
                    <h1>Today</h1>
                    <h1>Pending</h1>
                    <h1>Done</h1>
                </div>
                <div class="doughnut">
                    <canvas id="myDoughnut" style="height: 25rem;">
                    </canvas>
                    <h1>Weekly</h1>
                    <h2 id="tasks"></h2>
                    <h2 id="finished"></h2>
                </div>
            </section>
        </div>

            
    </main>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="assets/js/overviewPage/chart.js"></script>
    <script src="assets/js/sidebar.js"></script>
</body>
</html>

