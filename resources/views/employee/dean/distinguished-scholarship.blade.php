@extends('layouts::employee.dean.app')

@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Nomdor Stipendiyaga tushgan arizalar ro'yxati</h3>
                            <div class="ml-auto d-flex">
                                <button id="excelDownload" class="btn btn-success">
                                    <i class="fas fa-file-excel"></i> Excel yuklash
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
                                <table id="nomdorArizaTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 3%;">#</th>
                                            <th>Talaba FIO</th>
                                            <th>Kursi</th>
                                            <th>Kimga biriktirilgan</th>
                                            <th>Fakulteti</th>
                                            <th>Yo'nalishi</th>
                                            <th>Ariza topshirish holati</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp

                                        @foreach($data as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->user->fio() }}</td>
                                            <td>{{ $item->user->student->level }}-kurs</td>
                                            <td>{{ $item->user->student->employee->user->fio() }}</td>
                                            <td>{{ $item->user->student->faculty->name }}</td>
                                            <td>{{ $item->user->student->specialty->name }}</td>
                                            <td>{{ $item->status }}</td>
                                        </tr>
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
@endsection
