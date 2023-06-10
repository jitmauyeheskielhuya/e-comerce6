<?= $this->extend('template/home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Data Subkriteria</h4>
    <div class="content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">

            <div class="card-body bg-stone-300 rounded-md shadow-md">
              <h5 class="card-title mb-2">Tabel SubKriteria</h5>
              <a href="" class="bg-emerald-300 rounded-md shadow-md text-black text-base px-2 py-2 hover:bg-emerald-200"><b>Tambah SubKriteria</b></a>
              <p class="card-text">
              </p>
              <div class="table-responsive">
                <table class="datatable table table-stripped">
                  <thead class="bg-stone-400">
                    <tr>
                      <th>No</th>
                      <th>Ukuran Noken</th>
                      <th>Harga Noken</th>
                      <th>aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td>21x24</td>
                      <td>100.000</td>
                      <td>
                        <a href="" class="bg-cyan-500 px-2 py-2 rounded-md text-black mr-3"><i class="fa fa-edit text-black mr-2"></i>edit</a>
                        <a href="" class="bg-red-500 px-2 py-2 rounded-md text-black"><i class="fa fa-trash text-black mr-2"></i>delete</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="bg-slate-400 mt-96 rounded-t-md">
    <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
  </footer>
</div>
<?= $this->endSection(); ?>