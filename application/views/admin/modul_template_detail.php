<div class="container-fluid">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="card-tools">
                    <a href="<?= base_url('admin/moduls') ?>" class="btn btn-tool"><i class="fas fa-times"></i></a>
                </div>
                <h4 class="card-title"><?= $modultemplate['ModulTemplate'] ?></h4><br>
                <p class="text-sm">
                    <strong> Deskripsi:</strong></br>
                    <?= $modultemplate['Description']; ?>
                </p>

            </div>
            <form method="post" action="<?= base_url('admin/moduls/detail/' . $modultemplate['IDModulTemplate']) ?>">
                <div class="card-header">
                    <div class="input-group">
                        <input type="hidden" value="<?= $modultemplate['IDModulTemplate'] ?>" name="fid_modul" id="fid_modul">
                        <select class="form-control" name="fnama_modul" id="fnama_modul">
                            <?php foreach ($moduls as $row) { ?>
                                <option value="<?= $row->IDModul ?>"><?= $row->Modul ?></option>
                            <?php } ?>
                        </select>
                        <div class=" ml-3 input-group-append">
                            <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-save"></i> Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-body">
                <?php if (!empty($modultemplatedetail)) { ?>
                    <table class="table table-sm table-striped table-condensed table-hover">
                        <thead>
                            <th>Nama Modul</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach ($modultemplatedetail as $row) { ?>
                                <tr>
                                    <td><?= $row->Modul ?></td>
                                    <td><a class="btn btn-danger btn-sm" href="<?= base_url('admin/moduls/template_detail_delete/' . $modultemplate['IDModulTemplate']) . '/' . $row->AutoID ?>"><i class="fas fa-trash"></i></a> </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                <?php } ?>

            </div>
        </div>
    </div>

</div>