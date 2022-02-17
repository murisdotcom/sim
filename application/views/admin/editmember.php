<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        <?= $title; ?>
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('admin/member') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
            <?= form_open_multipart(); ?>
            <input class="form-control" type="hidden" name="id" value="<?= $member['id']; ?>">
            <div class="row form-group">
                <label class="col-md-2 text-md-right" for="name">Nama</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $member['name']; ?>" autocomplete="off">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-2 text-md-right" for="nim">Npm</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= $member['nim']; ?>" autocomplete="off">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-2 text-md-right" for="majors">Jurusan</label>
                <div class="col-md-9">
                    <select class="form-control" id="majors" name="majors">
                        <?php foreach ($majors as $m) : ?>
                            <?php if ($m == $member['majors']) : ?>
                                <option value="<?= $m; ?>" selected><?= $m; ?></option>
                            <?php else : ?>
                                <option value="<?= $m; ?>"><?= $m; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-2 text-md-right" for="strata">Jenjang</label>
                <div class="col-md-9">
                    <select class="form-control" id="strata" name="strata">
                        <?php foreach ($strata as $s) : ?>
                            <?php if ($s == $member['strata']) : ?>
                                <option value="<?= $s; ?>" selected><?= $s; ?></option>
                            <?php else : ?>
                                <option value="<?= $s; ?>"><?= $s; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-2 text-md-right" for="phone_number">No. HP</label>
                <div class="col-md-9">
                    <input type="numberic" class="form-control" id="phone_number" name="phone_number" value="<?= $member['phone_number']; ?>" autocomplete="off">
                    <?= form_error('phone_number', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-2 text-md-right" for="email">Email</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $member['email']; ?>" readonly>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-2 text-md-right" for="email">Profile</label>
                <div class="col-md-2">
                    <img src="<?= base_url('assets/img/profile/') . $member['image']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-7">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                        <hr>
                        <h6 style="color: red;">* Perhatian!
                            <ul style="color: black;">
                                <br>
                                <li>Max ukuran photo = 2 Mb</li>
                                <br>
                                <li>Format photo = .gif | .jpg | .img | .png</li>
                            </ul>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="row form-group justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>