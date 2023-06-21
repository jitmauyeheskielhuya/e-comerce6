<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Halaman Tambah Produk</h4>
    <div class="row">
      <div class="bg-slate-100 col-5 p-4 rounded-md shadow-md">
        <h1 class="text-2xl font-bold mb-2 text-emerald-400">Form Input Noken</h1>

        <?php
        $inputs = session()->getFlashdata('inputs');
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
          <div class="alert alert-danger">
            Ada Kesalahan :
            <ul>
              <?php foreach ($errors as $errors => $value) { ?>
                <li>
                  <?= esc($errors); ?>
                </li>
              <?php } ?>
            </ul>
          </div>
        <?php } ?>

        <form action="<?= base_url('pengrajin/update_produk/' . $produk['id_produk']) ?>" method="post">
          <div class="mb-4">
            <label for="harga" class="block font-medium mb-2 text-emerald-400">Harga Noken</label>
            <input type="text" value="<?= $produk['harga_noken'] ?>" name="harga_noken" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
          </div>
          <div class="mb-4">
            <label for="ukuran" class="block font-medium mb-2 text-emerald-400">Ukuran Noken</label>
            <input type="text" value="<?= $produk['ukuran_noken'] ?>" name="ukuran_noken" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
          </div>
          <div class="mb-4">
            <label for="motif" class="block font-medium mb-2 text-emerald-400">Motif Noken</label>
            <input type="text" value="<?= $produk['motif_noken'] ?>" name="motif_noken" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
          </div>
          <div class="mb-4">
            <label for="jenis" class="block font-medium mb-2 text-emerald-400">Jenis Noken</label>
            <input type="text" value="<?= $produk['jenis_noken'] ?>" name="jenis_noken" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
          </div>
          <div class="mb-4">
            <label for="pengrajin" class="block font-medium mb-2 text-emerald-400">Nama Pengrajin</label>
            <input type="text" value="<?= $produk['nama_pengrajin'] ?>" name="nama_pengrajin" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
          </div>
          <div class="mb-4">
            <label for="lokasi" class="block font-medium mb-2 text-emerald-400">Lokasi Penjualan</label>
            <input type="text" value="<?= $produk['lokasi_penjualan'] ?>" name="lokasi_penjualan" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
          </div>
          <div class="mb-4">
            <label for="gambar" class="block font-medium mb-2 text-emerald-400">Gambar Noken</label>
            <input type="file" value="<?= $produk['gambar_noken'] ?>" name="gambar_noken" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
          </div>
          <div class="mb-4">
            <label for="tgl_daftar" class="block font-medium mb-2 text-emerald-400">Tanggal Daftar</label>
            <input type="date" value="<?= $produk['tgl_daftar'] ?>" name="tgl_daftar" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
          </div>
          <div class="flex justify-start">
            <button type="submit" class="bg-emerald-500 hover:bg-emerald-400 text-white py-2 px-4 rounded-md shadow-md">Simpan</button>
          </div>
        </form>
      </div>
    </div>
    <footer class=" bg-slate-400 mt-96 rounded-t-md">
      <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
    </footer>
  </div>
  <?= $this->endSection(); ?>