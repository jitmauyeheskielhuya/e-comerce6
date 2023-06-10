<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Halaman Data Kriteria</h4>
    <div class="">
      <a href="" class="bg-emerald-200	text-black p-2 mt-2 rounded border-emerald-800 border-1">Tambah data </a>
      <table class="table bg-slate-200 rounded-md divide-gray-200 mt-3">
        <thead class="divide-gray-200">
          <tr class="bg-emerald-800 text-center">
            <th scope="col" class="text-white  border-black border-1">No</th>
            <th scope="col" class="text-white  border-black border-1">Jenis/motif Noken</th>
            <th scope="col" class="text-white  border-black border-1">Jenis Rajutan</th>
            <th scope="col" class="text-white  border-black border-1">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <tr>
            <th class=" border-black border-1 ">1</th>
            <td class=" border-black border-1 ">Mark</td>
            <td class=" border-black border-1 ">Otto</td>
            <td class=" border-black border-1 ">
              <a href="" class="bg-emerald-800 rounded p-2 text-white"><i class="fa fa-eye"></i></a>
              <a href="" class="bg-blue-800 rounded p-2 text-white"><i class="fa fa-pen"></i></a>
              <a href="" class="bg-red-800 rounded p-2 text-white"><i class="fa fa-trash"></i></a>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>

  <footer class="bg-slate-400 mt-96 rounded-t-md">
    <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
  </footer>
</div>
<?= $this->endSection(); ?>