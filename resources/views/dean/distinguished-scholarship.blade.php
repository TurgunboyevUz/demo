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
                                <table class="table table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;"><input type="checkbox" id="checkAll"></th>
                                            <th style="width: 5%;">#</th>
                                            <th>Rasmi</th>
                                            <th>Talaba nomi</th>
                                            <th>Pasport nusxasi</th>
                                            <th>Reyting daftarchasi</th>
                                            <th>Fakultet bayonnomasi</th>
                                            <th>Kafedra mudiri tavsiyanomasi</th>
                                            <th>Ariza holati</th>
                                            <th>Harakatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id = 1; @endphp

                                        @foreach($files as $item)
                                        <tr>
                                            <td><input type="checkbox" class="checkItem"></td>
                                            <td>{{ $id++ }}</td>
                                            <td><img src="{{ asset('storage/' . $item[0]->user->picture_path) }}" alt="User" class="img-circle" style="height: 30px;"></td>

                                            <td>{{ $item[0]->user->fio() }}</td>
                                            <td><a href="{{ asset('storage/'.$item[0]->path) }}" target="_blank">{{ $item[0]->name }}</a></td>
                                            <td><a href="{{ asset('storage/'.$item[1]->path) }}" target="_blank">{{ $item[1]->name }}</a></td>
                                            <td><a href="{{ asset('storage/'.$item[2]->path) }}" target="_blank">{{ $item[2]->name }}</a></td>
                                            <td><a href="{{ asset('storage/'.$item[3]->path) }}" target="_blank">{{ $item[3]->name }}</a></td>

                                            <td><span class="badge badge-{{ $item[0]->status()['color'] }}">{{ $item[0]->status()['name'] }}</span></td>
                                            @if($item[0]->status == 'rejected')
                                            <td>
                                                <button id="reject-eye-button" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" data-reason="{{ $item[0]->reject_reason }}">
                                                    <i class="fa fa-eye fa-sm"></i>
                                                </button>
                                            </td>
                                            @else
                                            <td>Bu fayl uchun harakat imkonsiz</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                        <!-- Qo'shimcha talabalar ma'lumotlari qo'shiladi -->
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