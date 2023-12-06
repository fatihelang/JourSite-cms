<div class="intro-y flex flex-col sm:flex-row items-center mt-3">
    <h2 class="text-lg font-medium mr-auto">
        Tambah Konten
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href=" <?= base_url('admin/konten') ?> "><button class="button  bg-gray-200 text-theme-10 shadow-md mr-2">Kembali</button></a>
    </div>
</div>

<form action=" <?= base_url('admin/konten/simpan') ?>" method="post" enctype="multipart/form-data">
    <div class="mt-2">
        <label>Judul Konten</label>
        <input type="text" class="input w-full border mt-2 flex-1" required name="judul">
    </div>
    <div class="mt-2">
        <label class="w-full sm:w-20 sm:text-right sm:mr-5">
            Kategori Konten
        </label>
        <div class="mt-2 w-full">
            <select class="select2 w-full border mt-2 flex-1" required name="id_kategori">
                <?php foreach ($kategori as $i) { ?>
                    <option value="<?= $i['id_kategori'] ?>"> <?= $i['nama_kategori'] ?> </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="mt-2">
        <label class="w-full sm:w-20 sm:text-right sm:mr-5">
            Isi Konten
        </label>
        <div class="box">
            <div class="p-5" id="simple-editor">
                <textarea data-feature="basic" class="summernote" name="isi"></textarea>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <label class="w-full sm:w-20 sm:text-right sm:mr-5">
            Foto Konten
        </label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 " aria-describedby="file_input_help" id="file_input" type="file" accept="image/png, image/jpeg, image/jpg" name="foto">
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG</p>
    </div>
    <button type="submit button" class="button bg-theme-1 text-white w-full mt-5 mx-auto">
        Tambah
    </button>

</form>