<?php
//https://codeigniter4.github.io/userguide/index.html

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('page_title', true) ?></title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')  ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/site.css')  ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome/css/font-awesome.min.css')  ?>">

</head>
<body>
<!-- HEADER: MENU + HEROE SECTION -->
<header>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Ticketing System 1.0</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            System
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="/inventory/products">Products</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <?php if (session('logged_in')) { ?>
                                <li><a class="dropdown-item" href="/login">Login</a></li>
                            <?php }else{ ?>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success text-white" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
<!-- CONTENT -->
<div class="container-fluid">
    <?= $this->renderSection('content') ?>
</div>
<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<footer class="footer-bs">
    <div class="copyrights">
        <p>&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
            open source licence.</p>
    </div>
    <script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</footer>
</body>
</html>
