@extends('layouts::student.app')

@section('content')
<div class="content-wrapper" style="padding: 5px;">
    <section class="content-header">
        <h1>Til Sertifikati</h1>
    </section>

    <section class="content" style="padding: 5px;">
        <div class="container-fluid my-4">
            <!-- Til Sertifikati Tafsilotlari -->
            <div class="card mt-3 p-4">
                <h3 class="card-title mb-3">Til Sertifikati Tafsilotlari</h3>
                <form id="languageCertificateForm" action="{{ route('student.lang-certificate.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Chet tili -->
                        <div class="col-md-6 mb-3">
                            <label for="language" class="form-label">
                                <i class="fas fa-language"></i> Chet tili
                            </label>
                            <select id="language" name="lang" class="form-control" required>
                                <option value="" disabled selected>Tanlang</option>
                                <option value="en">Ingliz tili</option>
                                <option value="ru">Rus tili</option>
                                <option value="de">Nemis tili</option>
                                <option value="other">Boshqa</option>
                            </select>
                        </div>

                        <!-- Sertifikat turi -->
                        <div class="col-md-6 mb-3">
                            <label for="certificateType" class="form-label">
                                <i class="fas fa-certificate"></i> Sertifikat turi
                            </label>
                            <select id="certificateType" name="type" class="form-control" required>
                                <option value="" disabled selected>Tanlang</option>
                                <option value="national">Milliy sertifikat</option>
                                <option value="cambridge">Cambridge Assessment English (FCE, CAE, CPE)</option>
                                <option value="toefl-itp">Test of English Foreign Language (TOEFL, ITP)</option>
                                <option value="toefl-ibt">Test of English Foreign Language (TOEFL, IBT)</option>
                                <option value="ielts">International English Language Testing System (IELTS)</option>
                                <option value="itep">iTEP Academic — Plus</option>
                            </select>
                        </div>

                        <!-- Sertifikat darajasi -->
                        <div class="col-md-6 mb-3">
                            <label for="certificateLevelType" class="form-label">
                                <i class="fas fa-landmark"></i> Sertifikat darajasi
                            </label>
                            <select id="certificateLevelType" name="degree" class="form-control" required>
                                <option value="" disabled selected>Tanlang</option>
                                <option value="b1">B1</option>
                                <option value="b2">B2</option>
                                <option value="c1">C1</option>
                                <option value="c2">C2</option>
                            </select>
                        </div>

                        <!-- Sertifikat berilgan sana -->
                        <div class="col-md-6 mb-3">
                            <label for="certificateDate" class="form-label">
                                <i class="fas fa-calendar"></i> Sertifikat berilgan sana
                            </label>
                            <input type="date" id="certificateDate" name="given_date" class="form-control" required>
                        </div>

                        <!-- Sertifikat yuklash -->
                        <div class="col-md-6 mb-3">
                            <label for="certificateFile" class="form-label">
                                <i class="fas fa-file-upload"></i> Sertifikatni PDF formatda yuklash
                            </label>
                            <input type="file" id="certificateFile" name="file" class="form-control" accept=".pdf" required>
                        </div>
                    </div>

                    <!-- Saqlash tugmasi -->
                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="fas fa-save"></i> Saqlash
                    </button>
                </form>
            </div>

            <!-- Til Sertifikati Ro'yxati Jadvali -->
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">Yuklangan Til Sertifikatlari Ro'yxati</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Chet tili</th>
                                <th>Sertifikat turi</th>
                                <th>Darajasi</th>
                                <th>Berilgan sana</th>
                                <th>Fayl nomi</th>
                                <th>Harakatlar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ingliz tili</td>
                                <td>IELTS</td>
                                <td>C1</td>
                                <td>2023-09-15</td>
                                <td>IELTS_Certificate.pdf</td>
                                <td>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> O'chirish</button>
                                </td>
                            </tr>
                            <!-- Qo'shimcha sertifikatlar qo'shiladi -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection