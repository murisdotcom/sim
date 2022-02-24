<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <a href="produk/create" class="btn btn-primary mt-3">Tambah Data Produk</a>
      <h1 class="mt-2">Daftar Produk MS GLOW</h1>
      <?php if(session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif; ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          <?php foreach($produk as $p) : ?>
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><img src="/img/<?= $p['gambar']; ?>" alt="" class="gambar"></td>
            <td><?= $p['nama_produk']; ?></td>
            <td>
              <a href="/produk/<?= $p['slug']; ?>" class="btn btn-success">Detail</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>