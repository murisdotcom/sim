<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Create an Account
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('admin/member') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-arrow-left"></i>
                        </span>
                        <span class="text">
                            Kembali
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/createAccount'); ?>">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>" autocomplete="off">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Npm" value="<?= set_value('nim'); ?>" autocomplete="off">
                    <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <select class="form-control" id="majors" name="majors" value="<?= set_value('majors'); ?>">
                        <option label="Pilih Jurusan"></option>
                        <optgroup label="Fakultas Teknik">
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Lingkunga">Teknik Lingkungan</option>
                        <optgroup label="Fakultas Ilmu Komputer">
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Manajemen Informatika">Manajemen Informatika</option>
                            <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                        <optgroup label="Fakultas Keguruan & Ilmu Pendidikan">
                            <option value="Pendidikan PKN">Pendidikan PKN</option>
                            <option value="Pendidikan Akuntansi">Pendidikan Akuntansi</option>
                            <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                        <optgroup label="Fakultas Ekonomi & Bisnis">
                            <option value="Kewirausahaan">Kewirausahaan</option>
                            <option value="Manajemen Retail">Manajemen Retail</option>
                            <option value="Administrasi Kesehatan">Administrasi Kesehatan</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="strata" name="strata" value="<?= set_value('strata'); ?>">
                        <option label="Pilih Jenjang"></option>
                        <option value="DIII">DIII</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="No. HP" value="<?= set_value('phone_number'); ?>" autocomplete="off">
                    <?= form_error('phone_number', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>" autocomplete="off">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class=" form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Buat Akun
                </button>
            </form>
        </div>
    </div>
</div>
</div>