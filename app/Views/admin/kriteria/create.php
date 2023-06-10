<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Halaman Create</h4>
    <div class="">
      <div class="row">
        <div class="col-6 mx-60 ml-10 bg-slate-200 p-3 rounded-md pr-5">
          <form>
            <div>
              <label for="jenis-noken" class="block text-sm font-medium text-gray-700">Jenis/Motif Noken</label>
              <select id="jenis-noken" name="jenis-noken" class="mt-1 block w-full p-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="motif1">Motif Garis-Garis</option>
                <option value="motif2">Motif Ketupat</option>
                <option value="motif3">Motif Motif Polos Saja Dan Tidak Berwarna</option>
                <option value="motif3">Motif Rasta</option>
                <option value="motif3">Motif Rasta dan Tulisan Papua</option>
                <option value="motif3">Motif Tulisan Papua</option>
                <option value="motif3">Motif Motif Warna Merah dan Tulisan Papua</option>
                <option value="motif3">Motif Bendera</option>
                <option value="motif3">Motif Garis Naik Turun</option>
                <!-- Tambahkan opsi motif lainnya sesuai kebutuhan -->
              </select>
            </div>
            <div class="mt-4">
              <label for="jenis-rajutan" class="block text-sm font-medium text-gray-700">Jenis Rajutan</label>
              <select id="jenis-rajutan" name="jenis-rajutan" class="mt-1 block w-full p-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="rajutan1">Benang Wol</option>
                <option value="rajutan2">Benang Kulit Kayu</option>
                <option value="rajutan3">Kulit Kayu</option>
                <!-- Tambahkan opsi rajutan lainnya sesuai kebutuhan -->
              </select>
            </div>
            <div class="mt-6">
              <button type="submit" class="inline-flex items-center px-4 py-2 bg-sky-400 border border-transparent rounded-md font-semibold text-white hover:bg-sky-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md">
                Simpan
              </button>
            </div>
            <div class="mt-6">
              <a href="<?= base_url('/kriteria') ?>" class="bg-sky-400 px-4 py-2 rounded-md hover:bg-sky-300 text-slate-900 font-bold shadow-md"><i class="fa fa-backward mr-1"></i>Kembali</a>
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