@extends('layouts::student.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Ixtro/DGU/Foydali model</h1>
    </section>

    <!-- Intellektual mulk yaratish shakli -->
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Intellektual Mulk Yaratish</h3>
        </div>
        <div class="card-body">
            <form id="inventionForm" action="{{ route('student.invention.store') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <!-- Talaba FIO -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="studentName"><i class="fas fa-user"></i> Talaba FIO</label>
                        <input type="text" id="studentName" name="student_name" class="form-control" placeholder="{{ $user->first_name . ' ' . $user->second_name . ' ' . $user->third_name }}" disabled required>
                    </div>
                    <!-- Intellektual Mulk Nomi -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="propertyTitle"><i class="fas fa-book"></i> Intellektual Mulk Nomi</label>
                        <input type="text" id="propertyTitle" name="title" class="form-control" placeholder="Intellektual mulk nomi" required>
                    </div>
                    <!-- Intellektual Mulk Turi -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="propertyType"><i class="fas fa-file-alt"></i> Intellektual Mulk Turi</label>
                        <select id="propertyType" name="type" class="form-control" required>
                            <option value="">Tanlang...</option>
                            <option value="invention">Ixtiro</option>
                            <option value="model">Foydali model</option>
                            <option value="dgu">DGU</option>
                            <option value="industria">Sanoat namunasi</option>
                            <option value="selection">Seleksiya yutuqlari</option>
                            <option value="patent">Tovar belgisi</option>
                        </select>
                    </div>
                    <!-- Intellektual Mulk Raqami -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="propertyNumber"><i class="fas fa-hashtag"></i> Intellektual Mulk Raqami</label>
                        <input type="text" id="propertyNumber" name="property_number" class="form-control" placeholder="12345" required>
                    </div>
                    <!-- Mualliflar soni -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="authorCount"><i class="fas fa-users"></i> Mualliflar soni</label>
                        <input type="number" id="authorCount" name="authors_count" class="form-control" placeholder="Mualliflar soni" required>
                    </div>
                    <!-- Mualliflar -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="authors"><i class="fas fa-user-friends"></i> Mualliflar</label>
                        <input type="text" id="authors" name="authors" class="form-control" placeholder="Samadov Fahriddin, Anvarov Oyatillo" required>
                        <small class="form-text text-muted">Masalan: Samadov, Anvarov Oyatillo, Diyorbek Turg'unboyev</small>
                    </div>
                    <!-- Nashr Parametrlari -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="publicationParams"><i class="fas fa-newspaper"></i> Nashr Parametrlari</label>
                        <input type="text" id="publicationParams" name="publish_params" class="form-control" placeholder="Nashr haqida ma'lumot" required>
                    </div>
                    <!-- O'quv yili -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="academicYear"><i class="fas fa-calendar"></i> O'quv yili</label>
                        <input type="text" id="academicYear" name="education_year" class="form-control" placeholder="2023-2024" required>
                    </div>
                    <!-- Fayl Yuklash -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="fileUpload"><i class="fas fa-upload"></i> Fayl Yuklash</label>
                        <input type="file" id="fileUpload" name="file" class="form-control-file" required>
                    </div>
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Saqlash</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Jadval: Intellektual mulklar ro'yxati -->
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Yuklangan Intellektual Mulklar ro'yxati</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
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
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> O'chirish</button>
                        </td>
                    </tr>
                    <!-- Qo'shimcha mulklar qo'shiladi -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection