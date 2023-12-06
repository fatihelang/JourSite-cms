<div id="alert">
    <?= $this->session->flashdata('alert') ?>
</div>
<div class="intro-y flex flex-col sm:flex-row items-center mt-3">
    <h2 class="text-lg font-medium mr-auto">
        Data Konten
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href=" <?= base_url('admin/konten/tambah') ?> "><button class="button text-white bg-theme-1 shadow-md mr-2">Tambah Konten</button></a>
    </div>
</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
        <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">Judul Konten</th>
                <th class="border-b-2 whitespace-no-wrap">Kategori</th>
                <th class="border-b-2 whitespace-no-wrap">Tanggal</th>
                <th class="border-b-2 whitespace-no-wrap">Kreator</th>
                <th class="border-b-2 whitespace-no-wrap text-center">Foto</th>
                <th class="border-b-2 whitespace-no-wrap text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($konten as $i) { ?>
                <tr>
                    <td class="border-b">
                        <div class="font-medium whitespace-wrap">
                            <?= $i['judul'] ?>
                        </div>
                    </td>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">
                            <?= $i['nama_kategori'] ?>
                        </div>
                    </td>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">
                            <?= $i['tanggal'] ?>
                        </div>
                    </td>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">
                            <?= $i['nama'] ?>
                        </div>
                    </td>
                    <td class="border-b w-5">
                        <div class="flex sm:justify-center items-center">
                           <a href=" <?= base_url('assets/upload/konten/'.$i['foto']) ?>" target="_blank" class="text-theme-3"><i data-feather="eye" class="w-4 h-4  mx-auto"></i></a>
                        </div>
                    </td>
                    </td>
                    <td class="border-b w-5">
                        <div class="flex sm:justify-center items-center">
                            <a class="flex items-center mr-3 " href=" <?= base_url('admin/konten/edit/' . $i['id_konten']) ?> "> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center text-theme-6" href=" <?= base_url('admin/konten/delete_konten/' . $i['foto']) ?> " 
                            onclick="return confirm('Apakah anda yakin menghapus konten ini?')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<!-- END: Datatable -->