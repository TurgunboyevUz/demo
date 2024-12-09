@extends('layouts::teacher.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Yuklangan Maqolalar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Yuklangan Maqolalar</li>
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
                            <h3 class="card-title">Barcha Biriktirilgan Talabalar Maqolalari</h3>
                            <div class="ml-auto d-flex">
                                <button id="zipDownload" class="btn btn-success">
                                    <i class="fas fa-file-archive"></i> ZIP Yuklash
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-width: 105%; overflow-x: auto;">
                                <table id="articlesTable" class="table table-bordered table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;"><input type="checkbox" id="checkAll"></th>
                                            <th style="width: 5%;">#</th>
                                            <th>Rasmi</th>
                                            <th>Talaba Ism, Familiyasi</th>
                                            <th>Ilmiy Ish Nomi</th>
                                            <th>Kalit So'zlar</th>
                                            <th>Til</th>
                                            <th>Mualliflar</th>
                                            <th>DOI</th>
                                            <th>Manba (Jurnal) Nomi</th>
                                            <th>Xalqaro Ilmiy Bazalar</th>
                                            <th>Nashr Yili</th>
                                            <th>Nashr Parametrlari</th>
                                            <th>O'quv Yili</th>
                                            <th>Fayl Nomi</th>
                                            <th>Harakatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" class="checkItem"></td>
                                            <td>1</td>
                                            <td><img src="img/image.jpg" alt="User" class="img-circle" style="height: 30px;"></td>
                                            <td>Abdullayev Muhammad</td>
                                            <td>Ilmiy tadqiqot</td>
                                            <td>Kalit so'z</td>
                                            <td>O'zbekcha</td>
                                            <td>Mualliflar ro'yxati</td>
                                            <td>10.1234/abcde</td>
                                            <td>Jurnal nomi</td>
                                            <td>Xalqaro bazalar</td>
                                            <td>2024</td>
                                            <td>Parametrlari</td>
                                            <td>2023/2024</td>
                                            <td>ilmiy_ish.pdf</td>
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
                                            <th>Talaba Ism, Familiyasi</th>
                                            <th>Ilmiy Ish Nomi</th>
                                            <th>Kalit So'zlar</th>
                                            <th>Til</th>
                                            <th>Mualliflar</th>
                                            <th>DOI</th>
                                            <th>Manba (Jurnal) Nomi</th>
                                            <th>Xalqaro Ilmiy Bazalar</th>
                                            <th>Nashr Yili</th>
                                            <th>Nashr Parametrlari</th>
                                            <th>O'quv Yili</th>
                                            <th>Fayl Nomi</th>
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
