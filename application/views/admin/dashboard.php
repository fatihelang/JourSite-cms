<div class="intro-y flex flex-col sm:flex-row items-center mt-3">
    <h2 class="text-lg font-medium mr-auto">
        DashBoard
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="edit-2" class="report-box__icon text-theme-10"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6">
                    <?= $penulis ?>
                </div>
                <div class="text-base text-gray-600 mt-1">Penulis</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="file-text" class="report-box__icon text-theme-11"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6">
                    <?= $journews ?>
                </div>
                <div class="text-base text-gray-600 mt-1">JourNews</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="file-text" class="report-box__icon text-theme-12"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6">
                    <?= $joursay ?>
                </div>
                <div class="text-base text-gray-600 mt-1">JourSay</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
        <a href="https://docs.google.com/spreadsheets/d/1mOx72y--HAjHtdkOnyMk5tPTyA5qdv7JiiyARM7HsEE/edit?hl=id#gid=0" target="_blank">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="database" class="report-box__icon text-theme-9"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">Database</div>
                    <div class="text-base text-gray-600 mt-1">Data Anggota</div>
                </div>
            </div>
    </div>

    </a>
</div>

<div class="intro-y flex flex-col sm:flex-row items-center mt-10">
    <h2 class="text-lg font-medium mr-auto">
        Aktivitas Terakhir
    </h2>
</div>
<div class="overflow-x-auto mt-10 intro-y datatable-wrapper box p-5">
    <table class="table table-report table-report--bordered display datatable w-full">
        <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">No</th>
                <th class="border-b-2 whitespace-no-wrap">Username</th>
                <th class="border-b-2 whitespace-no-wrap">Recent Login</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($all_users as $user) : ?>
                <tr>
                    <td class="border-b"><?= $i; ?></td>
                    <td class="border-b"><?= $user['username']; ?></td>
                    <td class="border-b"><?= $user['recent_login']; ?></td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>