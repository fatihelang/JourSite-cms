<div id="alert">
    <?= $this->session->flashdata('alert') ?>
</div>
<div class="intro-y flex flex-col sm:flex-row items-center mt-3">
    <h2 class="text-lg font-medium mr-auto">
        Konfigurasi event
    </h2>
</div>

<form action=" <?= base_url('admin/konfigurasi_event/update') ?>" method="post" enctype="multipart/form-data">
    <div class="mt-2">
        <label>Foto Event</label>
        <div class="dropdown"></div>
        <div class="shadow-xl p-5 rounded-xl">
            <?php if ($konfig->event != NULL) {?>
            <img src="<?= base_url('assets/upload/event/' . $konfig->event) ?>" alt="" class="border-gray-300 rounded-xl w-full">
            <div class="flex sm:justify-center items-center mt-2">
                <a class="flex items-center text-theme-6" href=" <?= base_url('admin/konfigurasi_event/delete_foto/' . $konfig->event) ?> " onclick="return confirm('Apakah anda yakin menghapus foto ini?')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
            </div>
            <?php } else {?>
                <div class="flex items-center text-theme-6" > 
                    <i data-feather="alert-circle" class="w-4 h-4 mr-1"></i> Belum ada foto 
            </div>
                <?php } ?>
        </div>
    </div>
    <div class="mt-4">
        <label>Keterangan</label>
        <input type="text" class="input w-full border mt-2 flex-1" required name="nama_event" value="<?= trim($konfig->nama_event) ?>">
    </div>
    <div class="mt-4">
        <label class="w-full sm:w-20 sm:text-right sm:mr-5">
            Upload Foto event
        </label>
        <input class="block w-full mt-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 " aria-describedby="file_input_help" id="file_input" type="file" accept="image/png, image/jpeg, image/jpg" name="event">
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG</p>
    </div>

    <button type="submit button" class="button bg-theme-1 text-white w-full mt-5 mx-auto">
        Simpan
    </button>

</form>