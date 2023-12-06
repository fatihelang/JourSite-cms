
<div id="alert">
    <?= $this->session->flashdata('alert') ?>
</div>
<div class="intro-y flex flex-col sm:flex-row items-center mt-3">
    <h2 class="text-lg font-medium mr-auto">
        User Data
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href=" <?= base_url('admin/user/tambah') ?> "><button class="button text-white bg-theme-1 shadow-md mr-2">Tambah User</button></a>
    </div>
</div>
<!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
        <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">Username</th>
                <th class="border-b-2 whitespace-no-wrap ">Nama</th>
                <th class="border-b-2 whitespace-no-wrap ">Level</th>
                <th class="border-b-2 whitespace-no-wrap text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($user as $i) { ?>
            <tr>
                <td class="border-b">
                    <div class="font-medium whitespace-no-wrap">
                        <?= $i['username'] ?>
                    </div>
                </td>
                <td class="border-b">
                    <div class="font-medium whitespace-no-wrap">
                        <?= $i['nama'] ?>
                    </div>
                </td>
                <td class="border-b">
                    <div class="font-medium whitespace-no-wrap">
                        <?= $i['level'] ?>
                    </div>
                </td>
                <td class="border-b w-5">
                    <div class="flex sm:justify-center items-center">
                        <a class="flex items-center mr-3" href=" <?= base_url('admin/user/edit/'.$i['id_user']) ?> "> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                        <a class="flex items-center text-theme-6" href=" <?= base_url('admin/user/delete_user/'.$i['id_user']) ?>" onclick="return confirm('Apakah anda yakin menghapus User <?= $i['nama']?>?')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<!-- END: Datatable -->