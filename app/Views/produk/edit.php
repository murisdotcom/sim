<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-8">
      <h2 class="my-3">Form Ubah Data Produk</h2>
      <form action="/produk/update/<?= $produk['id']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug" value="<?= $produk['slug']; ?>">
        <input type="hidden" name="gambarLama" value="<?= $produk['gambar']; ?>">
        <div class="form-group row mb-3">
          <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ?'is-invalid':'';?>"
              id="nama_produk" name="nama_produk" autofocus
              value="<?= (old('nama_produk')) ? old('nama_produk') : $produk['nama_produk']?>">
            <div class="invalid-feedback"><?= $validation->getError('nama_produk'); ?></div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="desc_produk" class="col-sm-2 col-form-label">Kegunaan</label>
          <div class="col-sm-10">
            <!-- <input type="text" class="form-control <?= ($validation->hasError('desc_produk')) ?'is-invalid':'';?>"
              id="desc_produk" name="desc_produk" value="<?= old('desc_produk'); ?>"" id=" desc_produk"> -->

            <textarea class="form-control <?= ($validation->hasError('desc_produk')) ?'is-invalid':'';?>"
              id="desc_produk"
              name="desc_produk"><?= (old('desc_produk')) ? old('desc_produk') : $produk['desc_produk']?></textarea>
            <div class="invalid-feedback"><?= $validation->getError('desc_produk'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="kode_produk" class="col-sm-2 col-form-label">Kode Produk</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('kode_produk')) ?'is-invalid':'';?>"
              id="kode_produk" name="kode_produk"
              value="<?= (old('kode_produk')) ? old('kode_produk') : $produk['kode_produk']?>">
            <div class="invalid-feedback"><?= $validation->getError('kode_produk'); ?></div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
          <div class="col-sm-2">
            <img src="/img/<?= $produk['gambar']; ?>" class="img-thumbnail img-preview">
          </div>
          <div class="col-sm-8">

            <div class="input-group mb-3">
              <input type="file" class="form-control <?= ($validation->hasError('gambar')) ?'is-invalid':'';?>"
              id="gambar" name="gambar" onchange="previewImg()">
              <div class="invalid-feedback"><?= $validation->getError('gambar'); ?></div>
            </div>

          </div>
        </div>

        <a href="/produk/<?= $produk['slug']; ?>" class="btn btn-danger">Cancel</a>

        <button type="submit" class="btn btn-primary">Ubah Data</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>