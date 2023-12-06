<?php foreach($kategori as $i) {?>
<div class="intro-y flex flex-col sm:flex-row items-center mt-3">
    <h2 class="text-lg font-medium mr-auto">
        Edit Kategori
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href=" <?= base_url('admin/kategori') ?> "><button class="button  bg-gray-200 text-theme-10 shadow-md mr-2">Kembali</button></a>
    </div>
</div>
<form action=" <?= base_url('admin/kategori/update') ?>" method="post">
    <div class="flex flex-col sm:flex-row items-center mt-3">
        <label class="w-full sm:w-20 sm:text-right sm:mr-5">
            Naam Kategori
        </label>
        <input type="text" class="input w-full border mt-2 flex-1" required name="nama_kategori" value=" <?= $i['nama_kategori'] ?>">
    </div>
    <div class="sm:ml-20 sm:pl-5 mt-5">
        <button type="submit button" class="button bg-theme-1 text-white w-full mt-2">
            Simpan
        </button>
    </div>
    <input type="hidden" name="id_kategori" value=" <?= $i['id_kategori']?>">
</form>


<?php } ?>