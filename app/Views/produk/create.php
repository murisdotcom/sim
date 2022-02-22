<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-8">
      <h2 class="my-3">Form Tambah Data Produk</h2>
      <?= csrf_field(); ?>
      <form action="/produk/save" method="post">
        <div class="form-group row mb-3">
          <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" autofocus>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="desc_produk" class="col-sm-2 col-form-label">Kegunaan</label>
          <div class="col-sm-10">
            <!-- <input type="text" class="form-control" id="desc_produk"> -->
            <textarea class="form-control" id="desc_produk" name="desc_produk"></textarea>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="kode_produk" class="col-sm-2 col-form-label">Kode Produk</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kode_produk" name="kode_produk">
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="gambar" name="gambar">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>