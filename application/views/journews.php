   <?php require_once('template/_navbar.php') ?>
   <link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>./css/header.css">
   <link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>./css/style.css">
   <!-- Page Title Section Start-->
   <div class="page-header">
       <h1>Jour<span>News</span></h1>
       <!-- Laptop and Tablet Search Bar -->
       <input type="checkbox" id="check">
       <div class="box">
           <form action="<?= base_url('journews/search') ?>" method="get">
               <div class="search-box">
                   <input type="text" name="search" placeholder="Cari sesuatu?">
                   <button type="submit" style="opacity: 0;">
                       <i class="fa fa-search" aria-hidden="true"></i>
                   </button>

                   <label for="check" class="icon">
                       <i class="fa fa-search" aria-hidden="true"></i>
                   </label>
               </div>
           </form>
       </div>
       <!-- Android -->
       <div class="android-box">
           <form action="<?= base_url('journews/search') ?>" method="get">
               <div class="search">
                   <input type="text" class="search-holder" name="search" placeholder="Cari sesuatu?">
                   <button type="submit" class="searchButton">
                       <i class="fa fa-search"></i>
                   </button>
               </div>
           </form>
       </div>
   </div>
   <?php if (isset($journews) && !empty($journews) && isset($_GET['search']) && !empty($_GET['search'])) { ?>
       <?php $searchTerm = $_GET['search']; ?>
       <p class="pencarian">Hasil Pencarian dari: <?= $searchTerm ?></p>
   <?php } ?>
   <!-- Page Title Section End-->

   <!-- List Section Start -->
   <!-- List Section Start -->
   <div class="containerNews">
       <?php if (isset($journews) && !empty($journews)) { ?>
           <?php $contentFound = false; ?>
           <?php foreach ($journews as $news) { ?>
               <?php
                // Check if the search term is present in the title or content
                $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
                if (stripos($news['judul'], $searchTerm) !== false || stripos($news['isi'], $searchTerm) !== false) {
                    $contentFound = true;
                ?>
                   <div class="cardNews">
                       <div class="img-box">
                           <img src="<?= base_url('assets/upload/konten/' . $news['foto']) ?>" alt="">
                       </div>
                       <div class="content">
                           <h2><?= $news['judul'] ?></h2>
                           <p>
                               <?php
                                $teks = substr($news['isi'], 0, 160);
                                if (strlen($news['isi']) > 160) {
                                    $teks .= '.....';
                                }
                                echo $teks;
                                ?>
                           </p>
                           <a href="<?= base_url('journews/artikel/') . $news['slug'] ?>">Selengkapnya</a>
                       </div>
                   </div>
               <?php } ?>
           <?php } ?>
           <?php if (!$contentFound) { ?>
               <h3>Konten Tidak Tersedia</h3>
           <?php } ?>
       <?php } else { ?>
           <h3>Konten Tidak Tersedia</h3>
       <?php } ?>
   </div>
   <!-- List Section End -->

   <!-- List Section End -->


   <?php require_once('template/_footer.php') ?>