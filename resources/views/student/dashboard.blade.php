@extends('layouts::student.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bosh sahifa</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Profil Card -->
                <div class="col-md-4">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header bg-info">
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="../dist/img/user8-128x128.jpg" alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username">{{ $user->first_name . ' ' . $user->second_name . ' ' . $user->third_name }}</h3>
                            <h5 class="widget-user-desc">Talaba</h5>
                        </div>
                        <div class="card-body">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-paper-plane"></i> Xalqaro Maqolalar <span class="float-right badge bg-primary">12</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-file-alt"></i> Mahalliy Maqolalar <span class="float-right badge bg-info">5</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-book"></i> Tezislar <span class="float-right badge bg-success">3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-star"></i> Tez Xalqaro Maqolalar <span class="float-right badge bg-warning">1</span>
                                    </a>
                                </li>
                            </ul>
                            <hr>
                            <!-- Shaxsiy Ma'lumotlar -->
                            <h4 class="mt-4">Shaxsiy Ma'lumotlar</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <i class="fas fa-user"></i> Ism
                                        </td>
                                        <td>{{ $user->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-user-tag"></i> Familiya
                                        </td>
                                        <td>{{ $user->second_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-flag"></i> Millati
                                        </td>
                                        <td>{{ $user->nationality ?? "O'zbek" }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-graduation-cap"></i> Guruh
                                        </td>
                                        <td>{{ $user->group }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-level-up-alt"></i> Bosqich
                                        </td>
                                        <td>{{ $user->level ?? '3'}} kurs</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-calendar-alt"></i> Tug'ilgan sanasi
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($user->birth_date)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-passport"></i> Pasport seriyasi
                                        </td>
                                        <td>{{ $user->passport_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-university"></i> Fakultet
                                        </td>
                                        <td>{{ $user->faculty }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-home"></i> Doimiy yashash manzili
                                        </td>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-id-card"></i> JSHSHIR raqami
                                        </td>
                                        <td>{{ $user->passport_pin }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-phone"></i> Telefon raqami
                                        </td>
                                        <td>{{ $user->phone}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Right Side Cards -->
                <div class="col-md-8">
                    <div class="row">
                        <!-- Guruh Tarkibi Card -->
                        <div class="col-md-6 mt-3">
                            <div class="card border-info">
                                <div class="card-header bg-info text-white">
                                    <h3 class="card-title">Guruh Tarkibi</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="refresh">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-group">
                                        <!-- Students List -->
                                        <div class="list-group-item d-flex align-items-start mb-3">
                                            <img src="../dist/img/user4-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 60px; height: 60px;">
                                            <div class="ml-3 flex-grow-1">
                                                <h5 class="mb-0">Tursunov Umid</h5>
                                                <small class="text-muted">Guruh: K-33-21</small>
                                                <span class="badge bg-primary float-right">88</span>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex align-items-start mb-3">
                                            <img src="../dist/img/user5-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 60px; height: 60px;">
                                            <div class="ml-3 flex-grow-1">
                                                <h5 class="mb-0">Anvarova Sabina</h5>
                                                <small class="text-muted">Guruh: K-33-21</small>
                                                <span class="badge bg-primary float-right">84</span>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex align-items-start">
                                            <img src="../dist/img/user6-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 60px; height: 60px;">
                                            <div class="ml-3 flex-grow-1">
                                                <h5 class="mb-0">Fayzulloyev Alisher</h5>
                                                <small class="text-muted">Guruh: K-33-21</small>
                                                <span class="badge bg-primary float-right">81</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Institut Reytingi Card -->
                        <div class="col-md-6 mt-3">
                            <div class="card border-info">
                                <div class="card-header bg-warning">
                                    <h3 class="card-title">Institut Reytingi</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="refresh">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <!-- User List -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 50px; height: 50px;">
                                            </span>
                                            <div class="flex-grow-1">
                                                <span style="font-weight: bold;">Toshkentov Azamat</span>
                                                <br>
                                                <small class="text-muted">Fakultet: Informatika <br>Yo'nalish:
                                                    Dasturlash </small>
                                            </div>
                                            <span class="badge bg-primary">95</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user4-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 50px; height: 50px;">
                                            </span>
                                            <div class="flex-grow-1">
                                                <span style="font-weight: bold;">Sirojiddinova Dildora</span>
                                                <br>
                                                <small class="text-muted">Fakultet: Informatika <br>Yo'nalish:
                                                    Tizimlar muhandisligi </small>
                                            </div>
                                            <span class="badge bg-primary">92</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 50px; height: 50px;">
                                            </span>
                                            <div class="flex-grow-1">
                                                <span style="font-weight: bold;">Karimov Sherzod</span>
                                                <br>
                                                <small class="text-muted">Fakultet: Informatika <br>Yo'nalish:
                                                    Sun'iy intellekt </small>
                                            </div>
                                            <span class="badge bg-primary">90</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Guruh Reytingi Card -->
                        <div class="col-md-6 mt-3">
                            <div class="card border-success">
                                <div class="card-header bg-success">
                                    <h3 class="card-title">Guruh Reytingi</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="refresh">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <!-- User List -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user7-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 50px; height: 50px;">
                                            </span>
                                            <div class="flex-grow-1">
                                                <span style="font-weight: bold;">Mirzayev Qodir</span>
                                                <br>
                                                <small class="text-muted">Guruh: K-88-21</small>
                                            </div>
                                            <span class="badge bg-primary">89</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 50px; height: 50px;">
                                            </span>
                                            <div class="flex-grow-1">
                                                <span style="font-weight: bold;">Yusupov Azizbek</span>
                                                <br>
                                                <small class="text-muted">Guruh: K-88-21</small>
                                            </div>
                                            <span class="badge bg-primary">87</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 50px; height: 50px;">
                                            </span>
                                            <div class="flex-grow-1">
                                                <span style="font-weight: bold;">Ismoilov Zafar</span>
                                                <br>
                                                <small class="text-muted">Guruh: K-88-21</small>
                                            </div>
                                            <span class="badge bg-primary">85</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Fakultet Reytingi Card -->
                        <div class="col-md-6 mt-3">
                            <div class="card border-danger">
                                <div class="card-header bg-danger text-white">
                                    <h3 class="card-title">Fakultet Reytingi</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="refresh">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <!-- User List -->
                                        <li class="list-group-item d-flex align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user6-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 60px; height: 60px;">
                                            </span>
                                            <div class="ml-3">
                                                <h5 class="mb-0">Abdullayev Shukhrat</h5>
                                                <p class="mb-0 text-muted">Yo'nalish: Kompyuter Injiniyeringi
                                                </p>
                                                <p class="mb-0 text-muted">Kurs: 2-kurs</p>
                                            </div>
                                            <span class="badge bg-primary ml-auto">83</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user7-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 60px; height: 60px;">
                                            </span>
                                            <div class="ml-3">
                                                <h5 class="mb-0">Gafurov Jamshid</h5>
                                                <p class="mb-0 text-muted">Yo'nalish: Axborot Texnologiyalari
                                                </p>
                                                <p class="mb-0 text-muted">Kurs: 3-kurs</p>
                                            </div>
                                            <span class="badge bg-primary ml-auto">81</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 60px; height: 60px;">
                                            </span>
                                            <div class="ml-3">
                                                <h5 class="mb-0">Nazarov Muxtor</h5>
                                                <p class="mb-0 text-muted">Yo'nalish: Elektronika</p>
                                                <p class="mb-0 text-muted">Kurs: 1-kurs</p>
                                            </div>
                                            <span class="badge bg-primary ml-auto">79</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
