

<?php $__env->startSection('title', 'Edit Customer'); ?>

<?php $__env->startSection('fil'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Edit Data Diri</h1>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('customer.update', ['id' => $customer->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo e($customer->nama); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="noHp">No. HP:</label>
                        <input type="text" name="noHp" class="form-control" value="<?php echo e($customer->noHp); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" value="<?php echo e($customer->email); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea name="alamat" class="form-control" rows="3" required><?php echo e($customer->alamat); ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.transscreen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\cartogo\resources\views/customer/edit.blade.php ENDPATH**/ ?>