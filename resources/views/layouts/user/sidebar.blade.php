<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link {{ Request::is('perindag/home') ? 'active' : '' }}" href="{{ url('perindag/home') }}">
            <i class="bi bi-grid {{ Request::is('perindag/home') ? 'active' : '' }}"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    @if (Auth::user()->role == 0)
        <li class="nav-item">
            <a class="nav-link {{ Request::is('perindag/user') ? 'active' : 'collapsed' }}"
                data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Data Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ Request::is('perindag/user') ? 'show' : '' }} "
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('perindag/user') }}" class="{{ Request::is('perindag/user') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>User</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('perindag/reports') ? 'active' : 'collapsed' }}"
                data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-newspaper"></i><span>Data Report</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse {{ Request::is('perindag/reports') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('perindag/reports') }}"
                        class="{{ Request::is('perindag/reports') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Terverifikasi</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->
    @elseif (Auth::user()->role == 1)
        <li class="nav-item">
            <a class="nav-link {{ Request::is('perindag/perizinan') ? 'active' : 'collapsed' }}"
                data-bs-target="#staf-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Data Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="staf-nav" class="nav-content collapse  {{ Request::is('perindag/staf') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('perindag/staf') }}" class="{{ Request::is('perindag/staf') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Staf</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('perindag/kategori-informasi') ? 'active' : 'collapsed' }}"
                data-bs-target="#informasi-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-megaphone"></i><span>Data Informasi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="informasi-nav"
                class="nav-content collapse  {{ Request::is('perindag/kategori-informasi') ? 'show' : '' }} "
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('perindag/kategori-informasi') }}"
                        class="{{ Request::is('perindag/kategori-informasi') ? 'active' : '' }}">
                        <i
                            class="bi bi-circle {{ Request::is('perindag/kategori-informasi') ? 'active' : '' }}"></i><span>Kategori
                            Informasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('perindag/informasi') }}"
                        class="{{ Request::is('perindag/informasi') ? 'active' : '' }}">
                        <i
                            class="bi bi-circle {{ Request::is('perindag/informasi') ? 'active' : '' }}"></i><span>Informasi</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Informasi Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('perindag/perizinan') ? 'active' : 'collapsed' }}"
                data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Data Pengawasan</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse  {{ Request::is('perindag/perizinan') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('perindag/perizinan') }}"
                        class="{{ Request::is('perindag/perizinan') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Kegiatan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('perindag/report') ? 'active' : 'collapsed' }}"
                data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-newspaper"></i><span>Data Report</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse  {{ Request::is('perindag/report') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('perindag/report') }}"
                        class="{{ Request::is('perindag/report') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Terverifikasi</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->
    @elseif(Auth::user()->role == 2)
        <li class="nav-item">
            <a class="nav-link {{ Request::is('perindag/pengawasan') ? 'active' : 'collapsed' }}"
                data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Data Pengawasan</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse {{ Request::is('perindag/pengawasan') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('perindag/pengawasan') }}"
                        class="{{ Request::is('perindag/pengawasan') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Perizinan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('perindag/pengawasan-kegiatan') ? 'active' : '' }}"
                href="{{ url('perindag/pengawasan-kegiatan') }}">
                <i
                    class="bi bi-clipboard-data {{ Request::is('perindag/pengawasan-kegiatan') ? 'active' : '' }}"></i><span>Data
                    Kegiatan</span>
            </a>
        </li><!-- End Tables Nav -->
    @endif


    <li class="nav-heading">Gear</li>
    @if (Auth::user()->role == 1)
        <li class="nav-item">
            <a class="nav-link {{ Request::is('perindag/setting') ? 'active' : '' }}"
                href="{{ url('perindag/setting') }}">
                <i class="bi bi-gear {{ Request::is('perindag/setting') ? 'active' : '' }}"></i>
                <span>Setting</span>
            </a>
        </li><!-- End Profile Page Nav -->
    @endif
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('logout') }}"
            onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-left"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li><!-- End Profile Page Nav -->
</ul>
