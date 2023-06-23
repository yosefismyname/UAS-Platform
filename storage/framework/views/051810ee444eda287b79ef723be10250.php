

<?php $__env->startSection('title', 'Halaman Tambah Mobil'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Mobil</div>

                    <div class="card-body">
                        <form action="<?php echo e(route('mobil.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="plat">Plat:</label>
                                <input type="text" id="plat" name="plat" value="<?php echo e(old('plat')); ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar:</label>
                                <input type="file" id="gambar" name="gambar" value="<?php echo e(old('gambar')); ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="merk">Merk:</label>
                                <input type="text" id="merk" name="merk" value="<?php echo e(old('merk')); ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tipe" class="form-label">Tipe Mobil</label>
                                <select class="form-control <?php $__errorArgs = ['tipe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tipe" name="tipe">
                                    <option value="manual" <?php echo e(old('tipe') == 'manual' ? 'selected' : ''); ?>>Manual</option>
                                    <option value="automatic" <?php echo e(old('tipe') == 'automatic' ? 'selected' : ''); ?>>Automatic</option>
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

                            <div class="form-group">
                                <label for="kapasitas">Kapasitas:</label>
                                <input type="number" id="kapasitas" name="kapasitas" value="<?php echo e(is_array(old('kapasitas')) ? implode(old('kapasitas')) : old('kapasitas')); ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tahunproduksi">Tahun Produksi:</label>
                                <select id="tahunproduksi" name="tahunproduksi" class="form-control" required>
                                    <?php for($tahun = 2001; $tahun <= 2023; $tahun++): ?>
                                        <option value="<?php echo e($tahun); ?>" <?php echo e(old('tahunproduksi') == $tahun ? 'selected' : ''); ?>><?php echo e($tahun); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="hargasewa">Harga Sewa:</label>
                                <input type="number" id="hargasewa" name="hargasewa" value="<?php echo e(old('hargasewa')); ?>" class="form-control" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\cartogo\resources\views/mobil/create.blade.php ENDPATH**/ ?>