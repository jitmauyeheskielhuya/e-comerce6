<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Halaman Create Subkriteria</h4>
    <div class="">
      <div class="row">
        <div class="col-6 mx-60 ml-10 bg-slate-200 p-3 rounded-md pr-5">
          <form action="<?= base_url('admin/save_subkriteria'); ?>" method="post">
            <div class="mb-4">
              <label class="block text-emerald-400 font-medium text-base mb-2">Nama Subkriteria</label>
              <input type="text" name="nama_subkriteria" class="w-full border-gray-300 focus:border-indigo-500 rounded-md shadow-md py-2 px-2" required placeholder="Nama Kriteria" autofocus>
            </div>
            <div class="mb-4">
              <label class="block text-emerald-400 font-medium text-base mb-2">Nilai Subkriteria</label>
              <input type="text" name="nilai_subkriteria" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-md py-2 px-2" required placeholder="Bobot Kriteria">
            </div>
            <div class="mt-6">
              <button type="submit" class="inline-flex items-center px-4 py-2 bg-emerald-500 border border-transparent rounded-md font-semibold text-slate-900 hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md">
                <i class=""></i>
                Simpan
              </button>
            </div>
            <div class="mt-6">
              <a href="<?= base_url('/subkriteria') ?>" class="bg-emerald-500 px-2 py-2.5 rounded-md text hover:bg-emerald-400 text-slate-900 font-bold shadow-md hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="fa fa-backward mr-1"></i>Kembali</a>
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