@extends('layouts::employee.inspeksiya.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Olimpiyadalar (Talaba Olimpiada Ma'lumotlari)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Olimpiyadalar</li>
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
                            <h3 class="card-title">Barcha Olimpiada Ma'lumotlari</h3>
                            <div class="ml-auto d-flex">
                                <button id="zipDownload" class="btn btn-success">
                                    <i class="fas fa-file-archive"></i> ZIP Yuklash
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
                                <table id="olympiadsTable" class="table table-bordered table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;"><input type="checkbox" id="checkAll"></th>
                                            <th style="width: 5%;">#</th>
                                            <th>Rasmi</th>
                                            <th>Talaba FIO</th>
                                            <th>Olimpiyada Turi</th>
                                            <th>O'tkazilgan Sana</th>
                                            <th>Yo'nalishi</th>
                                            <th>Diplom yoki Sertifikat</th>
                                            <th>Holati</th>
                                            <th>Harakatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id = 1; @endphp
                                        @foreach ($files as $item)
                                        <tr>
                                            <td><input type="checkbox" class="checkItem"></td>
                                            <td>{{ $id++ }}</td>
                                            <td><img src="{{ asset('storage/' . $item->user->picture_path)}}" alt="User" class="img-circle" style="height: 30px;"></td>
                                            <td>{{ $item->user->fio() }}</td>
                                            <td>{{ $item->olympic->criteria->name }}</td>
                                            <td>{{ $item->olympic->date }}</td>
                                            <td>{{ $item->olympic->direction }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><span class="badge badge-{{ $item->status()['color'] }}">{{ $item->status()['name'] }}</span></td>
                                            @if($item->status == 'reviewed')
                                            <td>
                                                <button class="btn btn-sm btn-success confirmAction" data-id="{{ $item->olympic->id }}" data-url="{{ route('employee.inspeksiya.olympic.approve') }}" data-csrf="{{ csrf_token() }}"><i class="fas fa-check"></i></button>
                                                <button class="btn btn-sm btn-danger cancelAction" data-id="{{ $item->olympic->id }}" data-url="{{ route('employee.inspeksiya.olympic.reject') }}" data-csrf="{{ csrf_token() }}"><i class="fas fa-ban"></i></button>
                                            </td>
                                            @elseif($item->file->status == 'rejected')
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" data-reason="{{ $item->file->reject_reason }}">
                                                    <i class="fa fa-eye fa-sm"></i>
                                                </button>
                                            </td>
                                            @else
                                            <td>Bu fayl uchun harakat imkonsiz</td>
                                            @endif
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
