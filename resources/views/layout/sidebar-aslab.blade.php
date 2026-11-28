<li class="nav-item">
    <a href="{{ route('aslab.status-lab') }}" class="nav-link {{ request()->routeIs('aslab.status-lab') ? 'active' : '' }}">
        <i class="nav-icon bi bi-hdd-stack"></i>
        <p>Status Lab</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('aslab.jadwal-tetap.index') }}" class="nav-link {{ request()->routeIs('aslab.jadwal-tetap.index') ? 'active' : '' }}">
        <i class="nav-icon bi bi-calendar-check-fill"></i>
        <p>Jadwal Tetap</p>
    </a>


</li>

<li class="nav-item">
    <a href="{{ route('aslab.pengajuan') }}" class="nav-link {{ request()->routeIs('pengajuan') ? 'active' : '' }}">
        <i class="nav-icon bi bi-list-task"></i>
        <p>Peminjaman Lab</p>
    </a>
    
</li>

<li class="nav-item">
    <a href="{{ route("aslab.lab.index") }}" class="nav-link {{ request()->is('aslab.lab.*') ? 'active' : '' }}">
        <i class="nav-icon bi bi-hdd-stack-fill"></i>
        <p>Data Lab</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('aslab.riwayat-peminjaman') }}" class="nav-link {{ request()->routeIs('aslab.riwayat-peminjaman') ? 'active' : '' }}">
        <i class="nav-icon bi bi-clock-history"></i>
        <p>Riwayat</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('aslab.akun') }}" class="nav-link {{ request()->routeIs('aslab.akun') ? 'active' : '' }}">
        <i class="nav-icon bi bi-person"></i>
        <p>Akun</p>
    </a>
</li>