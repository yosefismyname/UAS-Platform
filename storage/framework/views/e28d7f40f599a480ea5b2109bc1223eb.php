

<?php $__env->startSection('title', 'Halaman Edit Mobil'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Mobil</div>

                    <div class="card-body">
                        <form action="<?php echo e(route('mobil.update', $mobil->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="form-group">
                                <label for="plat">Plat</label>
                                <input type="text" class="form-control" id="plat" name="plat"
                                    value="<?php echo e($mobil->plat); ?>" required>
                            </div>

                            <div class="form-group mb-3 mt-3">
                                <label for="gambar">Gambar</label>
                                <br>
                                <input type="file" class="form-control-file" id="gambar" name="gambar"
                                    value="<?php echo e($mobil->gambar); ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="merk">Merk</label>
                                <input type="text" class="form-control" id="merk" name="merk"
                                    value="<?php echo e($mobil->merk); ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tipe" class="form-label">Tipe Mobil</label>
                                <select class="form-control <?php $__errorArgs = ['tipe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tipe" name="tipe">
                                    <option value="manual" <?php echo e(old('tipe', $mobil->tipeMobil) == 'manual' ? 'selected' : ''); ?>>Manual</option>
                                    <option value="automatic" <?php echo e(old('tipe', $mobil->tipeMobil) == 'automatic' ? 'selected' : ''); ?>>Automatic</option>
                                </select>
                                <?php $__errorArgs = ['tipe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group mb-3">
                                <label for="kapasitas">Kapasitas</label>
                                <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                                    value="<?php echo e($mobil->kapasitas); ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tahunproduksi">Tahun Produksi</label>
                                <select class="form-control" id="tahunproduksi" name="tahunproduksi" required>
                                    <?php for($i = 2001; $i <= 2023; $i++): ?>
                                        <option value="<?php echo e($i); ?>"
                                            <?php echo e($mobil->tahunproduksi == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="hargasewa">Harga Sewa</label>
                                <input type="number" class="form-control" id="hargasewa" name="hargasewa"
                                    value="<?php echo e($mobil->hargasewa); ?>" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\cartogo\resources\views/mobil/edit.blade.php ENDPATH**/ ?>