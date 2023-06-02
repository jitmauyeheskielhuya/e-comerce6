<?= $this->extend('template/layout/layout_home'); ?>

<?= $this->Section('page-pengrajin'); ?>

<?php if (in_groups("pengrajin")) : ?>
  <div class="page-wrapper">
    <div class="content container-fluid">
      <h4 class="text-emerald-400 pb-60">Dashboard pengrajin</h4>
    </div>
    <footer class="bg-slate-400 mt-96 rounded-t-md">
      <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
    </footer>
  </div>
<?php endif; ?>

<?= $this->endSection(); ?>