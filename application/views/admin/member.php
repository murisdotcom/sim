<div class="container-fluid">
    <!-- Page Heading -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <!-- pagination -->
    <!-- <div class="row mt-3 mb-3">
        <div class="col-md-5">
            <form action="<?= base_url('admin/member'); ?>" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search member data..." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if (empty($member)) : ?>
        <tr>
            <td>
                <div class="alert alert-danger" role="alert">
                    Member data not found!
                </div>
            </td>
        </tr>
    <?php endif; ?>
    <H5>Result: <?= $total_rows; ?></H5> -->
    <div class="card shadow-sm mb-4 border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Anggota
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('admin/createAccount'); ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-fw fa-user-plus"></i>
                        </span>
                        <span class="text">
                            Tambah data anggota
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Npm</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Jenjang</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($member as $m) : ?>
                        <tr>
                            <th scope="row">
                                <h6><?= ++$start; ?></h6>
                            </th>
                            <td><img src="<?= base_url('assets/img/profile/') . $m['image']; ?>" class="img-thumbnail" style="max-width: 70px;"></td>
                            <td>
                                <h6><?= $m['name']; ?></h6>
                            </td>
                            <td>
                                <h6><?= $m['nim']; ?></h6>
                            </td>
                            <td>
                                <h6><?= $m['majors']; ?></h6>
                            </td>
                            <td>
                                <h6><?= $m['strata']; ?></h6>
                            </td>
                            <td>
                            <?php if($m['is_active'] == 1) : ?>
                                <a href="<?= base_url('admin/OnOff/') . $m['id']. '/'.$m['is_active']; ?>" class="btn btn-success btn-circle btn-sm mb-1"><i class="fas fa-fw fa-power-off "></i></a>
                            <?php else: ?>
                                <a href="<?= base_url('admin/OnOff/') . $m['id']. '/'.$m['is_active']; ?>" class="btn btn-secondary btn-circle btn-sm mb-1"><i class="fas fa-fw fa-power-off"></i></a>
                            <?php endif; ?>
                                <a href="<?= base_url('admin/detail/') . $m['id']; ?>" class="btn btn-primary btn-circle btn-sm mb-1"><i class="fas fa-fw fa-file-pdf"></i></a>

                                <a href="<?= base_url('admin/editmember/') . $m['id']; ?>" class="btn btn-warning btn-circle btn-sm mb-1"><i class="far fa-fw fa-edit"></i></a>

                                <a href="<?= base_url(); ?>admin/deletemember/<?= $m['id']; ?>" class="btn btn-danger btn-circle btn-sm mb-1 button-delete"><i class="far fa-fw fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- pgination -->
<!-- <div class="row justify-content-center">
    <?= $this->pagination->create_links(); ?>
</div> -->
</div>
<!-- End of Main Content -->