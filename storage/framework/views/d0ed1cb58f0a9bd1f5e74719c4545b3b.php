

<?php $__env->startSection('title', 'Data Jenis'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row align-items-center mb-3">
        <div class="col">
            <h1 class="mb-0">Data Jenis</h1>
        </div>
        <div class="col-auto">
            <a href="<?php echo e(route('jenis.create')); ?>" class="btn btn-primary">
                + Tambah Jenis
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th width="80">No</th>
                        <th>Nama Jenis</th>
                        <th width="220">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>
                            <td>
                                <?php echo e($loop->iteration); ?>

                            </td>

                            <td>
                                <?php echo e($item->nama_jenis); ?>

                            </td>

                            <td>
                                <div class="d-flex gap-2">

                                    
                                    <a href="<?php echo e(route('jenis.edit', $item->id)); ?>"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    
                                    <form action="<?php echo e(route('jenis.destroy', $item->id)); ?>"
                                          method="POST"
                                          onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?')">

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit"
                                                class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>

                                    </form>

                                </div>
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Belum ada data jenis.
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos8-main\resources\views/jenis/index.blade.php ENDPATH**/ ?>