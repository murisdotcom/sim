<div class="container-fluid">
    <h3>Pengisian Identitas Mahasiswa Laporan Tugas Akhir atau Skripsi</h3>
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        <?= $title; ?>
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('user/laporan'); ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
        <div class="card-body">
            <?= form_open_multipart('user/editlaporan'); ?>
            <input type="hidden" id="id" name="id" value="<?= $user['id']; ?>">
            <div class="row form-group">
                <label class="col-md-2 text-md-right" for="title">Judul</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="title" name="title" placeholder=" Title of the thesis..." autocomplete="off">
                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-2 text-md-right" for="file_name">File</label>
                <div class="col-md-2">
                    <i class="fas fa-file-pdf"></i>
                </div>
                <div class="col-sm-7">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file_name" name="file_name">
                        <label class="custom-file-label" for="file_name">Choose file</label>
                        <hr>
                        <h6 style="color: red;">* Perhatian!
                            <ul style="color: black;">
                                <br>
                                <li>Max ukuran file = 2 Mb</li>
                                <br>
                                <li>Format file = .pdf</li>
                            </ul>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="row form-group justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Upload file</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>