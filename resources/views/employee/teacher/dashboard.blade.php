@extends('layouts::teacher.app')

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
                            <h3 class="widget-user-username">Anvarov Oyatillo</h3>
                            <h5 class="widget-user-desc">Professor o'qituvchi</h5>
                        </div>
                        <div class="card-body">
                            <!-- Progress Bar with Count -->
                            <div class="mt-3">
                                <div class="d-flex justify-content-between">
                                    <span>10 / <i class="fas fa-infinity"></i>
                                    </span>
                                    <span class="font-weight-bold">6.67%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 6.67%" aria-valuenow="6.67" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <hr>
                            <!-- Shaxsiy Ma'lumotlar -->
                            <h4 class="mt-4">Shaxsiy Ma'lumotlar</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <i class="fas fa-user"></i> Ism
                                        </td>
                                        <td>Oyatillo</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-user-tag"></i> Familiya
                                        </td>
                                        <td>Anvarov</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-flag"></i> Millati
                                        </td>
                                        <td>O'zbek</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-graduation-cap"></i> Kafedra
                                        </td>
                                        <td>MICHA</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-level-up-alt"></i> Toifasi
                                        </td>
                                        <td>Professor o'qituvchi</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-calendar-alt"></i> Tug'ilgan yili
                                        </td>
                                        <td>1985</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-passport"></i> Pasport seriyasi
                                        </td>
                                        <td>AB1234567</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-university"></i> Fakultet
                                        </td>
                                        <td>Informatika</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-home"></i> Doimiy yashash manzili
                                        </td>
                                        <td>Tashkent, Uzbekistan</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-id-card"></i> JSHSHIR raqami
                                        </td>
                                        <td>12345678901234</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-phone"></i> Telefon raqami
                                        </td>
                                        <td>+998 90 123 45 67</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Right Side Cards -->
                <div class="col-md-8">
                    <div class="row">
                        <!-- O'qituvchiga Biriktirilgan Talabalar Card -->
                        <div class="col-md-6 mt-3">
                            <div class="card border-info">
                                <div class="card-header bg-info text-white">
                                    <h3 class="card-title">O'qituvchiga Biriktirilgan Top 3 Talaba</h3>
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
                                        <div class="list-group-item d-flex align-items-start mb-3">
                                            <img src="../dist/img/user4-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 60px; height: 60px;">
                                            <div class="ml-3">
                                                <h5 class="mb-0">Tursunova Sevinch</h5>
                                                <small class="text-muted">Yo'nalish: Kompyuter Injiniyeringi</small>
                                                <div>
                                                    <small class="text-muted">Kurs: 3</small>
                                                </div>
                                            </div>
                                            <span class="badge bg-primary ml-auto">88</span>
                                            <!-- Ballni right-aligned qildik -->
                                        </div>
                                        <div class="list-group-item d-flex align-items-start mb-3">
                                            <img src="../dist/img/user5-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 60px; height: 60px;">
                                            <div class="ml-3">
                                                <h5 class="mb-0">Anvarova Sabina</h5>
                                                <small class="text-muted">Yo'nalish: Sun'iy Intellekt</small>
                                                <div>
                                                    <small class="text-muted">Kurs: 3</small>
                                                </div>
                                            </div>
                                            <span class="badge bg-primary ml-auto">84</span>
                                            <!-- Ballni right-aligned qildik -->
                                        </div>
                                        <div class="list-group-item d-flex align-items-start">
                                            <img src="../dist/img/user6-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 60px; height: 60px;">
                                            <div class="ml-3">
                                                <h5 class="mb-0">Fayzulloyev Alisher</h5>
                                                <small class="text-muted">Yo'nalish: Dasturlash</small>
                                                <div>
                                                    <small class="text-muted">Kurs: 4</small>
                                                </div>
                                            </div>
                                            <span class="badge bg-primary ml-auto">81</span>
                                            <!-- Ballni right-aligned qildik -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Kafedra Reytingi Card -->
                        <div class="col-md-6 mt-3">
                            <div class="card border-info">
                                <div class="card-header bg-warning">
                                    <h3 class="card-title">Kafedra Reytingi</h3>
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
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 50px; height: 50px;">
                                            </span>
                                            <div class="flex-grow-1">
                                                <span style="font-weight: bold;">Toshkentov Azamat</span>
                                                <br>
                                                <small class="text-muted">Mutaxasislik: Kompyuter Tarmoqlari</small>
                                                <br>
                                                <small class="text-muted">Toifa: Stajyor-o'qituvchi</small>
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
                                                <small class="text-muted">Mutaxasislik: Tizimlar muhandisligi</small>
                                                <br>
                                                <small class="text-muted">Toifa: Asistent o'qituvchi</small>
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
                                                <small class="text-muted">Mutaxasislik: Sun'iy Intellekt</small>
                                                <br>
                                                <small class="text-muted">Toifa: Asistent o'qituvchi</small>
                                            </div>
                                            <span class="badge bg-primary">90</span>
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
                                        <li class="list-group-item d-flex align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user6-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 60px; height: 60px;">
                                            </span>
                                            <div class="ml-3">
                                                <h5 class="mb-0">Abdullayev Shukhrat</h5>
                                                <p class="mb-0 text-muted">Mutaxasislik: Kompyuter Injiniyeringi</p>
                                                <p class="mb-0 text-muted">Toifa: PHD</p>
                                            </div>
                                            <span class="badge bg-primary ml-auto">83</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user7-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 60px; height: 60px;">
                                            </span>
                                            <div class="ml-3">
                                                <h5 class="mb-0">Gafurov Jamshid</h5>
                                                <p class="mb-0 text-muted">Mutaxasislik: Axborot Texnologiyalari</p>
                                                <p class="mb-0 text-muted">Toifa: Dotsent</p>
                                            </div>
                                            <span class="badge bg-primary ml-auto">81</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 60px; height: 60px;">
                                            </span>
                                            <div class="ml-3">
                                                <h5 class="mb-0">Nazarov Muxtor</h5>
                                                <p class="mb-0 text-muted">Mutaxasislik: Elektronika</p>
                                                <p class="mb-0 text-muted">Toifa: Asistent o'qituvchi</p>
                                            </div>
                                            <span class="badge bg-primary ml-auto">79</span>
                                        </li>
                                    </ul>
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
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="mr-2">
                                                <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-circle elevation-2" style="width: 50px; height: 50px;">
                                            </span>
                                            <div class="flex-grow-1">
                                                <span style="font-weight: bold;">Toshkentov Azamat</span>
                                                <br>
                                                <small class="text-muted">Fakultet: Informatika <br>Kafedra: MICHA </small>
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
                                                <small class="text-muted">Fakultet: Informatika <br>Kafedra: Tizimlar muhandisligi </small>
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
                                                <small class="text-muted">Fakultet: Informatika <br>Kafedra: Sun'iy intellekt </small>
                                            </div>
                                            <span class="badge bg-primary">90</span>
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
