<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Data Akun Baru</h4>
    <div class="content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">

            <div class="card-body bg-slate-200 rounded-md shadow-md">
              <h5 class="card-title mb-2">Default Datatable</h5>
              <p class="card-text">
              </p>
              <div class="table-responsive">
                <table class="datatable table table-stripped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>Shou Itou</td>
                      <td>Regional Marketing</td>
                      <td>Tokyo</td>
                      <td>20</td>
                      <td>2011/08/14</td>
                      <td>$163,000</td>
                    </tr>
                  </tbody>
                </table>
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