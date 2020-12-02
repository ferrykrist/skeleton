<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">

            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Modul Template</h4>
                    <a class=" float-right btn btn-sm" href="<?= base_url('admin/moduls/add') ?>"><i class="fas fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover table-striped text-sm">
                        <thead>
                            <th>Modul template</th>
                            <th>Deskripsi</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach ($modultemplate as $row) { ?>
                                <tr>
                                    <td><?= $row->ModulTemplate ?></td>
                                    <td><?= $row->Description ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-danger" href="<?= base_url('admin/moduls/delete/') . $row->IDModulTemplate ?>"><i class="fas fa-sm fa-trash"></i></a>
                                        <a class="btn btn-xs btn-warning" href="<?= base_url('admin/moduls/detail/') . $row->IDModulTemplate ?>"><i class='fas fa-sm fa-search'></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>