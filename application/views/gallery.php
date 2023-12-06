<link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>./css/gstyle.css">
<link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>./css/footer.css">

<link rel="icon" type="image/x-icon" href="<?= base_url('assets/joursite/') ?>./img/icon (2).png">
<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="<?= base_url('assets/midone/') ?>dist/images/logo.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery - Joursite</title>
</head>
<!-- END: Head -->

<body>
  <header class="header">
    <h1>Our Memories</h1>
  </header>
  <div class="gallery">

    <?php foreach ($gallery as $i) { ?>
      <a href="<?= base_url('assets/upload/gallery/' . $i['foto']) ?>" target="_blank">
        <img src="<?= base_url('assets/upload/gallery/' . $i['foto']) ?>" alt="">
      </a>
    <?php } ?>
  </div>
</body>
<style>
        .d-none{
            visibility: hidden;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('[style="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"]').classList.add('d-none');
        })
    </script>

</html>