<div class="container-fluid">
    <div class="row">

        <div class="col-lg-5">
            <div class="card card-info">
                <div class="card-header">
                    <h4 class="card-title float-left">Daftar Modul untuk User: <strong><?= $user['Nama'] ?></strong> </h4>
                    <div class="float-right">
                        <a class="btn btn-xs" href="<?= base_url('admin/users/modul/') . $user['UID'] . '/add' ?>"><i class="fas fa-plus"></i></a>
                        <a class="btn btn-xs" href="<?= base_url('admin/users') ?>"><i class="fas fa-times"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-condensed table-hover table-striped">
                        <thead>
                            <th>Modul</th>
                            <th>Jenis Modul</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php if (!empty($usermodul)) {
                                foreach ($usermodul as $row) { ?>
                                    <tr>
                                        <td><?= $row->Modul ?></td>
                                        <td><?= $row->ModulType ?></td>
                                        <td><a class="btn btn-xs btn-danger" href="<?= base_url('admin/users/deletemodul/') . $user['UID'] . '/' . $row->AutoID ?>"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                            <?php }
                            } ?>

                        </tbody>

                    </table>

                </div>
                <div class="card-footer">

                </div>

            </div>

        </div>
        <?php if ($action == 'add') { ?>
            <div class="col-lg-5">
                <div class="card card-yellow">
                    <form method="post" action="<?= base_url('admin/users/modul/') . $user['UID'] ?>">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Modul Untuk User: <strong><?= $user['Nama'] ?></strong></h4>
                            <a class="float-right btn btn-xs" href="<?= base_url('admin/users/modul/') . $user['UID']  ?>"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" value="<?= $user['UID']  ?>" name="f_uid" id="f_uid">
                                <label>Modul Template</label>
                                <?php if (!empty($moduls)) { ?>
                                    <select class="form-control" name="f_idmodult" id="f_idmodult">
                                        <?php foreach ($moduls as $row) { ?>
                                            <option value="<?= $row->IDModulTemplate ?>"><?= ($row->ModulTemplate) ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } else { ?>
                                    <h4>Modul template belum ada</h4>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>

    </div>

</div>