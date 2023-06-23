<div class="sidebar">
    <h5 class="sidebar-heading"><img src="/assets/logo.png"></h5>
    <hr class="sidebar-divider">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="/admin/dashboard">
                <i class="bi bi-house-fill"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/mobil">
                <i class="bi bi-person"></i>
                Daftar Mobil
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/transaksi">
                <i class="bi bi-bag"></i>
                Transaksi Berlangsung
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/riwayat">
                <i class="bi bi-receipt"></i>
                Riwayat Transaksi
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/sopir">
                <i class="bi bi-gear"></i>
                Daftar Sopir
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/customer/show">
                <i class="bi bi-gear"></i>
                Daftar Customer
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/tambah">
                <i class="bi bi-gear"></i>
                Tambah Admin
            </a>
        </li>
    </ul>
    <hr class="sidebar-divider">
    <div class="sidebar-footer">
        <a class="nav-link" href="{{ route('logout.admin') }}" method="POST">
            @csrf
            <i class="bi bi-box-arrow-right"></i>
            Logout
        </a>
    </div>
</div>
