<?= $this->extend('template/home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-60">Data Kriteria</h4>
  </div>
  <div>
    <a href="<?= base_url('/admin/create') ?>">Create</a>
  </div>
  <footer class="bg-slate-400 mt-96 rounded-t-md">
    <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
  </footer>
</div>
<?= $this->endSection(); ?>