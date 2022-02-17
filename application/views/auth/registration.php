<!-- <div id="main" style="margin-left: 0px;">
    <header style="margin:-20px;margin-bottom:20px;">
        <div class="container-fluid" style="background-color:#031a40;">
            <div class="row top-header">
                <div class="pull-left" style="padding-left:20px;"><strong><?= date('D, d F Y'); ?></strong></div>
            </div>
            <div class="container">
                <div class="row middle-header">
                    <div class="col-xs-12">
                        <div class="img">
                            <img src="<?= base_url('assets/img/Logo Unbaja.png'); ?>" height="" width="70">
                        </div>
                        <div class="text">
                            <h3>Sistem Informasi Administrasi Perpustakaan</h3>
                            <span>UNIVERSITAS BANTEN JAYA</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
            <div class="row">
                <div id="bordertop"></div>
            </div>
            <div class="row top-nav" style="background-color:#031a40;">
                <div class="container">

                </div>
            </div>
        </div>

    </header> -->
    <div class="container body" style="margin-top:25px;margin-bottom:25px;padding-top:25px;">
        <div class="row">
            <div class="col-md-9">
                <div style="background:#031a40 url(<?= base_url('assets/img/siap.PNG'); ?>);background-size: 100%;background-position: 50%; background-repeat:no-repeat;">
                    <iframe style="width:100%;height:370px;border: none;" src=""></iframe>
                </div>
            </div>
            <div class="col-md-3">
                <div style="border-left: medium solid #031a40;padding-left: 10px;">
                    <h4 class="header-content" style="text-align: center;">Create an Account</h4>

                    <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full name" value="<?= set_value('name'); ?>" autocomplete="off">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nim" name="nim" placeholder="NIM" value="<?= set_value('nim'); ?>" autocomplete="off">
                            <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-user" id="majors" name="majors" value="<?= set_value('majors'); ?>">
                                <option label="Select Majors"></option>
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
                        <div class="form-group" style="margin-top: 7%">
                            <select class="form-control form-control-user" id="strata" name="strata" value="<?= set_value('strata'); ?>">
                                <option label="Select Strata"></option>
                                <option value="DIII">DIII</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?= set_value('phone_number'); ?>" autocomplete="off">
                            <?= form_error('phone_number', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>" autocomplete="off">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class=" form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Register Account
                        </button>
                    </form>
                    <br>
                    <div class="text-center">
                        <a href="<?= base_url(); ?>">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>