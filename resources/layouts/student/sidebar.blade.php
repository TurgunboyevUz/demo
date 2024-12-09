<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('img/bmi_logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BMI Platformasi</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="{{ route('student.dashboard') }}" class="nav-link {{ request()->routeIs('student.dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Bosh sahifa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.assignments') }}" class="nav-link {{ request()->routeIs('student.assignments') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>Berilgan topshiriqlar <span class="right badge badge-primary">2</span></p>
                    </a>
                </li>
                <!-- Maqolalar Yuklash Dropdown Menu -->
                <li class="nav-item">
                    <a href="{{ route('student.article.index') }}" class="nav-link {{ request()->routeIs('student.upload-article') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-upload"></i>
                        <p>Maqolalar yuklash</p>
                    </a>
                </li>
                <!-- Stipendiyat Dropdown Menu -->
                <li class="nav-item">
                    <a href="{{ route('student.scholarship.index') }}" class="nav-link {{ request()->routeIs('student.scholarship') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>Stipendiyat</p>
                    </a>
                </li>
                <!-- Ixtro/DGU/Foydali model Dropdown Menu -->
                <li class="nav-item">
                    <a href="{{ route('student.invention.index') }}" class="nav-link {{ request()->routeIs('student.invention-dgus') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-lightbulb"></i>
                        <p>Ixtro/DGU/Foydali model</p>
                    </a>
                </li>
                <!-- Startup/Tanlov Dropdown Menu -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('student.startup.index') }}" class="nav-link {{ request()->routeIs('student.startup') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-rocket"></i>
                        <p>Startup/Tanlov</p>
                    </a>
                </li>
                <!-- Grand/Xo'jalik shartonmalar Dropdown Menu -->
                <li class="nav-item">
                    <a href="{{ route('student.grand-economy.index') }}" class="nav-link {{ request()->routeIs('student.grand-economy') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Grant/Xo'jalik shartonmalar</p>
                    </a>
                </li>
                <!-- Olimpiyadalar Dropdown Menu -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('student.olympics.index') }}" class="nav-link {{ request()->routeIs('student.olympics') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-medal"></i>
                        <p>Olimpiyadalar</p>
                    </a>
                </li>
                <!-- Til sertifikati Dropdown Menu -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('student.lang-certificate.index') }}" class="nav-link {{ request()->routeIs('student.lang-certificate') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-language"></i>
                        <p>Til Sertifikatlari</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.distinguished-scholarship.index') }}" class="nav-link {{ request()->routeIs('student.distinguished-scholarship') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-trophy"></i>
                        <p>Nomdor stipendiyaga ariza topshirish</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.achievement.index') }}" class="nav-link {{ request()->routeIs('student.achievement') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-award"></i>
                        <p>O’quv yili davomida erishgan <br>boshqa yutuqlari</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.evaluation-criteria.index') }}" class="nav-link {{ request()->routeIs('student.evaluation-criteria') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>Baholash me'zoni</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.chat.index') }}" class="nav-link {{ request()->routeIs('student.chat') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Professor o'qituvchi bilan chat</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>