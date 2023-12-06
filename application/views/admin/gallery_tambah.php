<div class="intro-y flex flex-col sm:flex-row items-center mt-3">
    <h2 class="text-lg font-medium mr-auto">
        Tambah Foto
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href=" <?= base_url('admin/gallery') ?> "><button class="button  bg-gray-200 text-theme-10 shadow-md mr-2">Kembali</button></a>
    </div>
</div>

<form action=" <?= base_url('admin/gallery/simpan') ?>" method="post" enctype="multipart/form-data">
    <div class="mt-2">
        <label class="w-full sm:w-20 sm:text-right sm:mr-5">
            Foto 
        </label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 " aria-describedby="file_input_help" id="file_input" type="file" accept="image/png, image/jpeg, image/jpg" name="foto" required>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG</p>
    </div>
    <button type="submit button" class="button bg-theme-1 text-white w-full mt-5 mx-auto">
        Tambah
    </button>

</form>