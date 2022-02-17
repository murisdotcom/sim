<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        <?= $title; ?> Tugas Akhir atau Skripsi
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('user/editlaporan/') . $user['id']; ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-fw fa-edit"></i>
                        </span>
                        <span class="text">
                            Edit Karya Tulis Ilmiah
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row form-group">
                <table class="table">
                    <tr>
                        <th width="200">Judul</th>
                        <td><?= $member['title']; ?></td>
                    </tr>
                    <tr>
                        <th width="200">Penulis</th>
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

            </div>
        </div>
    </div>
</div>
</div>