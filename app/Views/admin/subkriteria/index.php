<?= $this->extend('template/home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Data Subkriteria</h4>
    <div class="row pt-4 pb-4 rounded-md bg-slate-200">
      <div class="col">
        <a href="#" class="px-3 py-2 rounded-md hover:bg-emerald-400 bg-emerald-300 shadow-md text-slate-900 hover:text-slate-900 font-bold">Tambah Data</a>
        <table class="w-full border border-slate-900 mt-4 text-center">
          <thead>
            <tr class="bg-emerald-200">
              <th class="py-2 px-4 border-b">ID</th>
              <th class="py-2 px-4 border-b">Nama Produk</th>
              <th class="py-2 px-4 border-b">Harga</th>
              <th class="py-2 px-4 border-b">Stok</th>
              <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-emerald-100">
              <td class="py-3 px-4 border-b">1</td>
              <td class="py-3 px-4 border-b">Produk A</td>
              <td class="py-3 px-4 border-b">Rp 100.000</td>
              <td class="py-3 px-4 border-b">10</td>
              <td class="py-3 px-4 border-b">
                <a href="" class="bg-emerald-800 rounded p-2 text-white"><i class="fa fa-eye"></i></a>
                <a href="" class="bg-blue-800 rounded p-2 text-white"><i class="fa fa-pen"></i></a>
                <a href="" class="bg-red-800 rounded p-2 text-white"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <footer class="bg-slate-400 mt-96 rounded-t-md">
    <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
  </footer>
</div>
<?= $this->endSection(); ?>