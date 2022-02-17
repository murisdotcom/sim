<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <!-- pagination -->
    <!-- <div class="row mt-3 mb-3">
        <div class="col-md-5">
            <form action="<?= base_url('user/search'); ?>" method="post">
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
    <H5>Jumlah: <?= $total_rows; ?></H5> -->
    <div class="card shadow-sm mb-4 border-bottom-primary">
        <div class="table-responsive">
            <table class="table table-striped w-100 dt-responsive nowrap" id="dataView">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($member as $m) : ?>
                        <tr>
                            <th scope="row">
                                <h6><?= ++$start; ?></h6>
                            </th>
                            <td>
                                <h6><?= $m['title']; ?></h6>
                            </td>
                            <td>
                                <h6><?= $m['author']; ?></h6>
                            </td>
                            <td>
                                <h6 <?= $m['publication_year']; ?>></h6>
                            </td>
                            <td>
                                <a href="<?= base_url('user/detail/') . $m['id']; ?>" class="btn btn-primary btn-circle btn-sm mb-1"><i class="fas fa-fw fa-file-pdf"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-center">
        <?= $this->pagination->create_links(); ?>
    </div>
</div>
</div>