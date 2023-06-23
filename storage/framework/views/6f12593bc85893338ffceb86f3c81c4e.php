

<?php $__env->startSection('title', 'Halaman Daftar Customer'); ?>

<?php $__env->startSection('fil'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form Transaksi</h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('transaksi.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="tanggalSewa">Tanggal Sewa:</label>
                    <input type="date" name="tanggalSewa" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="mulaiSewa">Mulai Sewa:</label>
                    <input type="time" name="mulaiSewa" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="lamaSewa">Lama Sewa:</label>
                    <input type="number" name="lamaSewa" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="idMobil">ID Mobil:</label>
                    <select name="idMobil" class="form-control" required>
                        <?php $__currentLoopData = $mobils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mobil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($mobil->id); ?>"><?php echo e($mobil->merk); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group" hidden>
                    <label for="idCustomer">ID Customer:</label>
                    <select name="idCustomer" class="form-control">
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->id); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.transscreen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\cartogo\resources\views/book.blade.php ENDPATH**/ ?>