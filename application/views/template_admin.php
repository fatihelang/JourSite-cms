<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="<?= base_url('assets/midone/') ?>dist/images/logo.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul_halaman ?> - Jourpanel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href=" <?= base_url('assets/midone/') ?>dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
    <?php $menu = $this->uri->segment(2); ?>
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone Tailwind HTML Admin Template" class="w-10" src="<?= base_url('assets/midone/') ?>dist/images/logo.png">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-theme-24 py-5 hidden">
            <li>
                <a href="<?= site_url('admin/home') ?>" class="menu menu--active">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Dashboard </div>
                </a>
            </li>
            <li>
                <a href="<?= site_url('admin/konten') ?>" class="menu menu--active">
                    <div class="menu__icon"> <i data-feather="edit-3"></i> </div>
                    <div class="menu__title"> Konten </div>
                </a>
            </li>
            <?php if ($this->session->userdata('level') == 'Admin') { ?>
                <li>
                    <a href="javascript:;" class="menu ">
                        <div class="menu__icon"> <i data-feather="settings"></i> </div>
                        <div class="menu__title"> Konfigurasi <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?= site_url('admin/konfigurasi_web') ?>" class="menu ">
                                <div class="menu__icon"> <i data-feather="globe"></i> </div>
                                <div class="menu__title"> Website </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/konfigurasi_profil') ?>" class="menu">
                                <div class="menu__icon"> <i data-feather="globe"></i> </div>
                                <div class="menu__title"> Profil </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/konfigurasi_event') ?>" class="menu">
                                <div class="menu__icon"> <i data-feather="globe"></i> </div>
                                <div class="menu__title"> Event </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= site_url('admin/konfigurasi') ?>" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="image"></i> </div>
                        <div class="menu__title"> Gallery </div>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('admin/user') ?>" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="users"></i> </div>
                        <div class="menu__title"> User </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="Midone Tailwind HTML Admin Template" class="w-10" src="<?= base_url('assets/midone/') ?>dist/images/logo.png">
                <span class="hidden xl:block text-white text-lg ml-3"> Jour<span class="font-medium">Panel</span> </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="<?= site_url('admin/home') ?>" class="side-menu side-menu <?php if ($menu == 'home') {
                                                                                            echo "side-menu--active";
                                                                                        } ?>">
                        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('admin/konten') ?>" class="side-menu side-menu <?php if ($menu == 'konten') {
                                                                                                echo "side-menu--active";
                                                                                            } ?>">
                        <div class="side-menu__icon"> <i data-feather="edit-3"></i> </div>
                        <div class="side-menu__title"> Konten </div>
                    </a>
                </li>


                </li>
                <?php if ($this->session->userdata('level') == 'Admin') { ?>
                    <li>
                        <a href="javascript:;" class="side-menu <?php if ($menu == 'konfigurasi_web' | $menu == 'konfigurasi_profil' | $menu == 'konfigurasi_event' ) {
                                                                    echo "side-menu--active";
                                                                } ?>">
                            <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                            <div class="side-menu__title"> Konfigurasi <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="<?= site_url('admin/konfigurasi_web') ?>" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="globe"></i> </div>
                                    <div class="side-menu__title"> Website </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/konfigurasi_profil') ?>" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="globe"></i> </div>
                                    <div class="side-menu__title"> Profil </div>
                                </a>
                            </li>
                    </li>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/konfigurasi_event') ?>" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="globe"></i> </div>
                            <div class="side-menu__title"> Event </div>
                        </a>
                    </li>
            </ul>
            </li>
            <li>
                <a href="<?= site_url('admin/gallery') ?>" class="side-menu side-menu <?php if ($menu == 'gallery') {
                                                                                            echo "side-menu--active";
                                                                                        } ?>">
                    <div class="side-menu__icon"> <i data-feather="image"></i> </div>
                    <div class="side-menu__title"> Gallery</div>
                </a>
            </li>
            <li>
                <a href="<?= site_url('admin/user') ?>" class="side-menu side-menu <?php if ($menu == 'user') {
                                                                                        echo "side-menu--active";
                                                                                    } ?>">
                    <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                    <div class="side-menu__title"> User </div>
                </a>
            </li>
        <?php } ?>
        </ul>
        </nav>
        <!-- END: Side Menu -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <div class="-intro-x breadcrumb mr-auto sm:flex">
                    <a href=" <?= base_url('admin/home') ?> " class="">Jourpanel</a>
                    <i data-feather="chevron-right" class="breadcrumb__icon"></i>
                    <a href="#" class="breadcrumb--active"><?= $judul_halaman ?> </a>
                </div>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8 relative">
                    <div class="dropdown-toggle w-8 h-8 rounded-full shadow-xl cursor-pointer">
                        <i data-feather="user" class="w-full h-1/2 mr-2"></i>
                    </div>
                    <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                        <div class="dropdown-box__content box bg-theme-38 text-white">
                            <div class="p-4 border-b border-theme-40">
                                <div class="font-medium"> <?= $this->session->userdata('nama') ?> </div>
                                <div class="text-xs text-theme-41"><?= $this->session->userdata('level') ?></div>
                            </div>
                            <div class="p-2 border-t border-theme-40">
                                <a href=" <?= base_url('auth/logout') ?> " class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="log-out" class="w-4 h-4 mr-2"></i> Logout </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-3">
                        <!-- <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5 ">
                               <?= $judul_halaman ?>
                            </h2>
                            <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div> -->
                        <!-- BEGIN: Content -->
                        <?= $contents; ?>
                        <!-- END: Content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src=" <?= base_url('assets/midone/') ?>dist/js/app.js"></script>
        <script>
            $('#alert').delay('slow').slideDown('slow').delay(3000).slideUp(600);
        </script>
        <!-- END: JS Assets-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

</body>

<style>
        .d-none{
            visibility: hidden;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('[style="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"]').classList.add('d-none');
        })
    </script>
</html>