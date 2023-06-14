<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Halaman Create Produk</h4>
    <div class="">
      <div class="row">
        <div class="col-6 mx-60 ml-10 bg-slate-200 p-3 rounded-md pr-5">
          <form>
            <div>
              <label for="harga-noken" class="block text-sm font-medium text-gray-700">Harga Noken</label>
              <input type="text" id="harga-noken" name="harga-noken" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mt-4">
              <label for="ukuran-noken" class="block text-sm font-medium text-gray-700">Ukuran Noken</label>
              <input type="text" id="ukuran-noken" name="ukuran-noken" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mt-4">
              <label for="motif-noken" class="block text-sm font-medium text-gray-700">Motif Noken</label>
              <input type="text" id="motif-noken" name="motif-noken" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mt-4">
              <label for="jenis-noken" class="block text-sm font-medium text-gray-700">Jenis Noken</label>
              <input type="text" id="jenis-noken" name="jenis-noken" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mt-4">
              <label for="nama-pengrajin" class="block text-sm font-medium text-gray-700">Nama Pengrajin</label>
              <input type="text" id="nama-pengrajin" name="nama-pengrajin" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mt-4">
              <label for="nama-pengrajin" class="block text-sm font-medium text-gray-700">Lokasi Penjualan Produk</label>
              <input type="text" id="nama-pengrajin" name="nama-pengrajin" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mt-4">
              <label for="gambar-noken" class="block text-sm font-medium text-gray-700">Upload Gambar Produk</label>
              <input type="file" id="gambar-noken" name="gambar-noken" class="mt-1 block">
            </div>
            <div class="mt-6">
              <button type="submit" class="inline-flex items-center px-4 py-2 bg-emerald-500 border border-transparent rounded-md font-semibold text-slate-900 hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md">
                <i class=""></i>
                Simpan
              </button>
            </div>
            <div class="mt-6">
              <a href="<?= base_url('/produk') ?>" class="bg-emerald-500 px-2 py-2.5 rounded-md text hover:bg-emerald-400 text-slate-900 font-bold shadow-md hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="fa fa-backward mr-1"></i>Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <footer class="bg-slate-400 mt-96 rounded-t-md">
    <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
  </footer>
</div>
<?= $this->endSection(); ?>