<div class="container-fluid">
    <div class="col-lg-4">
        <div class="box box-warning">
            <form method="post" action="<?= base_url('profile/password') ?>" oninput='password3.setCustomValidity(password3.value != password2.value ? "<?= MY_USERPASSNOTMATCHED ?>" : "")'>
                <div class="box-body">
                    <div class="form-group">
                        <label>Password saat ini</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Password baru</label>
                        <input type="password" class="form-control" id="password2" name="password2">
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Ulangi password baru</label>
                        <input type="password" class="form-control" id="password3" name="password3">
                    </div>
                </div>
                <div class="box-footer">
                    <small class="text-danger text-center"> * Setelah ganti password, sistem akan me-logout anda.</small>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary float-right"> Ganti password </button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
</div>