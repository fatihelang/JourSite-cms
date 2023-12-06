
<div id="alert">
    <?= $this->session->flashdata('alert') ?>
</div>
<div class="intro-y flex flex-col sm:flex-row items-center mt-3">
    <h2 class="text-lg font-medium mr-auto">
        Data Kategori
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href=" <?= base_url('admin/kategori/tambah') ?> "><button class="button text-white bg-theme-1 shadow-md mr-2">Tambah kategori</button></a>
    </div>
</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
        <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">Kategori</th>
                <th class="border-b-2 whitespace-no-wrap text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($kategori as $i) { ?>
            <tr>
                <td class="border-b">
                    <div class="font-medium whitespace-no-wrap">
                        <?= $i['nama_kategori'] ?>
                    </div>
                </td>
                <td class="border-b w-5">
                    <div class="flex sm:justify-center items-center">
                        <a class="flex items-center mr-3" href=" <?= base_url('admin/kategori/edit/'.$i['id_kategori']) ?> "> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                        <a class="flex items-center text-theme-6" href=" <?= base_url('admin/kategori/delete_kategori/'.$i['id_kategori']) ?> "> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<!-- END: Datatable -->