    <!--Footer Section  -->
    <?php foreach ($konfig as $knfg) { ?>
        <footer>
            <div class="footer-content">
                <h2><?= $knfg['judul_website'] ?></h2>
                <p style="font-size:1.3rem;"> <?= $knfg['profil_website'] ?> </p>
            </div>
            <div class="footer-bottom">
                <p>Copyright © <span style="font-weight: 900;">KaElang</span></p>
            </div>
        </footer>
    <?php } ?>
    <script src=" <?= base_url('assets/joursite/') ?>./script.js"></script>
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