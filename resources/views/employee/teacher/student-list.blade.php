@extends('layouts::employee.teacher.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Talabalar ro'yxati</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Talabalar ro'yxati</li>
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
                            <h3 class="card-title">Biriktirilgan talabalar ro'yxati</h3>
                            <div class="ml-auto d-flex">
                                <button class="btn btn-success" onclick="return confirm('Chindan ham jadvalni Excel holatda yuklaysizmi?')">
                                    <i class="fas fa-file-excel"></i> Excelda yuklash
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="studentsTable" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 3%;">#</th>
                                            <th style="width: 7%;">Rasmi</th>
                                            <th>Ism Familyasi</th>
                                            <th>Fakultet</th>
                                            <th>Yo'nalish</th>
                                            <th style="width: 8%;">Kurs</th>
                                            <th style="width: 8%;">Umumiy ball</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>1</td>
                                                <td><center><img src="{{ asset('storage/' . $student->user->picture_path) }}" alt="User" class="img-circle" style="height: 30px;"></center></td>
                                                <td>{{ $student->user->fio() }}</td>
                                                <td>{{ $student->faculty->name }}</td>
                                                <td>{{ $student->specialty->name }}</td>
                                                <td>{{ $student->level }}</td>
                                                <td>0</td>
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

@section('scripts')
<script>
    $(function() {
        var e = $("#languageCertificatesTable").DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: "{{ asset('dist/js/uzbek.json') }}"
                }
            }),
        
        t = $("#checkAll");
        
        t.click(function() {
            e.find("tr").each(function() {
                var e = $(this).find("input.checkItem");
                e.prop("checked", t.prop("checked"))
            })
        }),
        
        $(".deleteMessage").click(function() {
            confirm("Xabarni chindan ham o'chirmoqchimisiz?") && alert("Xabar o'chirildi")
        }),
        
        $("#zipDownload").click(function() {
            var e = $(".checkItem:checked").length;
            if (e > 0) alert("Fayl yuklanish boshlandi"), console.log("ZIP yuklash boshlandi");
            else alert("Siz biror talaba tanlamagansiz")
        })
    });
</script>
@endsection