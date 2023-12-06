<title><?= $konten->judul ?></title>

<script src="https://unpkg.com/feather-icons"></script>
<?php require_once('template/_navbar.php');
function format($content)
{
    // Hapus karakter "&nbsp;" (non-breaking space)
    $content = str_replace("\n", "", $content);
    // Ganti "\n" dengan tag "<br>"
    $content = str_replace("&nbsp;", "<br><br>", $content);
    return $content;
} ?>
<link rel="stylesheet" href="<?= base_url('assets/joursite/') ?>./css/content.css">
<div class="News-container">
    <div class="card">
        <div class="card-body">
            <div class="card-imgBox"><img src="<?= base_url('assets/upload/konten/' . $konten->foto) ?>" alt=""></div>
            <div class="card-title">
                <h2><?= $konten->judul ?></h2>
            </div>
            <div class="line"></div>
            <div class="card-text">
                <p>
                    <?= format($konten->isi) ?>
                </p>
            </div>
            <div class="line"></div>
            <div class="info">
                <div class="back">
                    <a href="javascript:history.back();">
                        <i data-feather="arrow-left"></i>
                        Kembali</a>
                </div>
                <p>
                    <?= $konten->nama ?><br>
                    <span><?= date('d-m-Y', strtotime($konten->tanggal)) ?></span>
                </p>
            </div>

        </div>
    </div>
</div>
<div id="disqus_thread"></div>
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document,
            s = d.createElement('script');
        s.src = 'https://https-joursite-000webhostapp-com.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<?php require_once('template/_footer.php') ?>
<script>
    feather.replace();
</script>
<script id="dsq-count-scr" src="//https-joursite-000webhostapp-com.disqus.com/count.js" async></script>
