<!-- Begin Page Content -->
<div class="container-fluid">
    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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
                    <a href="<?= base_url('menu'); ?>" data-toggle="modal" data-target="#newMenuModal" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-fw fa-plus-square"></i>
                        </span>
                        <span class="text">
                            Tambah Menu Baru
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="h6 table table-striped dt-responsive nowrap" style="text-align: center;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" width="30">No</th>
                        <th scope="col">Menu</th>
                        <th scope="col" style="text-align: end;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td class="float-right">
                                <a href="<?= base_url(); ?>menu/editMenu/<?= $m['id']; ?>" class="btn btn-warning btn-circle btn-sm mb-1"><i class="far fa-fw fa-edit"></i></a>

                                <a href="<?= base_url(); ?>menu/deleteMenu/<?= $m['id']; ?>" class="btn btn-danger btn-circle btn-sm mb-1 button-delete"><i class="far fa-fw fa-trash-alt"></i></a>
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
<!-- /.container-fluid -->

<!-- Modal -->

<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu" value="<?php $menu_user; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>