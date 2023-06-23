@extends('layout.screen')

@section('isi')
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
                    <form action="{{ route('mobil.store') }}" method="POST" enctype="multipart/form-data">
                        <ul class="featured-car-list">
                            @foreach ($mobil as $m)
                                <li>
                                    <div class="featured-car-card">
                                        <figure class="card-banner">
                                            <!-- Konten gambar -->
                                            <img src="{{ Storage::url($m->gambar) }}" alt="Gambar Mobil" loading="lazy"
                                                width="440" height="300" class="w-100">
                                        </figure>

                                        <div class="card-content">
                                            <div class="card-title-wrapper">
                                                <h3 class="h3 card-title">
                                                    <a href="">{{ $m->merk }}</a>
                                                </h3>
                                                <data class="year">{{ $m->tahunproduksi }}</data>
                                            </div>

                                            <!-- Konten lainnya -->
                                            <ul class="card-list">
                                                <li class="card-list-item">
                                                    <ion-icon name="speedometer-outline"></ion-icon>
                                                    <span class="card-item-text">{{ $m->plat }}</span>
                                                </li>
                                                <li class="card-list-item">
                                                    <ion-icon name="people-outline"></ion-icon>
                                                    <span class="card-item-text">{{ $m->kapasitas }} orang</span>
                                                </li>
                                                <li class="card-list-item">
                                                    <ion-icon name="flash-outline"></ion-icon>
                                                    <span class="card-item-text">{{ $m->tipe }}</span>
                                                </li>
                                            </ul>

                                            <div class="card-price-wrapper">
                                                <p class="card-price"><span>Rp. {{ $m->hargasewa }} / hari</span></p>
                                            </div>
                                            <br>

                                            <a href="/customer/create" class="btn">Sewa Sekarang</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </form>
                </div>
            </section>
        </article>
    </main>
@endsection
