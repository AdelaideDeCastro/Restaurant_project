<!DOCTYPE html>
<html>
<head>
    <!-- <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->

    <?php wp_head(); ?>

</head>

<body>
<header class="bg-secondary position-sticky">
    <div class="container">
        <div class="d-flex py-2">
            <div class="logo mr-auto text-center">
                <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="logo" alt="Bacco Perbacco logo">
                </a>
                <h3 class="text-primary">Bacco Perbacco</h3>
            </div>
            <div class="align-self-center">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about_us.html">Over ons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.html">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="wijn.html">Wijnen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.html">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nieuws.html">Nieuws</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>