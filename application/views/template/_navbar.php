<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>./css/footer.css">
    <link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>./css/navbar.css">
    <link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>icon/css/font-awesome.min.css">

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/joursite/') ?>./img/icon (2).png">
    <?php foreach ($konfig as $knfg) { ?>
        <title><?= $knfg['judul_website'] ?></title>
    <?php } ?>
</head>

<body>

    <!-- Navbar Section Start -->
    <?php $menu = $this->uri->segment(1); ?>
    <nav>
        <div class="blur"></div>
        <div class="navbar">
            <a href="<?= base_url('gallery') ?>" target="_blank">
                <div class="logo"><img src=" <?= base_url('assets/joursite/') ?>./img/logo.png" alt="" srcset=""></div>
            </a>
            <div class="nav-links">
                <ul id="menu">
                    <i class="fa fa-times" onclick="closemenu()"></i>
                    <li><a href="<?= base_url('home') ?>" class="<?php if ($menu == 'home') echo 'active';
                                                                    if ($menu == '') echo 'active'; ?>">Beranda</a></li>
                    <li><a href="<?= base_url('journews') ?>" class="<?php if ($menu == 'journews') echo 'active'; ?>">JourNews</a></li>
                    <li><a href="<?= base_url('joursay') ?>" class="<?php if ($menu == 'joursay') echo 'active'; ?>">JourSay</a></li>
                    <li><a href="<?= base_url('tentang') ?>" class="<?php if ($menu == 'tentang') echo 'active'; ?>">Tentang</a></li>

                </ul>
                <i class="fa fa-bars" onclick="openmenu()"></i>
            </div>
        </div>
    </nav>

    <script>
        let menu = document.getElementById("menu");

        function openmenu() {
            menu.style.right = "0";
        }

        function closemenu() {
            menu.style.right = "-200px";
        }
    </script>