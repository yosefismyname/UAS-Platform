

<?php $__env->startSection('isi'); ?>
    <main>
        <article>
            <section class="section hero" id="home">
                <div class="container">

                    <div class="hero-content">
                        <h2 class="h1 hero-title">Go Places with CartoGo</h2>

                        <p class="hero-text">
                            Make it easy to rent a car in Yogyakarta!
                        </p>
                    </div>

                    <div class="hero-banner"></div>

                </div>
            </section>

            <section class="section featured-car" id="featured-car">
                <div class="container">

                    <div class="title-wrapper">
                        <h2 class="h2 section-title">Featured cars</h2>

                        <a href="carlist.html" class="featured-car-link">
                            <span>View more</span>

                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </a>
                    </div>
                    <form action="<?php echo e(route('mobil.store')); ?>" method="POST" enctype="multipart/form-data">
                        <ul class="featured-car-list">
                            <?php $__currentLoopData = $mobil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="featured-car-card">
                                        <figure class="card-banner">
                                            <!-- Konten gambar -->
                                            <img src="<?php echo e(Storage::url($m->gambar)); ?>" alt="Gambar Mobil" loading="lazy"
                                                width="440" height="300" class="w-100">
                                        </figure>

                                        <div class="card-content">
                                            <div class="card-title-wrapper">
                                                <h3 class="h3 card-title">
                                                    <a href=""><?php echo e($m->merk); ?></a>
                                                </h3>
                                                <data class="year"><?php echo e($m->tahunproduksi); ?></data>
                                            </div>

                                            <!-- Konten lainnya -->
                                            <ul class="card-list">
                                                <li class="card-list-item">
                                                    <ion-icon name="speedometer-outline"></ion-icon>
                                                    <span class="card-item-text"><?php echo e($m->plat); ?></span>
                                                </li>
                                                <li class="card-list-item">
                                                    <ion-icon name="people-outline"></ion-icon>
                                                    <span class="card-item-text"><?php echo e($m->kapasitas); ?> orang</span>
                                                </li>
                                                <li class="card-list-item">
                                                    <ion-icon name="flash-outline"></ion-icon>
                                                    <span class="card-item-text"><?php echo e($m->tipe); ?></span>
                                                </li>
                                            </ul>

                                            <div class="card-price-wrapper">
                                                <p class="card-price"><span>Rp. <?php echo e($m->hargasewa); ?> / hari</span></p>
                                            </div>
                                            <br>

                                            <a href="/customer/create" class="btn">Sewa Sekarang</a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                    </form>
                </div>
            </section>
        </article>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.screen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\cartogo\resources\views/dashboard.blade.php ENDPATH**/ ?>