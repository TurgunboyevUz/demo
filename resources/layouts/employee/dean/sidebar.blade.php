<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="img/bmi_logo.jpg" alt="BMI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">BMI Platformasi</span>
    </a>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
             <a href="{{ route('employee.dean.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>Bosh sahifa</p>
             </a>
          </li>
          <li class="nav-item has-treeview">
             <a href="{{ route('employee.dean.attach-student') }}" class="nav-link">
                <i class="nav-icon fas fa-user-friends"></i>
                <p> Talabani biriktirish</p>
             </a>
          </li>
          <li class="nav-item has-treeview">
             <a href="{{ route('employee.dean.distinguished-scholarship') }}" class="nav-link active">
                <i class="nav-icon fas fa-trophy"></i>
                <p> Nomdor stipendiyaga <br>ariza topshirganlar</p>
             </a>
          </li>
          <li class="nav-item has-treeview">
             <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p> Statistika <i class="right fas fa-angle-left"></i>
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
                      <p>Talabalarni institut <br>bo'yicha umumiy reytingi </p>
                   </a>
                </li>
             </ul>
          </li>
       </ul>
    </nav>
 </aside>