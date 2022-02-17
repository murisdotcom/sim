<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        <?=$title;?>
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('user/search') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
            <div class="row">
                <div class="col-md-10">
                    <h6>
                        <table class="table">
                            <tr>
                                <th width="200">Nama</th>
                                <td><?= $user['name']; ?></td>
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
                                <th>Judul</th>
                                <td><?= $user['title']; ?></td>
                            </tr>
                            <tr>
                                <th>File</th>
                                <td><i class="fas fa-file-pdf"> <a href="<?= base_url('user/openPdf/'). $member['file']; ?>"><?= $member['file']; ?></a></i></td>
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