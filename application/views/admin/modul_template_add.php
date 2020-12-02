<div class="container-fluid">
    <div class="col-lg-4">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title">Tambah Modul Template</h4>
                <a class=" float-right btn btn-sm" href="<?= base_url('admin/moduls') ?>"><i class="fas fa-times"></i></a>

            </div>
            <form method="post" action="<?= base_url('admin/moduls/add') ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Modul Template</label>
                        <input class="form-control form-control-sm" type="text" name="form_modult_name" id="form_modult_name">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Modul Template</label></label>
                        <input class="form-control form-control-sm" type="text" name="form_modult_deskripsi" id="form_modult_deskripsi">
                    </div>
                    <div class="form-group">
                        <label>Berlaku untuk Modul</label>
                        <select class="form-control form-control-sm" name="form_modult_modul" id="form_modult_modul">
                            <?php foreach ($modullistform as $row) { ?>
                                <option value="<?= $row->IDModul ?>"><?= $row->Modul ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" type="submit"><i class="fas fa-save"></i> Tambah</button>
                </div>
            </form>
        </div>

    </div>

</div>