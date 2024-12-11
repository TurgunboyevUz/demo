@extends('layouts::student.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Topshiriqlar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Berilgan topshiriqlar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Topshiriqlar ro'yxati -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Berilgan Topshiriqlar</h3>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><i class="fas fa-file-alt"></i> 1. Ilmiy maqola tayyorlash</h5>
                                <a href="#" class="btn btn-sm btn-success" download><i class="fas fa-download"></i> Yuklab Olish</a>
                            </div>
                            <p class="mb-1">Ilmiy maqola tayyorlash bo'yicha topshiriq</p>
                            <small class="text-muted">Topshiriq yuklangan sana: 2023-05-10</small>
                        </div>
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><i class="fas fa-file-powerpoint"></i> 2. Prezentatsiya tayyorlash</h5>
                                <a href="#" class="btn btn-sm btn-success" download><i class="fas fa-download"></i> Yuklab Olish</a>
                            </div>
                            <p class="mb-1">Prezentatsiya tayyorlash bo'yicha topshiriq</p>
                            <small class="text-muted">Topshiriq yuklangan sana: 2023-04-22</small>
                        </div>
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><i class="fas fa-code"></i> 3. Dasturiy loyiha tayyorlash</h5>
                                <a href="#" class="btn btn-sm btn-success" download><i class="fas fa-download"></i> Yuklab Olish</a>
                            </div>
                            <p class="mb-1">Dasturiy loyiha tayyorlash bo'yicha topshiriq</p>
                            <small class="text-muted">Topshiriq yuklangan sana: 2023-03-15</small>
                        </div>
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><i class="fas fa-book"></i> 4. Kitob muhokamasi</h5>
                                <a href="#" class="btn btn-sm btn-success" download><i class="fas fa-download"></i> Yuklab Olish</a>
                            </div>
                            <p class="mb-1">Kitob muhokamasi bo'yicha topshiriq</p>
                            <small class="text-muted">Topshiriq yuklangan sana: 2023-02-10</small>
                        </div>
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><i class="fas fa-file-word"></i> 5. Referat yozish</h5>
                                <a href="#" class="btn btn-sm btn-success" download><i class="fas fa-download"></i> Yuklab Olish</a>
                            </div>
                            <p class="mb-1">Referat yozish bo'yicha topshiriq</p>
                            <small class="text-muted">Topshiriq yuklangan sana: 2023-01-25</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection