


<?php $__env->startSection('title', 'Halaman Daftar Customer'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Daftar Customer</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($c->id); ?></td>
                        <td><?php echo e($c->nama); ?></td>
                        <td><?php echo e($c->noHp); ?></td>
                        <td><?php echo e($c->email); ?></td>
                        <td><?php echo e($c->alamat); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\cartogo\resources\views/customer/show.blade.php ENDPATH**/ ?>