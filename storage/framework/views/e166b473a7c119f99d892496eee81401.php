

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Daftar Transaksi</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Tanggal Sewa</th>
                                <th>Mulai Sewa</th>
                                <th>Lama Sewa</th>
                                <th>Mobil</th>
                                <th>Customer</th>
                                <th>Sopir</th>
                                <th>Waktu Pembuatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $transaksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($transaksi->id); ?></td>
                                <td><?php echo e($transaksi->created_at); ?></td>
                                <td><?php echo e($transaksi->tanggalSewa); ?></td>
                                <td><?php echo e($transaksi->mulaiSewa); ?></td>
                                <td><?php echo e($transaksi->lamaSewa); ?></td>
                                <td><?php echo e($transaksi->mobil->nama); ?></td>
                                <td><?php echo e($transaksi->customer->nama); ?></td>
                                <td><?php echo e($transaksi->sopir->nama); ?></td>
                                <td><?php echo e($transaksi->created_at); ?></td>
                                <td>
                                    <?php if($transaksi->selesai): ?>
                                        <span>Transaksi Selesai</span>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('transaksi.showConfirmation', $transaksi->id)); ?>">Konfirmasi</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\cartogo\resources\views/trans.blade.php ENDPATH**/ ?>