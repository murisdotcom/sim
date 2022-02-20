<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="mt-2">Daftar Produk MS GLOW</h1>
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
          <tr>
            <th scope="row">1</th>
            <td><img src="/img/fw.jpeg" alt="" class="sampul"></td>
            <td>Facial Wash</td>
            <td>
              <a href="" class="btn btn-success">Detail</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>