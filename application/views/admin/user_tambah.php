<div class="intro-y flex flex-col sm:flex-row items-center mt-3">
    <h2 class="text-lg font-medium mr-auto">
        Tambah User
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href=" <?= base_url('admin/user') ?> "><button class="button  bg-gray-200 text-theme-10 shadow-md mr-2">Kembali</button></a>
    </div>
</div>
<form action=" <?= base_url('admin/user/simpan') ?>" method="post">
    <div class="flex flex-col sm:flex-row items-center mt-3">
        <label class="w-full sm:w-20 sm:text-right sm:mr-5">
            Userame
        </label>
        <input type="text" class="input w-full border mt-2 flex-1" required name="username">
    </div>
    <div class="flex flex-col sm:flex-row items-center mt-3">
        <label class="w-full sm:w-20 sm:text-right sm:mr-5">
            Name
        </label>
        <input type="text" class="input w-full border mt-2 flex-1" required name="nama">
    </div>
    <div class="flex flex-col sm:flex-row items-center mt-3">
        <label class="w-full sm:w-20 sm:text-right sm:mr-5">
            Password
        </label>
        <input type="password" class="input w-full border mt-2 flex-1" required name="password">
    </div>
    <div class="flex flex-col sm:flex-row items-center mt-3">
        <label class="w-full sm:w-20 sm:text-right sm:mr-5">
            Level
        </label>
        <div class="mt-2 w-full">
            <select class="select2 w-full border mt-2 flex-1" required name="level">
                <option value="Admin">Admin</option>
                <option value="Penulis">Penulis</option>
            </select>
        </div>
    </div>
    <div class="sm:ml-20 sm:pl-5 mt-5">
        <button type="submit button" class="button bg-theme-1 text-white w-full mt-2">
            Simpan
        </button>
    </div>

</form>