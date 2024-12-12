@extends('layouts::teacher.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Topshiriq Yaratish</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Topshiriq yaratish</li>
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
                    <h3 class="card-title">Yangi Topshiriq Yaratish</h3>
                </div>
                <div class="card-body">
                    <form id="assignmentForm">
                        <div class="form-group">
                            <label for="studentSelect">Talabani tanlang:</label>
                            <select name="student_id" id="studentSelect" class="form-control" required>
                                <option value="" disabled selected>Talabani tanlang</option>
                                <option value="1">Abdullayev Muhammad (2-kurs, Algebra va matematik analiz)</option>
                                <option value="2">Qodirova Xadicha (3-kurs, Fizika va astronomiya)</option>
                                <option value="3">Anvarov Oyatillo (4-kurs, Kompyuter fanlari)</option>
                                <option value="4">Saidov Muhammad (1-kurs, Botanika va o'simlik fiziologiyasi)</option>
                                <option value="5">Nazarov Diyorbek (3-kurs, Anorganik kimyo)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="assignmentTitle">Topshiriq Nomi:</label>
                            <input name="title" type="text" id="assignmentTitle" class="form-control" placeholder="Topshiriq nomini kiriting" required>
                        </div>
                        <div class="form-group">
                            <label for="assignmentDescription">Topshiriq Ta'rifi:</label>
                            <textarea name="description" id="assignmentDescription" class="form-control" rows="4" placeholder="Topshiriq ta'rifini kiriting" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="assignmentFile">Fayl yuklash:</label>
                            <input name="file" type="file" id="assignmentFile" class="form-control-file" required>
                        </div>
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-plus"></i> Yaratish</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
