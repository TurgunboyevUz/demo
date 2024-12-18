<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('img/bmi_logo.jpg') }}" alt="BMI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BMI Platformasi</span>
    </a>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('employee.teacher.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Bosh sahifa</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-folder"></i>
                    <p>
                        Kelib tushgan hujjatlar
                        <i class="right fas fa-angle-left"></i>
                        <span class="right badge badge-danger">2</span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('employee.teacher.article') }}" class="nav-link">
                            <i class="nav-icon fas fa-upload"></i>
                            <p>Yuklangan Maqolalar
                                <span class="right badge badge-info">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.teacher.scholarship') }}" class="nav-link">
                            <i class="nav-icon fas fa-money-check"></i>
                            <p>Stipendiyat
                                <span class="right badge badge-info">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.teacher.invention') }}" class="nav-link">
                            <i class="nav-icon fas fa-lightbulb"></i>
                            <p>Ixtro/DGU/Foydali model
                                <span class="right badge badge-info">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.teacher.startup') }}" class="nav-link">
                            <i class="nav-icon fas fa-rocket"></i>
                            <p>Startup/Tanlov
                                <span class="right badge badge-info">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.teacher.grand-economy') }}" class="nav-link">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>Grant/Xo'jalik shartonmalar
                                <span class="right badge badge-info">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.teacher.olympics') }}" class="nav-link">
                            <i class="nav-icon fas fa-medal"></i>
                            <p>Olimpiyadalar
                                <span class="right badge badge-info">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.teacher.lang-certificate') }}" class="nav-link">
                            <i class="nav-icon fas fa-language"></i>
                            <p>Til Sertifikatlari
                                <span class="right badge badge-info">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.teacher.achievement') }}" class="nav-link active">
                            <i class="nav-icon fas fa-award"></i>
                            <p>O’quv yili davomida erishgan <br>boshqa yutuqlari
                                <span class="right badge badge-info">2</span>
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('employee.teacher.student-list') }}" class="nav-link">
                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>Talabalar ro'yxati</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        Statistika
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="attached-students-rating.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Biriktirilgan talabalar reytingi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="department-rating.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kafedra bo'yicha reytingi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="faculty-rating.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fakultet reytingi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="institute-rating.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Institut reytingi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="students-general-institute-rating.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Talabalarni institut <br>bo'yicha umumiy reytingi</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('employee.teacher.create-task') }}" class="nav-link">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>Topshiriq yaratish</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('employee.teacher.chat') }}" class="nav-link">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>Talabalar bilan chat
                        <span class="right badge badge-danger">8</span>
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</aside>