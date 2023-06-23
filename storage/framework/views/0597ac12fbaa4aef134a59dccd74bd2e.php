<!DOCTYPE html>
<html>
<head>
    <title><?php echo $__env->yieldContent('title'); ?> | CARTOGO</title>
    <!-- Menghubungkan Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/stylemain.css">
</head>
<body>
    <div class="wrapper">
        <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <!-- Masukkan file JavaScript dan library lainnya -->
</body>
</html>
<?php /**PATH D:\Laravel\cartogo\resources\views/layout/main.blade.php ENDPATH**/ ?>