<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
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
                    <a href="<?= base_url('menu'); ?>" data-toggle="modal" data-target="#newSubMenu" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-fw fa-plus-square"></i>
                        </span>
                        <span class="text">
                            Tambah SubMenu Baru
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="h6 table table-striped dt-responsive nowrap" style="text-align: center;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Aktif</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <td scope="row">
                                <h6><?= $i; ?></h6>
                            </td>
                            <td>
                                <h6><?= $sm['title']; ?></h6>
                            </td>
                            <td>
                                <h6><?= $sm['menu']; ?></h6>
                            </td>
                            <td>
                                <h6><?= $sm['url']; ?></h6>
                            </td>
                            <td>
                                <h6><?= $sm['icon']; ?></h6>
                            </td>
                            <td>
                                <h6><?= $sm['is_active']; ?></h6>
                            </td>
                            <td class="float-center">
                                <a href="<?= base_url('menu/editSubMenu/') . $sm['id']; ?>" style="color: white;" class="btn btn-warning btn-circle btn-sm mb-1"><i class="far fa-fw fa-edit"></i></a>

                                <a href="<?= base_url(); ?>menu/deleteSubMenu/<?= $sm['id']; ?>" class="btn btn-danger btn-circle btn-sm mb-1 button-delete" style="color: white;"><i class="far fa-fw fa-trash-alt"></i></a>
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

<div class="modal fade" id="newSubMenu" tabindex="-1" role="dialog" aria-labelledby="newSubMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuLabel">Tambah SubMenu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nama Submenu">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="menu_id" name="menu_id">
                            <option value="">Pilih Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-label" type="checkbox" name="is_active" id="is_active" value="1" checked>
                            <label class="form-check-label" for="is_active">
                                <h5 style="color: green">Aktif?</h5>
                            </label>
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Submenu</button>
                </div>
            </form>
        </div>
    </div>
</div>