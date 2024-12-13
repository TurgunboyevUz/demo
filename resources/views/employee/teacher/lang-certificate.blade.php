@extends('layouts::teacher.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Til Sertifikatlari</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Til Sertifikatlari</li>
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
                            <h3 class="card-title">Barcha Til Sertifikatlari</h3>
                            <div class="ml-auto d-flex">
                                <button id="zipDownload" class="btn btn-success">
                                    <i class="fas fa-file-archive"></i> ZIP Yuklash
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
                                <table id="languageCertificatesTable" class="table table-bordered table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;"><input type="checkbox" id="checkAll"></th>
                                            <th style="width: 5%;">#</th>
                                            <th style="width: 7%;">Rasmi</th>
                                            <th>Talaba FIO</th>
                                            <th>Chet Tili</th>
                                            <th>Sertifikat Turi</th>
                                            <th>Darajasi</th>
                                            <th>Berilgan Sana</th>
                                            <th>Fayl Nomi</th>
                                            <th>Harakatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            @foreach ($student->lang_certificates as $item)
                                                <tr>
                                                    <td><input type="checkbox" class="checkItem"></td>
                                                    <td>1</td>
                                                    <td><img src="{{ asset('storage/' . $student->user->picture_path) }}" alt="User" class="img-circle" style="height: 30px;"></td>
                                                    <td>{{ $student->user->fio() }}</td>
                                                    <td>{{ $item->lang() }}</td>
                                                    <td>{{ $item->type() }}</td>
                                                    <td>{{ $item->criteria->name }}</td>
                                                    <td>{{ $item->given_date }}</td>
                                                    <td>{{ $item->file->name }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-success confirmAction"><i class="fas fa-check"></i></button>
                                                        <button class="btn btn-sm btn-danger cancelAction"><i class="fas fa-ban"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
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