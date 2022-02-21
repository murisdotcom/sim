<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="mt-2">Detail Produk</h2>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/img/<?= $produk['gambar']; ?>" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $produk['nama_produk']; ?></h5>
              <p class="card-text" style="text-align:justify"><?= $produk['desc_produk']; ?></p>
              <p class="card-text"><small class="text-muted">BPOM: <?= $produk['kode_produk']; ?></small></p>

              <a href="" class="btn btn-warning">Edit</a>
              <a href="" class="btn btn-danger">Delete</a>
              <br><br>
              <a href="/produk">Kembali ke daftar produk</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>