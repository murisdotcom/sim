<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="card shadow-sm mb-4 border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Role Akses <?= $role['role']; ?>
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('admin/role') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
        <div class="table-responsive">
            <table class="h6 table table-striped dt-responsive nowrap" id="dataTable">
                <thead class="thead-dark ">
                    <tr>
                        <th width="30">No.</th>
                        <th>Menu</th>
                        <th>Akses</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>