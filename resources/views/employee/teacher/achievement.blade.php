@extends('layouts::teacher.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">O'quv Yili Davomida Erishgan Boshqa Yutuqlar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Boshqa Yutuqlar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Barcha Yutuqlar</h3>
                            <div class="ml-auto d-flex">
                                <button id="zipDownload" class="btn btn-success">
                                    <i class="fas fa-file-archive"></i> ZIP Yuklash
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
                                <table id="achievementsTable" class="table table-bordered table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;"><input type="checkbox" id="checkAll"></th>
                                            <th style="width: 5%;">#</th>
                                            <th>Rasmi</th>
                                            <th>Talaba FIO</th>
                                            <th>Yutuq Turi</th>
                                            <th>Darajasi</th>
                                            <th>Ishtirokchilar</th>
                                            <th>O'tkazilgan Joyi</th>
                                            <th>Hujjat Turi</th>
                                            <th>Fayl</th>
                                            <th>Harakatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" class="checkItem"></td>
                                            <td>1</td>
                                            <td><img src="img/image.jpg" alt="User" class="img-circle" style="height: 30px;"></td>
                                            <td>Ismoilov Anvar</td>
                                            <td>Sport</td>
                                            <td>Respublika</td>
                                            <td>Jamoaviy</td>
                                            <td>Toshkent</td>
                                            <td>Sertifikat</td>
                                            <td>certificate.pdf</td>
                                            <td>
                                                <button class="btn btn-sm btn-success confirmAction"><i class="fas fa-check"></i></button>
                                                <button class="btn btn-sm btn-danger cancelAction"><i class="fas fa-ban"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll"></th>
                                            <th>#</th>
                                            <th>Rasmi</th>
                                            <th>Talaba FIO</th>
                                            <th>Yutuq Turi</th>
                                            <th>Darajasi</th>
                                            <th>Ishtirokchilar</th>
                                            <th>O'tkazilgan Joyi</th>
                                            <th>Hujjat Turi</th>
                                            <th>Fayl</th>
                                            <th>Harakatlar</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection