@extends('layouts::employee.teacher.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Biriktirilgan talabalar reytingi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Biriktirilgan talabalar reytingi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Talabalar ma'lumotlari</h3>
                    <div class="float-right">
                        <button class="btn btn-success btn-sm mr-2" id="excel-download"><i class="fas fa-file-excel"></i> Excel Yuklash</button>
                        <button class="btn btn-primary btn-sm" id="zip-download"><i class="fas fa-file-archive"></i> ZIP Yuklash</button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="students-table" class="table table-bordered table-responsive table-hover" style="display: block; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center"><input type="checkbox" id="select-all"></th>
                                <th class="text-center">#</th>
                                <th class="text-center">Rasmi</th>
                                <th class="text-center">Talaba FIO</th>
                                <th class="text-center">Kurs</th>
                                <th class="text-center">Yo'nalish</th>
                                <th colspan="4" class="text-center">Maqolalar</th>
                                <th colspan="3" class="text-center">Stipendiyalar</th>
                                <th colspan="3" class="text-center">Ixtiro/DGU/Foydali model</th>
                                <th colspan="2" class="text-center">Startup/Tanlov</th>
                                <th colspan="2" class="text-center">Grand/Xo'jalik</th>
                                <th colspan="3" class="text-center">Olimpiyadalar</th>
                                <th colspan="3" class="text-center">Til sertifikatlari</th>
                                <th class="text-center">Yutuqlar</th>
                                <th class="text-center">Umumiy Ball</th>
                                <!-- <th class="text-center">Harakatlar</th> -->
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="rotate">SCOPUS</th>
                                <th class="rotate">Mahalliy</th>
                                <th class="rotate">Xorijiy</th>
                                <th class="rotate">Tezis</th>
                                <th class="rotate">Institut</th>
                                <th class="rotate">Viloyat</th>
                                <th class="rotate">Respublika</th>
                                <th class="rotate">Ixtiro</th>
                                <th class="rotate">DGU</th>
                                <th class="rotate">Foydali model</th>
                                <th class="rotate">Startup</th>
                                <th class="rotate">Tanlov</th>
                                <th class="rotate">Grand</th>
                                <th class="rotate">Xo'jalik</th>
                                <th class="rotate">Institut</th>
                                <th class="rotate">Viloyat</th>
                                <th class="rotate">Xalqaro</th>
                                <th class="rotate">Rus</th>
                                <th class="rotate">Ingliz</th>
                                <th class="rotate">Nemis</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($students as $student)
                            <tr>
                                <td class="text-center"><input type="checkbox" class="student-checkbox"></td>
                                <td>{{ $i++ }}</td>
                                <td><img src="{{ asset('storage/' . $student['picture_path']) }}" alt="Avatar" class="img-circle elevation-2" style="width: 50px; height: 50px;"></td>
                                <td>{{ $student['fio'] }}</td>
                                <td>{{ $student['level'] }}-kurs</td>
                                <td>{{ $student['specialty'] }}</td>
                                <td>{{ $student['articles']['scopus'] }}</td>
                                <td>{{ $student['articles']['local'] }}</td>
                                <td>{{ $student['articles']['global'] }}</td>
                                <td>{{ $student['articles']['thesis'] }}</td>
                                <td>{{ $student['scholarships']['institute'] }}</td>
                                <td>{{ $student['scholarships']['region'] }}</td>
                                <td>{{ $student['scholarships']['republic'] }}</td>
                                <td>{{ $student['inventions']['invention'] }}</td>
                                <td>{{ $student['inventions']['dgu'] }}</td>
                                <td>{{ $student['inventions']['model'] }}</td>
                                <td>{{ $student['startups']['startup'] }}</td>
                                <td>{{ $student['startups']['contest'] }}</td>
                                <td>{{ $student['grands']['grand'] }}</td>
                                <td>{{ $student['grands']['economy'] }}</td></td>
                                <td>{{ $student['olympics']['institute'] }}</td>
                                <td>{{ $student['olympics']['region'] }}</td>
                                <td>{{ $student['olympics']['republic'] }}</td>
                                <td>{{ $student['lang']['ru'] }}</td>
                                <td>{{ $student['lang']['en'] }}</td>
                                <td>{{ $student['lang']['de'] }}</td>
                                <td>{{ $student['achievements'] }}</td>
                                <td>{{ $student['total_score'] }} ball</td>
                                <!-- <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> O'chirish</button></td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection
