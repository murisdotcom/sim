    <?= $this->extend('layout/template'); ?>

    <?= $this->section('content'); ?>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Contact Us</h1>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil iusto, dolorum nulla voluptate esse
            libero earum magni, ipsum aperiam ratione laboriosam repudiandae doloremque porro et sequi quaerat
            autem iure? Aspernatur.</p>
          <h2>0822-1515-1718</h2>
          <?php foreach($alamat as $a): ?>
          <ul>
            <li><?= $a['tipe']; ?></li>
            <li><?= $a['alamat']; ?></li>
            <li><?= $a['kota']; ?></li>
          </ul>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?= $this->endSection(); ?>