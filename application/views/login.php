<!DOCTYPE html>

<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="<?= base_url('assets/midone/') ?>dist/images/logo.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Jourpanel</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href=" <?= base_url('assets/midone/') ?>dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login bg-theme-1 overflow-hidden">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-10" src="<?= base_url('assets/midone/') ?>dist/images/logo.png">
                    <span class="text-white text-lg ml-3"> Jour<span class="font-medium">Panel</span> </span>
                </a>
                <div class="my-auto">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        A few more clicks to
                        <br>
                        sign in to your account.
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white">Manage the journalistic SMKN 2 Karanganyar website</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left xl:text-white text-theme-1">
                        Sign In
                    </h2>
                    <div id="alert" class="mt-4">
                        <?= $this->session->flashdata('alert') ?>
                    </div>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage the journalistic SMKN 2 Karanganyar website</div>
                    <form action=" <?= base_url('auth/login') ?> " method="post">
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Username" name="username">
                            <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password" name="password">
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="button button--lg w-full xl:w-32 xl:text-theme-1 xl:bg-white xl:mr-3 bg-theme-1 text-white">Login</button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    <!-- BEGIN: JS Assets-->
    <script src=" <?= base_url('assets/midone/') ?>dist/js/app.js"></script>
    <script>
        $('#alert').delay('slow').slideDown('slow').delay(3000).slideUp(600);
    </script>
    <!-- END: JS Assets-->
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