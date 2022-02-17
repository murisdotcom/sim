<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card p-2 shadow-sm border-bottom-primary">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="card-header bg-white">
            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                <?= $title; ?>
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 mb-4 mb-md-0">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail rounded mb-2">
                    <a href="<?= base_url('user/editprofile'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-fw fa-edit"></i> Edit Profile</a>
                    <a href="<?= base_url('user/changepassword'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-fw fa-lock"></i> Ubah Password</a>
                </div>
                <div class="col-md-10">
                    <h6>
                        <table class="table">
                            <tr>
                                <th width="200">Username</th>
                                <td><?= $user['name']; ?></td>
                            </tr>
                            <tr>
                                <th>Npm</th>
                                <td><?= $user['nim']; ?></td>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td><?= $user['majors']; ?></td>
                            </tr>
                            <tr>
                                <th>Jenjang</th>
                                <td><?= $user['strata']; ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td><?= $user['phone_number']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $user['email']; ?></td>
                            </tr>
                        </table>
                    </h6>
                </div>
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <p class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></p>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->