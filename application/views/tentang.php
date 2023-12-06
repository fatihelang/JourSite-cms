<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>./css/style.css">
<link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>./css/about.css">
<link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>icon/css/font-awesome.min.css">

<?php require_once('template/_navbar.php') ?>
<!-- Navbar Section End -->


<!-- Hero Section Start -->
<div class="hero">
    <?php foreach ($konfig as $knfg) { ?>
        <div class="image"><img src=" <?= base_url('assets/upload/profil/' . $knfg['foto_profil']) ?>" alt=""></div>
    <?php } ?>
    <div class="banner">
        <div class="banner-text">
            <p><span class="brand">Journal</span><span class="brand span">istic</span><br>
                <span class="title"><?= $knfg['caption'] ?></span> <br>
                <span class="sosmed">
                    <a href="<?= $knfg['link_instagram'] ?>" target="_blank">
                        <i class="fa fa-instagram" aria-hidden="true"></i> | <?= $knfg['instagram'] ?>
                    </a>
                </span>
            </p>
        </div>
    </div>
</div>
<!-- Hero Section End -->




<!-- VisiMisi Section Start -->
<div class="label" id="VM">
    <h2>Visi dan Misi</h2>
</div>
<div class="VMcard">
    <div class="VMbody">
        <p class="VMtitle">Visi</p>
        <p>Menjadi ekstrakulikuler Jurnalistik yang berkualitas, kreatif, dan inovatif dalam menghasilkan karya yang bersampak positif bagi sekolah dan masyarakat.</p>
    </div>
    <div class="VMbody">
        <p class="VMtitle">Misi</p>
        <p style="text-align: justify;">
            1. Mengasah keterampilan jurnalistik, melalui berbagai kegiatan. <br>
            2. Memahami prinsip kebebasan Pers dan Etika Jurnalistik. <br>
            3. Mengadakan kegiatan-kegiatan jurnalistik yang melibatkan siswa secara langsung. <br>
            4. Mempublikasikan karya-karya siswa. <br>
            5. Membangun kolaborasi dengan ekstrakurikuler Jurnalistik lokal untuk mengembangkan pemahaman yang lebih baik tentang dunia Jurnalistik.
        </p>
    </div>
</div>

<!-- VisiMisi Section End -->



<?php require_once('template/_footer.php') ?>
</body>



</html>