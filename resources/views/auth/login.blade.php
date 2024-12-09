<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BMI Platforma | Tizimga kirish</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <style> .btn-student,.btn-teacher{display:inline-block;font-size:18px;margin:10px 2px;border-radius:25px;transition:all .3s ease;box-shadow:0 4px 8px rgba(0,0,0,.2)}.btn-student{background-color:#17a2b8;border:none;color:#fff;padding:15px 30px;text-align:center;text-decoration:none}.btn-student:hover{background-color:#138496;box-shadow:0 6px 12px rgba(0,0,0,.2);transform:translateY(-2px)}.btn-teacher{background-color:#28a745;border:none;color:#fff;padding:15px 30px;text-align:center;text-decoration:none}.btn-teacher:hover{background-color:#218838;box-shadow:0 6px 12px rgba(0,0,0,.2);transform:translateY(-2px)}.login-header{text-align:center}.login-box-msg{font-size:20px;font-weight:bold} </style>
</head>
<body class="hold-transition login-page">
<div class="container d-flex align-items-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-outline card-primary">
                <div class="card-header text-center login-header">
                    <a href="#" class="d-block">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid w-50">
                    </a>
                    <p class="login-box-msg mt-3 mb-0">BMI platformasi</p>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Hisobga kirish</p>
                    <div class="d-grid gap-2">
                        <a href="{{ route('student.login') }}" class="btn btn-student btn-block mb-3"><i class="fas fa-user-graduate"></i> Talaba HEMIS orqali kirish</a>
                        <a href="{{ route('employee.login') }}" class="btn btn-teacher btn-block"><i class="fas fa-chalkboard-teacher"></i> Xodim HEMIS orqali kirish</a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>