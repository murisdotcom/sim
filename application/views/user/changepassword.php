<!-- pembatas -->
<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        <?= $title; ?>
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-fw fa-arrow-left"></i>
                        </span>
                        <span class="text">
                            Kembali
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('user/changepassword'); ?>" method="post">
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="current_password">Password Lama</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        <?= form_error('current_password', '<p class="text-danger pl-3">', '</p>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="new_password1">Password Baru</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="new_password1" name="new_password1">
                        <?= form_error('new_password1', '<p class="text-danger pl-3">', '</p>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="new_password2">Konfirmasi Password</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="new_password2" name="new_password2">
                        <?= form_error('new_password2', '<p class="text-danger pl-3">', '</p>'); ?>
                    </div>
                </div>
                <div class="row form-group justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>