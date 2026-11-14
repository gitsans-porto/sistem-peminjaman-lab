 <li class="nav-item">
    <a href="{{ route('beranda') }}" class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}">
        <i class="nav-icon bi bi-house"></i>
        <p>Beranda</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('riwayat') }}" class="nav-link {{ request()->routeIs('riwayat') ? 'active' : '' }}">
        <i class="nav-icon bi bi-clock-history"></i>
        <p>Riwayat</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('status-lab-aslab') }}" class="nav-link {{ request()->routeIs('status-lab-aslab') ? 'active' : '' }}">
        <i class="nav-icon bi bi-hdd-stack"></i>
        <p>Status Lab</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('notifikasi') }}" class="nav-link {{ request()->routeIs('notifikasi') ? 'active' : '' }}">
        <i class="nav-icon bi bi-bell"></i>
        <p>Notifikasi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('akun') }}" class="nav-link {{ request()->routeIs('akun') ? 'active' : '' }}">
        <i class="nav-icon bi bi-person"></i>
        <p>Akun</p>
    </a>
</li>