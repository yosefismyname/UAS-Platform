

<?php $__env->startSection('title', 'Halaman Daftar Mobil'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Daftar Mobil</h2>
        <a href="<?php echo e(route('mobil.create')); ?>" class="btn btn-primary mb-3">Tambah Mobil</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Id</th>
                        <th>Plat</th>
                        <th>Merk</th>
                        <th>Kapasitas</th>
                        <th>Tipe Mobil</th>
                        <th>Tahun Produksi</th>
                        <th>Harga Sewa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $mobil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img src="<?php echo e(Storage::url($m->gambar)); ?>" alt="Gambar Mobil" loading="lazy" width="50" height="50"></td>
                            <td><?php echo e($m->id); ?></td>
                            <td><?php echo e($m->plat); ?></td>
                            <td><?php echo e($m->merk); ?></td>
                            <td><?php echo e($m->kapasitas); ?></td>
                            <td><?php echo e($m->tipe); ?></td>
                            <td><?php echo e($m->tahunproduksi); ?></td>
                            <td><?php echo e($m->hargasewa); ?></td>
                            <td>
                                <a href="<?php echo e(route('mobil.edit', $m->id)); ?>" class="btn btn-primary">Edit</a>
                                <form action="<?php echo e(route('mobil.destroy', $m->id)); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\cartogo\resources\views/mobil/index.blade.php ENDPATH**/ ?>