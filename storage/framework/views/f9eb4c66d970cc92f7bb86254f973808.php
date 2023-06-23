

<?php $__env->startSection('title', 'Halaman Daftar Sopir'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Daftar Sopir</h1>
        <a href="<?php echo e(route('sopir.create')); ?>" class="btn btn-primary mb-3">Tambah Sopir</a>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Foto Supir</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor HP</th>
                    <th>Harga Jasa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $sopir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e(Storage::url($s->gambar)); ?>" alt="gambar" loading="lazy" width="50" height="50"></td>
                        <td><?php echo e($s->id); ?></td>
                        <td><?php echo e($s->nama); ?></td>
                        <td><?php echo e($s->nomorHP); ?></td>
                        <td><?php echo e($s->hargaJasa); ?></td>
                        <td>
                            <a href="<?php echo e(route('sopir.edit', $s->id)); ?>" class="btn btn-primary btn-sm">Edit</a> <!-- Tombol Edit -->
                            <form action="<?php echo e(route('sopir.destroy', $s->id)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus sopir ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\cartogo\resources\views/sopir/index.blade.php ENDPATH**/ ?>