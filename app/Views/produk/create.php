<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-8">
      <h2 class="my-3">Form Tambah Data Produk</h2>
      <form action="/produk/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row mb-3">
          <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ?'is-invalid':'';?>"
              id="nama_produk" name="nama_produk" autofocus value="<?= old('nama_produk'); ?>">
            <div class="invalid-feedback"><?= $validation->getError('nama_produk'); ?></div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="desc_produk" class="col-sm-2 col-form-label">Kegunaan</label>
          <div class="col-sm-10">
            <!-- <input type="text" class="form-control <?= ($validation->hasError('desc_produk')) ?'is-invalid':'';?>"
              id="desc_produk" name="desc_produk" value="<?= old('desc_produk'); ?>"" id=" desc_produk"> -->

            <textarea class="form-control <?= ($validation->hasError('desc_produk')) ?'is-invalid':'';?>"
              id="desc_produk" name="desc_produk"><?= old('desc_produk'); ?></textarea>
            <div class="invalid-feedback"><?= $validation->getError('desc_produk'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="kode_produk" class="col-sm-2 col-form-label">Kode Produk</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('kode_produk')) ?'is-invalid':'';?>"
              id="kode_produk" name="kode_produk" value="<?= old('kode_produk'); ?>">
            <div class="invalid-feedback"><?= $validation->getError('kode_produk'); ?></div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
          <div class="col-sm-10">

            <!-- <input type="text" class="form-control <?= ($validation->hasError('gambar')) ?'is-invalid':'';?>" id="gambar"
          name="gambar" value="<?= old('gambar'); ?>"> -->

            <div class="input-group mb-3">
              <input type="file" class="form-control" id="gambar">
              <label class="input-group-text" for="gambar">Upload</label>
            </div>

            <div class="invalid-feedback"><?= $validation->getError('gambar'); ?></div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>