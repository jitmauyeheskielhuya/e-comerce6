<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Laporan Data Produk</h4>
    <div class="content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">

            <div class="card-body bg-stone-300 rounded-md shadow-md">
              <h5 class="card-title mb-2">L Data Produk</h5>
              <p class="card-text">
              </p>
              <div class="table-responsive">
                <table class="datatable table table-stripped">
                  <thead class="bg-stone-400">
                    <tr>
                      <th>No</th>
                      <th>Perkembangan Per Minggu</th>
                      <th>Perkembangan Per Bulan</th>
                      <th>Perkembangan Per Tahun</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td>20%</td>
                      <td>50%</td>
                      <td>75%</td>
                      <td>
                        <a href="" class="bg-cyan-500 px-2 py-2 rounded-md text-black mr-3 shadow-md"><i class="fa fa-eye text-black mr-2"></i>Detail Transaksi</a>
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