@extends('layouts::student.app')

@section('content')
<div class="content-wrapper">
    <!-- Page Header -->
    <section class="content-header">
        <h1>Talaba Olimpiada Ma'lumotlari</h1>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid my-4">
            <!-- Form Card -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Olimpiadada qatnashish ma'lumotlarini kiriting</h3>
                </div>
                <div class="card-body p-4">
                    <form id="olympiadForm" action="{{ route('student.olympics.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Olimpiyada turi -->
                            <div class="col-md-6 mb-3">
                                <label for="olympiadType" class="form-label">
                                    <i class="fas fa-trophy"></i> Olimpiyada turi
                                </label>
                                <select id="olympiadType" name="type" class="form-control" required>
                                    <option value="" disabled selected>Tanlang</option>
                                    <option value="institutional">Institut Olimpiyada</option>
                                    <option value="regional">Viloyat Olimpiyada</option>
                                    <option value="international">Xalqaro Olimpiyada</option>
                                </select>
                            </div>
                            <!-- Olimpiyada o'tkazilgan sana -->
                            <div class="col-md-6 mb-3">
                                <label for="olympiadDate" class="form-label">
                                    <i class="fas fa-calendar-alt"></i> Olimpiyada o'tkazilgan sana
                                </label>
                                <input type="date" id="olympiadDate" name="date" class="form-control" required>
                            </div>
                            <!-- Olimpiyada yo'nalishi -->
                            <div class="col-md-6 mb-3">
                                <label for="olympiadDirection" class="form-label">
                                    <i class="fas fa-book"></i> Olimpiyada yo'nalishi
                                </label>
                                <input type="text" id="olympiadDirection" name="direction" class="form-control" placeholder="Olimpiyada yo'nalishini kiriting" required>
                            </div>
                            <!-- Diplom yoki sertifikat -->
                            <div class="col-md-6 mb-3">
                                <label for="certificateFile" class="form-label">
                                    <i class="fas fa-file-upload"></i> Diplom yoki sertifikat
                                </label>
                                <input type="file" id="certificateFile" name="file" class="form-control-file mt-2" required>
                            </div>
                        </div>
                        <!-- Jo'natish tugmasi -->
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check"></i> Jo'natish
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table Card -->
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Olimpiada Arizalari Ro'yxati</h3>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Olimpiyada turi</th>
                                    <th>O'tkazilgan sana</th>
                                    <th>Yo'nalishi</th>
                                    <th>Diplom yoki sertifikat</th>
                                    <th>Holati</th>
                                    <th>Harakatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Institut Olimpiyada</td>
                                    <td>2024-10-10</td>
                                    <td>Matematika</td>
                                    <td>certificate1.pdf</td>
                                    <td><span class="badge badge-success">Tasdiqlandi</span></td>
                                    <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> O'chirish</button></td>
                                </tr>
                                <!-- Qo'shimcha olimpiada ma'lumotlari qo'shiladi -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection