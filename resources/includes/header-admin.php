<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Template 2106 Soft Landing http://www.tooplate.com/view/2106-soft-landing -->
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/css/tooplate-style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-size: 15px;
        }
    </style>
</head>

<body>

<?php if (isset($_SESSION['logged'])): ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">

    <a href="/home" class="navbar-brand mb-0 h1">Landing Page</a>

    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <li class="nav-item"><a class="nav-link" href="/admin">Home Admin</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/contact">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/testimonial">Testimonial</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/newsletter">Newsletter</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/portfolio">Portfolio</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/services">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/team">Team</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/users">Users</a></li>
        </ul>

        <?php if ($_SERVER['PATH_INFO'] !== '/login'): ?>
            <span class="navbar-text"><a href="/logout" class="text-warning">Logout</a></span>
        <?php endif; ?>

    </div>

</nav>

<?php endif; ?>