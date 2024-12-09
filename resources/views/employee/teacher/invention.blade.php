@extends('layouts::teacher.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ixtro/DGU/Foydali Model</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Ixtro/DGU/Foydali Model</li>
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
                            <h3 class="card-title">Barcha Ixtro/DGU/Foydali Model</h3>
                            <div class="ml-auto d-flex">
                                <button id="zipDownload" class="btn btn-success">
                                    <i class="fas fa-file-archive"></i> ZIP Yuklash
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
                                <table id="inventionsTable" class="table table-bordered table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;"><input type="checkbox" id="checkAll"></th>
                                            <th style="width: 5%;">#</th>
                                            <th>Rasmi</th>
                                            <th>Talaba FIO</th>
                                            <th>Intellektual Mulk Nomi</th>
                                            <th>Turi</th>
                                            <th>Raqami</th>
                                            <th>Mualliflar soni</th>
                                            <th>Mualliflar</th>
                                            <th>Nashr Parametrlari</th>
                                            <th>O'quv yili</th>
                                            <th>Fayl nomi</th>
                                            <th>Harakatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" class="checkItem"></td>
                                            <td>1</td>
                                            <td><img src="img/image.jpg" alt="User" class="img-circle" style="height: 30px;"></td>
                                            <td>Ismoilov Anvar</td>
                                            <td>Yangi dasturiy ta'minot</td>
                                            <td>Ixtiro</td>
                                            <td>12345</td>
                                            <td>3</td>
                                            <td>Samadov, Anvarov Oyatillo, Diyorbek Turg'unboyev</td>
                                            <td>O'zbekiston nashriyoti, 2023</td>
                                            <td>2023-2024</td>
                                            <td>mulk.pdf</td>
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
                                            <th>Intellektual Mulk Nomi</th>
                                            <th>Turi</th>
                                            <th>Raqami</th>
                                            <th>Mualliflar soni</th>
                                            <th>Mualliflar</th>
                                            <th>Nashr Parametrlari</th>
                                            <th>O'quv yili</th>
                                            <th>Fayl nomi</th>
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

<!-- Modal for cancel reason -->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">Bekor Qilish Izohi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" rows="4" placeholder="Bekor qilish sababini kiriting..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                <button type="button" class="btn btn-primary">Saqlash</button>
            </div>
        </div>
    </div>
</div>
@endsection