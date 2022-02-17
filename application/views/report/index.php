<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Form Laporan
                    </h4>
                </div>
                <div class="card-body">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <label class="col-md-3 text-md-right" for="transaksi">Laporan Pendaftaran Anggota</label>
                    <form method="GET" action="content/cetak_lap_anggota.php" target="_blank">
                        <div class='form-group  col-lg-12 row'>
                            <div class='form-group  col-lg-2'>
                                <input type="text" name="tanggal1" class='form-control required' id="datepicker" autocomplete="off" placeholder="tanggal awal">
                            </div>
                            <div class='form-group  col-lg-2'>
                                <input type="text" name="tanggal2" class='form-control required' id="datepicker1" autocomplete="off" placeholder="tanggal akhir">
                            </div>
                            <div class='form-group  col-lg-2'>
                                <button type="submit" name="Cetak" value="Cetak" class="btn btn-primary">Cetak</button>
                            </div>

                        </div>
                    </form>
                    <hr>
                    <label class="col-md-3 text-md-right" for="transaksi">Laporan Karya Tulis Ilmiah</label>
                    <form method="GET" action="content/cetak_lap_ki.php" target="_blank">
                        <div class='form-group  col-lg-12 row'>
                            <div class='form-group  col-lg-2'>
                                <input type="text" name="tanggal1" class='form-control required' id="datepicker2" autocomplete="off" placeholder="tanggal awal">
                            </div>
                            <div class='form-group  col-lg-2'>
                                <input type="text" name="tanggal2" class='form-control required' id="datepicker3" autocomplete="off" placeholder="tanggal akhir">
                            </div>
                            <div class='form-group  col-lg-2'>
                                <button type="submit" name="Cetak" value="Cetak" class="btn btn-primary">Cetak</button>
                            </div>
                        </div>
                    </form>
                    <?= form_open(); ?>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="transaksi">Pilih Laporan</label>
                        <div class="col-md-9">
                            <div class="custom-control custom-radio">
                                <input value="barang_masuk" type="radio" id="barang_masuk" name="transaksi" class="custom-control-input">
                                <label class="custom-control-label" for="barang_masuk">Pendaftaran Anggota</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input value="barang_keluar" type="radio" id="barang_keluar" name="transaksi" class="custom-control-input">
                                <label class="custom-control-label" for="barang_keluar">Karya Tulis Ilmiah</label>
                            </div>
                            <?= form_error('transaksi', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-3 text-lg-right" for="tanggal">Tanggal</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <input value="<?= set_value('tanggal'); ?>" name="tanggal" id="tanggal" type="text" class="form-control" placeholder="Periode Tanggal">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-fw fa-calendar"></i></span>
                                </div>
                            </div>
                            <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-9 offset-lg-3">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-print"></i>
                                </span>
                                <span class="text">
                                    Cetak
                                </span>
                            </button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>