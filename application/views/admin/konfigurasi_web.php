<div id="alert">
    <?= $this->session->flashdata('alert') ?>
</div>
<div class="intro-y flex flex-col sm:flex-row items-center mt-3">
    <h2 class="text-lg font-medium mr-auto">
        Konfigurasi Website
    </h2>
</div>

<form action="<?= base_url('admin/konfigurasi_web/update') ?>" method="post" enctype="multipart/form-data">
    <div class="mt-2">
        <label>Judul Website</label>
        <input type="text" class="input w-full border mt-2 flex-1" required name="judul_website" value="<?= trim($konfig->judul_website) ?>">
    </div>
    <div class="mt-2">
        <label>Profil Website</label>
        <input type="text" class="input w-full border mt-2 flex-1" required name="profil_website" value="<?= trim($konfig->profil_website) ?>">
    </div>
    <div class="mt-2">
        <label>Instagram</label>
        <input type="text" class="input w-full border mt-2 flex-1" required name="instagram" value="<?= trim($konfig->instagram) ?>">
    </div>
    <div class="mt-2">
        <label>Link Instagram</label>
        <input type="text" class="input w-full border mt-2 flex-1" required name="link_instagram" value="<?= trim($konfig->link_instagram) ?>">
    </div>
    <button type="submit" class="button bg-theme-1 text-white w-full mt-5 mx-auto">
        Simpan
    </button>
</form>
