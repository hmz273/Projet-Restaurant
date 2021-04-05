<?php include('config/constants.php'); ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>Responsive website food</title>
    </head>
    <body>

        <!--========== SCROLL TOP ==========-->
        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-chevron-up scrolltop__icon'></i>
        </a>

        <!--========== HEADER ==========-->
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="#" class="nav__logo">Logo</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="<?php echo SITEURL; ?>#home" class="nav__link active-link">Home</a></li>
                        <li class="nav__item"><a href="<?php echo SITEURL; ?>#about" class="nav__link">About</a></li>
                        <li class="nav__item"><a href="<?php echo SITEURL; ?>#services" class="nav__link">Services</a></li>
                        <li class="nav__item"><a href="<?php echo SITEURL; ?>#menu" class="nav__link">Menu</a></li>
                        <li class="nav__item"><a href="<?php echo SITEURL; ?>#contact" class="nav__link">Contact us</a></li>
                        <li class="nav__item"><a href="<?php echo SITEURL; ?>admin/login.php" class="nav__link">Login</a></li>
                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>