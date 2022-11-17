<aside class="main-sidebar" style="background: #212529;">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/img/admin.png" class="img-circle img-profil" alt="User Image">
            </div>
            <div class="pull-left info" style="color:#00B2CB">
                <p>{{ auth()->user()->name }}</p>
                <a href="#" style="color:pink;"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
                </a>
            </li>
            <!-- buat admin jadi yg akses hnya admin -->
            @if (auth()->user()->level == 1)
            <li class="header">MASTER</li>
            <li>
                <a href="{{ route('kategori.index') }}">
                    <i class="bi bi-card-checklist"></i> <span>Kategori</span>
                </a>
            </li>
            <li>
                <a href="{{ route('produk.index') }}">
                    <i class="bi bi-car-front-fill"></i>  <span>Produk</span>
                </a>
            </li>
            <li>
                <a href="{{ route('customer.index') }}">
                    <i class="bi bi-person-lines-fill"></i> <span>Customer</span>
                </a>
            </li>
            <li>
                <a href="{{ route('supplier.index') }}">
                    <i class="bi bi-truck"></i> <span>Supplier</span>
                </a>
            </li>
            <li class="header">Pembelian</li>
            <li>
                <a href="{{ route('pembelian.index') }}">
                    <i class="bi bi-upload"></i> <span>Pembelian</span>
                </a>
            </li>
            <li class="header">TRANSAKSI</li>
            <li>
                <a href="{{ route('penjualan.index') }}">
                    <i class="bi bi-upload"></i> <span>Penjualan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.baru') }}">
                    <i class="bi bi-cart-check"></i> <span>Transaksi</span>
                </a>
            </li>
            
            <li class="header">SYSTEM</li>
            <li>
                <a href="{{ route('setting.index') }}">
                    <i class="bi bi-sliders"></i> <span>Pengaturan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.index') }}">
                    <i class="bi bi-person-circle"></i> <span>User</span>
                </a>
            </li>
            
            @else
            <!-- ini buat user/kasir -->
            <li class="header">TRANSAKSI</li>
            <li>
                <a href="{{ route('penjualan.index') }}">
                    <i class="fa fa-upload"></i> <span>Penjualan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.baru') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi</span>
                </a>
            </li>
            @endif
        </ul>
    </section>
</aside>