<div class="container-fluid">
    <div class="col-lg">
        <div class="card">
            <form method="post" action="<?= base_url('admin/users/actions') ?>">

                <div class="card-header">
                    <div class="float-right btn-group btn-group-sm">
                        <a href="<?= base_url('admin/users/register') ?>" class="btn"><i class="fa fa-plus"></i></a>
                        <a href="<?= base_url('admin/moduls') ?>" class="btn"><i class="fa fa-clipboard"></i></a>

                    </div>
                    <div class="float-left">
                        Pada yang tercentang lakukan:
                        <button type="submit" name="sbm" value="reset" onClick=" <?= confirmation("Reset password ke password default?") ?>" class=" btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Reset password"><i class="fas fa-sync"></i> Reset Password</button>
                        <button type="submit" name="sbm" value="enable" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Aktifkan/Nonaktifkan user"><i class="fa fa-check"></i> Aktif/Non aktifkan</button>
                        <button type="submit" name="sbm" value="delete" onClick=" <?= confirmation("Hapus user?") ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus user"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-sm">
                        <table class="table table-striped table-hover tdatatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>UID</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Last Log</th>
                                    <th>Active</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $row) { ?>
                                    <tr>
                                        <td><input type="checkbox" value="<?= $row->UID ?>" name="UIDs[]"></td>
                                        <td><?= $row->UID ?></td>
                                        <td class="<?= (($row->Password) == md5(MY_DEFPASSWORD) ? 'text-bold' : ''); ?>"><?= $row->Username ?></td>
                                        <td><?= $row->Nama ?></td>
                                        <td><?= $row->Email ?></td>
                                        <td><?= $row->LastLogin ?></td>
                                        <td class="text-center"><input type="checkbox" disabled <?= (($row->Active) == 1 ? 'checked' : ''); ?>></td>
                                        <td>
                                            <a href="<?= base_url('admin/users/modul/') . $row->UID ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Hak akses"><i class="fa fa-search"></i></a>
                                            <a href="<?= base_url('admin/users/enabled/') . $row->UID ?>" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="bottom" title="Aktifkan/non-aktifkan user"><i class="fa fa-check"></i></a>
                                            <a href="<?= base_url('admin/users/edit/') . $row->UID ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Sunting user"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('admin/users/delete/') . $row->UID ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus user" onclick="<?= confirmation('Hapus user?') ?>"><i class="fa fa-trash"></i></a>

                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <small class="text-maroon">Nama yang di cetak tebal masih menggunakan password default</small>
                </div>
            </form>

        </div>

    </div>

</div>