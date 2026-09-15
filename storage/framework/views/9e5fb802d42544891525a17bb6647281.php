



<?php $__env->startSection('title', 'Login'); ?>


<?php $__env->startSection('content'); ?>


<div class="text-center">
  <h1>
    Ringkasan Hari Ini
    <small class="text-muted">
      (<?php echo e($tanggalHariIni->translatedFormat('l, d F Y')); ?>)
    </small>
  </h1>

  <div class="row">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\User::class)): ?>
    <div class="col-md-12">
      <h1>Today's Sales</h1>
    </div>

    <div class="col-md-6">
      <div class="card text-center">
        <div class="card-header">
          Total Nilai Penjualan Hari ini
        </div>
        <div class="card-body">
          <h4>Rp. <?php echo e(number_format($ringkasan['total_penjualan'])); ?></h4>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card text-center">
        <div class="card-header">
          Jumlah transaksi hari ini
        </div>
        <div class="card-body">
          <h4><?php echo e(number_format($ringkasan['total_transaksi'])); ?></h4>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <h1>Cash &amp; Payment Status</h1>
    </div>

    <div class="col-md-6">
      <div class="card text-center">
        <div class="card-header">
          Total pembayaran tunai
        </div>
        <div class="card-body">
          <h4>Rp. <?php echo e(number_format($ringkasan['total_cash'])); ?></h4>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card text-center">
        <div class="card-header">
          Total pembayaran non tunai
        </div>
        <div class="card-body">
          <h4>Rp. <?php echo e(number_format($ringkasan['total_non_tunai'])); ?></h4>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <div class="col-md-12">
      <h1>Critical Inventory Status</h1>
    </div>

    <div class="col-md-6">
      <h3>Daftar produk stok rendah</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">nama</th>
            <th scope="col">stok</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $produkStokRendah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td><?php echo e($produkStokRendah->firstItem() + $index); ?></td>
              <td><?php echo e($produk->nama); ?></td>
              <td><?php echo e($produk->stok); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="3" class="text-muted text-center">
                Seluruh produk berada dalam kondisi stok aman.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
      <?php echo e($produkStokRendah->links()); ?>

    </div>

    <div class="col-md-6">
      <h3>Produk habis stok</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">nama</th>
            <th scope="col">stok</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $produkStokHabis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td><?php echo e($produkStokHabis->firstItem() + $index); ?></td>
              <td><?php echo e($produk->nama); ?></td>
              <td><?php echo e($produk->stok); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="3" class="text-muted text-center">
                Seluruh produk berada dalam kondisi stok aman.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
      <?php echo e($produkStokHabis->links()); ?>

    </div>

    <div class="col-md-12">
      <h1>Best Seller Products</h1>
    </div>
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">nama</th>
            <th scope="col">stok</th>
            <th scope="col">unit terjual</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $produkTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td><?php echo e($produk->nama); ?></td>
              <td><?php echo e($produk->stok); ?></td>
              <td><?php echo e($produk->total_terjual); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="3" class="text-muted text-center">
                Belum ada data penjualan produk.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos9-main\resources\views/dashboard.blade.php ENDPATH**/ ?>