<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIS Tritunggal</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/dist/css/AdminLTE.min.css">
    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/adminlte') ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/adminlte') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="Logo" />
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Ganti password</p>
            <p class="small login-box-msg">Password anda masih menggunakan password default, anda diwajibkan mengganti password</p>

            <?= $this->session->flashdata('message'); ?>

            <form class="form-vertical" action="<?= base_url('auth/password') ?>" method="post">
                <div class="form-group">
                    <label>Password baru</label>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Ulangi password baru</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>


        </div>
    </div>


</body>

</html>