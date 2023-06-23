

<?php $__env->startSection('isi'); ?>
    <div class="form-group">
        <label for="tanggalSewa">Tanggal Sewa</label>
        <input type="date" name="tanggalSewa" id="tanggalSewa" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="mulaiSewa">Mulai Sewa</label>
        <input type="time" name="mulaiSewa" id="mulaiSewa" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="lamaSewa">Lama Sewa (jam)</label>
        <input type="number" name="lamaSewa" id="lamaSewa" class="form-control" required>
    </div>

    <!-- Menampilkan ID pengguna yang sedang login -->
    <input type="hidden" name="idPengguna" value="<?php echo e(Auth::id()); ?>">

    <!-- Menampilkan ID pelanggan yang sedang login -->
    <input type="hidden" name="idPelanggan" value="<?php echo e(Auth::user()->customer->id); ?>">

    <button type="submit" class="btn btn-primary">Simpan</button>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.screen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\cartogo\resources\views/booking.blade.php ENDPATH**/ ?>