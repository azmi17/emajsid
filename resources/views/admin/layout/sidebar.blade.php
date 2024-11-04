<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('admin/setting') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_setting') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Setting"><i class="fas fa-cog"></i> <span>Setting</span></a></li>

            <li class="{{ Request::is('admin/author/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_author_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Author List"><i class="fas fa-user-edit"></i> <span>Author List</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/category/*')||Request::is('admin/sub-category/*')||Request::is('admin/post/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/sub-category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sub_category_show') }}"><i class="fas fa-angle-right"></i> SubCategories</a></li>
                    <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post_show') }}"><i class="fas fa-angle-right"></i> Posts</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/profilmasjid/sejarah*')||Request::is('admin/profilmasjid/pengurus*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-users"></i><span>Profil Masjid</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/profilmasjid/sejarah*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_profil_masjid_sejarah') }}"><i class="fas fa-angle-right"></i> Sejarah Masjid</a></li>
                    <li class="{{ Request::is('admin/profilmasjid/pengurus*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_profil_masjid_pengurus_show') }}"><i class="fas fa-angle-right"></i> Pengurus Masjid</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/jadwal/jadwalkhutbah*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-users"></i><span>Jadwal</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/jadwal/jadwalkhutbah*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_jadwal_khutbah_show') }}"><i class="fas fa-angle-right"></i> Jadwal Khutbah</a></li>
                </ul>
            </li>
            
            <li class="nav-item dropdown {{ Request::is('admin/informasi/kas*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-users"></i><span>Informasi Masjid</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/informasi/kas*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_kas_show') }}"><i class="fas fa-angle-right"></i> Kas Masjid</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="FAQ Section"><i class="fas fa-question-circle"></i> <span>FAQ Section</span></a></li>

            <li class="{{ Request::is('admin/language/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_language_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Languages"><i class="fas fa-language"></i> <span>Languages</span></a></li>        
        </ul>
    </aside>
</div>