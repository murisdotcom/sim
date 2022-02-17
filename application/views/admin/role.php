<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="card shadow-sm mb-4 border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        <?= $title; ?>
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('role'); ?>" data-toggle="modal" data-target="#newRoleModal" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-fw fa-plus-square"></i>
                        </span>
                        <span class="text">
                            Tambah Role Baru
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="h6 table table-striped dt-responsive nowrap" style="text-align: center;">
                <thead class="thead-dark">
                    <tr>
                        <th width="30">No.</th>
                        <th>Role</th>
                        <th style="text-align: end;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if ($role) :
                        foreach ($role as $r) :
                    ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $r['role']; ?>
                                </td>
                                <td class="float-right">
                                    <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-info btn-circle btn-sm mb-1"><i class="fas fa-fw fa-info-circle"></i></a>

                                    <a href="<?= base_url(); ?>admin/roleEdit/<?= $r['id']; ?>" class="btn btn-warning btn-circle btn-sm mb-1"><i class="far fa-fw fa-edit"></i></a>

                                    <a href="<?= base_url(); ?>admin/roleDelete/<?= $r['id']; ?>" class="btn btn-danger btn-circle btn-sm mb-1 button-delete"><i class="far fa-fw fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach;
                    else : ?>
                        <tr>
                            <td colspan="8" class="text-center">Silahkan tambahkan role baru</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambah role baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Nama role">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>