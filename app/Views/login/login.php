<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <base href="<?= base_url('./') ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <!--    <title>--><?php //= $page_title ?><!--</title>-->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('/assets/favicon/apple-icon-57x57.png') ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('/assets/favicon/apple-icon-60x60.png') ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('/assets/favicon/apple-icon-72x72.png') ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('/assets/favicon/apple-icon-76x76.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('/assets/favicon/apple-icon-114x114.png') ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('/assets/favicon/apple-icon-120x120.png') ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('/assets/favicon/apple-icon-144x144.png') ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('/assets/favicon/apple-icon-152x152.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('/assets/favicon/apple-icon-180x180.png') ?>">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?= base_url('/assets/favicon/android-icon-192x192.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('/assets/favicon/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('/assets/favicon/favicon-96x96.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('/assets/favicon/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= base_url('/assets/favicon/manifest.json') ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- CSS-->
    <link rel="stylesheet" href="<?= base_url('/vendors/simplebar/css/simplebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/css/vendors/simplebar.css') ?>">
    <link href="<?= base_url('/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/vendors/@coreui/chartjs/css/coreui-chartjs.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/css/toastr.min.css') ?>">


    <!-- Javascript -->
    <script src="<?= base_url('/js/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('/js/config.js') ?>"></script>
    <script src="<?= base_url('/js/color-modes.js') ?>"></script>
    <script src="<?= base_url('/vendors/@coreui/coreui/js/coreui.bundle.min.js') ?>"></script>
    <script src="<?= base_url('/vendors/simplebar/js/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('/vendors/@coreui/utils/js/index.js') ?>"></script>
    <script src="<?= base_url('/js/main.js') ?>"></script>
    <script src="<?= base_url('/js/toastr.min.js') ?>"></script>
    <script>
        const header = document.querySelector('header.header');

        document.addEventListener('scroll', () => {
            if (header) {
                header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
            }
        });
    </script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
            integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Datatable -->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.0/b-3.0.0/b-html5-3.0.0/fh-4.0.0/sp-2.3.0/datatables.min.css"
          rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.0/b-3.0.0/b-html5-3.0.0/fh-4.0.0/sp-2.3.0/datatables.min.js"></script>
</head>
<body>
<div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-1">
                <a href="<?= base_url(); ?>"><img src="<?= base_url('/assets/brand/logo-bleu.svg'); ?>"></a>
            </div>
        </div>
        <?php if (isset($error)) { ?>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-group d-block d-md-flex row">
                    <div class="card col-md-7 p-4 mb-0">
                        <div class="card-body">
                            <h1>Connexion</h1>
                            <p class="text-body-secondary">Connecter vous à votre compte</p>
                            <form action="<?= base_url('/login'); ?>" method="POST">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                      <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input class="form-control" type="mail" placeholder="Adresse Mail" name="email">
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-text">
                                      <i class="fa-solid fa-key"></i>
                                    </span>
                                    <input class="form-control" type="password" placeholder="Mot de passe" name="password">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit">Se connecter</button>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn btn-link px-0" type="button">Mot de passe oublié ?</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card col-md-5 text-white bg-primary py-5">
                        <div class="card-body text-center">
                            <div>
                                <h2>Rejoignez-nous !</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                                <a class="btn btn-lg btn-outline-light mt-3" href="<?= base_url('/login/register');
                                ?>" >Créer un
                                    compte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>