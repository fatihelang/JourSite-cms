<?php require_once('template/_navbar.php') ?>
<link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>./css/header.css">
<link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>./css/style.css">
<!-- Page Title Section Start-->
<div class="page-header">
    <h1>Jour<span>Say</span></h1>
    <!-- Laptop and Tablet Search Bar -->
    <input type="checkbox" id="checkSay">
    <div class="box boxSay">
        <form action="<?= base_url('joursay/search') ?>" method="get">
            <div class="search-box">
                <input type="text" name="search" placeholder="Cari sesuatu?">
                <button type="submit" style="opacity: 0;">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>

                <label for="checkSay" class="icon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </label>
            </div>
        </form>
    </div>
    <!-- Android -->
    <div class="android-box">
        <form action="<?= base_url('JourSay/search') ?>" method="get">
            <div class="search">
                <input type="text" class="search-holder" name="search" placeholder="Cari sesuatu?">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<?php if (isset($joursay) && !empty($joursay) && isset($_GET['search']) && !empty($_GET['search'])) { ?>
    <?php $searchTerm = $_GET['search']; ?>
    <p class="pencarian">Hasil Pencarian dari: <?= $searchTerm ?></p>
<?php } ?>
<!-- Page Title Section End-->

<!-- List Section Start -->
<!-- List Section Start -->
<div class="containerNews">
    <?php if (isset($joursay) && !empty($joursay)) { ?>
        <?php $contentFound = false; ?>
        <?php foreach ($joursay as $say) { ?>
            <?php
            // Check if the search term is present in the title or content
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
            if (stripos($say['judul'], $searchTerm) !== false || stripos($say['isi'], $searchTerm) !== false) {
                $contentFound = true;
            ?>
                <div class="cardNews">
                    <div class="img-box">
                        <img src="<?= base_url('assets/upload/konten/' . $say['foto']) ?>" alt="">
                    </div>
                    <div class="content">
                        <h2><?= $say['judul'] ?></h2>
                        <p>
                            <?php
                            $teks = substr($say['isi'], 0, 160);
                            if (strlen($say['isi']) > 160) {
                                $teks .= '.....';
                            }
                            echo $teks;
                            ?>
                        </p>
                        <a href="<?= base_url('journews/artikel/') . $say['slug'] ?>">Selengkapnya</a>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <?php if (!$contentFound) { ?>
            <h3 style="margin-bottom: 10%;">Konten Tidak Tersedia</h3>
        <?php } ?>
    <?php } else { ?>
        <h3>Konten Tidak Tersedia</h3>
    <?php } ?>
</div>
<!-- List Section End -->

<?php require_once('template/_footer.php') ?>