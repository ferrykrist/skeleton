<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $sitename  ?></title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/dist/css/adminlte.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="login-page">
    <div class="login-box">

        <div class="login-box-body">
            <div class="login-logo">
                <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="Logo" />
            </div>
            <p class="login-box-msg">Daftar user baru</p>
            <form class="form-vertical" action="<?= base_url('register') ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>" />
                    <?= form_error('username', '<div class="small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>"" />
                    <?= form_error('email', '<div class="small text-danger">', '</div>'); ?>
                </div>
                <div class=" form-group">
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password" />
                    <?= form_error('password1', '<div class="small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi password" />
                    <?= form_error('password2', '<div class="small text-danger">', '</div>'); ?>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat ">Register</button>
                    </div>
                    <div class="col-lg-12 text-center">
                        <a href="<?= base_url('login') ?>">Sudah punya akun? Login disini!</a>
                    </div>

                </div>

            </form>
        </div>

    </div>
    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>