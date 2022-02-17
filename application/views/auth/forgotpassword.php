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
                    <div id="login" class="tab-pane fade in active">

                        <h4 class="header-content" style="text-align: center;">Forgot your password ?</h4>

                        <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>" accept-charset="UTF-8">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<p class="text-danger pl-3">', '</p>'); ?>
                            </div>
                            <div class="form-group" style="position: relative;">
                                <button type="submit" class="btn btn-success center-block">Reset Password</button>
                            </div>
                            <div class="text-center">
                                <a href="<?= base_url('auth'); ?>">Back to login!</a>
                            </div>
                        </form>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <hr>
                <div class="hidden-xs">

                </div>
            </div>
            <hr>
        </div>
    </div>