<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ url('yonetim') }}" class="nav-link active">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Ana Sayfa
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Kullanıcılar
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kullanıcı Listesi</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                    Organizatörler
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('organizer.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Organizatör Listesi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('organizer.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Yeni Organizatör Ekle</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-map-marker-alt"></i>
                <p>
                    Mekanlar
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('place.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mekan Listesi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('place.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Yeni Mekan Ekle</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                    Etkinlikler
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('event.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Etkinlik Listesi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('event.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Yeni Etkinlik Ekle</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Sabit Veriler
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('country.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ülkeler</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('city.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>İller</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list-ul"></i>
                <p>
                    Kategoriler
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kategori Listesi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Yeni Kategori Ekle</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->
