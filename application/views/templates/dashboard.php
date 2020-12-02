<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= MY_SITETITLE; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



    <!-- jQuery -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url('assets/adminlte') ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/adminlte') ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('assets/adminlte') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/adminlte') ?>/dist/js/adminlte.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $_SESSION['user']['Image']; ?>" class="user-image" alt="User Image">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-light">
                            <img src="<?= $_SESSION['user']['Image']; ?>" class="img-circle elevation-2" alt="User Image">
                            <p><?= $_SESSION['user']['Username'] ?></p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body text-center">
                            <a href="<?= base_url('profile/') ?>">Profile</a> </br>
                            <a href="<?= base_url('profile/password') ?>">Ganti Password</a> </br>
                            <a href="<?= base_url('auth/logout') ?>" onclick="<?= confirmation('Logout now?') ?>">Log out</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('dashboard') ?>" class="brand-link">
                <img src="<?= base_url('assets/img/') . 'logo-small.png' ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Skeleton</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                        <?php if (checkModul('USER')) {
                            $this->load->view('admin/user_menu');
                        } ?>
                        <?php if ($_SESSION['superadmin']) {
                            $this->load->view('admin/admin_menu');
                        } ?>
                    </ul>
                </nav>

            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= (isset($pagetitle) ? $pagetitle : ''); ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <?= (isset($breadcrumb) ? $breadcrumb : ''); ?>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?= $this->session->flashdata('message'); ?>
                <?php $this->load->view($namaview); ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 2020
            </div>
            <strong><?= MY_SITEFOOTER; ?></strong> All rights
            reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('.yyyymmdd').inputmask('yyyy-mm-dd', {
                'placeholder': 'yyyy-mm-dd'
            })

            $('.hhmm').inputmask('hh:mm', {
                'placeholder': 'hh:mm'
            })

            //Date range picker
            $('.daterangepicker').daterangepicker()
            //Date range picker with time picker
            $('.ddmmyyhhmm').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'DD/MM/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('.daterangebutton').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Date picker
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            })

            $('.tdatatable').DataTable({
                'responsive': true
            })

        })
    </script>

</body>

</html>