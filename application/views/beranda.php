<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>./css/style.css">

<?php require_once('template/_navbar.php') ?>
<!-- Navbar Section End -->


<!-- Hero Section Start -->
<div class="hero">
    <?php foreach ($konfig as $knfg) { ?>
        <div class="image"><img src=" <?= base_url('assets/upload/event/' . $knfg['event']) ?>" alt=""></div>
    <?php } ?>
    <div class="banner">
        <div class="banner-text">
            <p><span class="brand">Jour</span><span class="brand span">Vent</span><br>
                <span class="title"><?= $knfg['nama_event'] ?></span> <br>
                <span class="date"><?= date('d-m-Y',strtotime($knfg['tanggal'])) ?></span>
            </p>
        </div>
    </div>
</div>
<!-- Hero Section End -->


<!-- JourNews Section Start-->
<h1 class="label" id="Journews">
    <a href="<?= base_url('journews') ?>">Jour<span>News</span></a>
</h1>

<section>
    <div class="containerNews">
    <?php
        $recentPosts = array_reverse(array_slice($journews, 0, 2));

        foreach ($recentPosts as $key => $news) {
        ?>


            <div class="cardNews">
                <div class="img-box">
                    <img src=" <?= base_url('assets/upload/konten/' . $news['foto']) ?>" alt="">
                </div>
                <div class=" content">
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
    </div>
</section>
<!-- JourNews Section End-->

<!-- JourSay Section Start -->
<h1 class="label" id="JourSay">
    <a href="<?= base_url('joursay') ?>">Jour<span>Say</span></a></h1>
<section style="background: #EBE8E7;">
    <div class="containerNews">
        <?php
        $recentPosts = array_reverse(array_slice($joursay, 0, 2));

        foreach ($recentPosts as $key => $say) {
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
                    <a href="<?= base_url('joursay/artikel/') . $say['slug'] ?>">Selengkapnya</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

</section>


<?php require_once('template/_footer.php') ?>
</body>



</html>