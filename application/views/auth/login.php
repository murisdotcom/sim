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

                        <h4 class="header-content" style="text-align: center;">LOGIN</h4>

                        <form class="user" method="post" action="<?= base_url('auth'); ?>" accept-charset="UTF-8">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group" style="position: relative;">
                                <button type="submit" class="btn btn-success center-block" style="width: 50%;;"><span>Login</span></button>
                            </div>
                            <div class="text-center">
                                <a href="<?= base_url('auth/forgotpassword'); ?>" style="position: relative; color: red">Forgot Password ?</a>
                                <br><br>
                                <a href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
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