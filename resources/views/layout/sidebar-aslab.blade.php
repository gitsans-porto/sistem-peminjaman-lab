<li class="nav-item">
    <a href="{{ route('status-lab-aslab') }}" class="nav-link {{ request()->routeIs('status-lab-aslab') ? 'active' : '' }}">
        <i class="nav-icon bi bi-hdd-stack"></i>
        <p>Status Lab</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('jadwal-tetap') }}" class="nav-link {{ request()->routeIs('jadwal-tetap') ? 'active' : '' }}">
        <i class="nav-icon bi bi-calendar-check-fill"></i>
        <p>Jadwal Tetap</p>
    </a>


</li>

<li class="nav-item">
    <a href="{{ route('pengajuan') }}" class="nav-link {{ request()->routeIs('pengajuan') ? 'active' : '' }}">
        <i class="nav-icon bi bi-list-task"></i>
        <p>Peminjaman Lab</p>
    </a>
    
</li>

<li class="nav-item">
    <a href="/lab" class="nav-link {{ request()->is('lab*') ? 'active' : '' }}">
        <i class="nav-icon bi bi-hdd-stack-fill"></i>
        <p>Data Lab</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('riwayat-peminjaman') }}" class="nav-link">
        <i class="nav-icon bi bi-clock-history"></i>
        <p>Riwayat</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('akun-aslab') }}" class="nav-link {{ request()->routeIs('akun-aslab') ? 'active' : '' }}">
        <i class="nav-icon bi bi-person"></i>
        <p>Akun</p>
    </a>
</li>