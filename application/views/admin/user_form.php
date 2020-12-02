<div class="container-fluid">
    <div class="col-lg-4">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= ($action == 'register' ? 'Tambah User' : 'Edit User') ?></h3>
                <a class="float-right btn btn-xs" href="<?= base_url('admin/users') ?>"><i class="fas fa-times"></i></a>

            </div>
            <form method="post" action="<?= base_url('admin/users/' . ($action == 'register' ? 'register' : 'edit/' . $user['UID'])) ?>">
                <div class="card-body">
                    <?php if ($action == 'edit') { ?>
                        <div class="form-group">
                            <label>UID</label>
                            <input disabled class="form-control form-control-sm" value="<?= $user['UID'] ?>" type="text" name="form_uid" id="form_uid">
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label>Username</label>
                        <input <?= ($action == 'edit' ? 'disabled' : '') ?> class="form-control form-control-sm" type="text" name="form_username" id="form_username" value="<?= ($action == 'edit' ? $user['Username'] : '') ?>">
                        <?= form_error('form_username', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control form-control-sm" type="text" name="form_nama" id="form_nama" value="<?= ($action == 'edit' ? $user['Nama'] : '') ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input <?= ($action == 'edit' ? 'disabled' : '') ?> class="form-control form-control-sm" type="text" name="form_email" id="form_email" value="<?= ($action == 'edit' ? $user['Email'] : '') ?>">
                        <?= form_error('form_email', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class=" card-footer">
                    <button class=" float-right btn btn-primary btn-sm" type="submit"><i class="fas fa-plus"></i><?= ($action == 'register' ? ' Tambah User' : ' Edit User') ?></button>
                </div>
            </form>
            <div class="card-footer">
                <p class="text-sm">
                    <strong>Keterangan</strong>
                    <ul class=" text-sm">
                        <li>Password standard adalah <strong><?= MY_DEFPASSWORD ?></strong> </li>
                        <li>Setelah user login untuk pertama kalinya, atau bila password user di-reset ke standard, user akan diminta mengganti password</li>
                        <li>Untuk edit data, yang bisa diganti hanya nama. Bila data salah, sebaiknya user lama dihapus dan dibuatkan userbaru</li>
                    </ul>
                </p>

            </div>
        </div>
    </div>
</div>