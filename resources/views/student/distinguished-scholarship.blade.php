@extends('layouts::student.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Iqtidorli Talabalar Nomdor Stipendiyalari uchun Ariza</h1>
    </section>
    <section class="content">
        <div class="container my-4">
            <div class="card p-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Ariza uchun Kerakli Hujjatlar</h3>
                </div>
                <div class="card-body">
                    <form id="stipendiyaForm" action="{{ route('student.distinguished-scholarship') }}" method="POST" enctype="multipart/form-data">
                        <!-- Talabaning ma’lumotnomasi -->
                        <div class="form-group mb-4 p-3 border rounded">
                            <label for="obektivka">
                                <strong>1. Talabaning ma’lumotnomasi (obektivka)</strong>
                            </label>
                            <input type="file" id="obektivka" class="form-control-file mt-2" name="obektivka" required>
                        </div>
                        <!-- Pasport nusxasi -->
                        <div class="form-group mb-4 p-3 border rounded">
                            <label for="pasport">
                                <strong>2. Pasport nusxasi (rangli)</strong>
                            </label>
                            <input type="file" id="pasport" class="form-control-file mt-2" name="pasport" required>
                        </div>
                        <!-- Reyting daftarchasi ko'chirma yoki HEMIS transkripti -->
                        <div class="form-group mb-4 p-3 border rounded">
                            <label for="reyt">
                                <strong>3. Reyting daftarchasidan ko‘chirma yoki HEMIS tizimidan transkript</strong>
                            </label>
                            <input type="file" id="reyt" name="reyting" class="form-control-file mt-2" required>
                        </div>
                        <!-- Dekanning kafolat xati -->
                        <div class="form-group mb-4 p-3 border rounded">
                            <label for="kafolatXati">
                                <strong>4. Dekanning kafolat xati</strong>
                            </label>
                            <input type="file" id="kafolatXati" name="kafolat_xati" class="form-control-file mt-2" required>
                        </div>
                        <!-- Dekan tavsiyanomasi -->
                        <div class="form-group mb-4 p-3 border rounded">
                            <label for="dekanTavsiyanomasi">
                                <strong>5. Dekan tavsiyanomasi</strong>
                            </label>
                            <input type="file" id="dekanTavsiyanomasi" name="dekan_tavsiyanomasi" class="form-control-file mt-2" required>
                        </div>
                        <!-- Fakultet bayonnomasidan ko‘chirma -->
                        <div class="form-group mb-4 p-3 border rounded">
                            <label for="fakultetBayonnoma">
                                <strong>6. Fakultet bayonnomasidan ko‘chirma</strong>
                            </label>
                            <input type="file" id="fakultetBayonnoma" name="fakultet_bayonnoma" class="form-control-file mt-2" required>
                        </div>
                        <!-- Kafedra mudiri tavsiyanomasi -->
                        <div class="form-group mb-4 p-3 border rounded">
                            <label for="kafedraTavsiyanomasi">
                                <strong>7. Kafedra mudiri tavsiyanomasi</strong>
                            </label>
                            <input type="file" id="kafedraTavsiyanomasi" name="kafedra_tavsiyanomasi" class="form-control-file mt-2" required>
                        </div>
                        <!-- Ilmiy rahbarining xulosasi -->
                        <div class="form-group mb-4 p-3 border rounded">
                            <label for="ilmiyRahbarXulosa">
                                <strong>8. Ilmiy rahbarining xulosasi</strong>
                            </label>
                            <input type="file" id="ilmiyRahbarXulosa" name="ilmiy_rahbar_xulosa" class="form-control-file mt-2" required>
                        </div>
                        <!-- Ilmiy (ijodiy) ishlar ro‘yxati -->
                        <div class="form-group mb-4 p-3 border rounded">
                            <label for="ijodiyIshlar">
                                <strong>9. Ilmiy (ijodiy) ishlar ro‘yxati (2-ilova)</strong>
                            </label>
                            <input type="file" id="ijodiyIshlar" name="ijodiy_ishlar" class="form-control-file mt-2" required>
                        </div>
                        <!-- Diplom, sertifikat va faxriy yorliqlar -->
                        <div class="form-group mb-4 p-3 border rounded">
                            <label for="diplomlar">
                                <strong>10. Diplom, sertifikat va faxriy yorliqlar</strong>
                            </label>
                            <input type="file" id="diplomlar" name="diplomlar" class="form-control-file mt-2" required>
                        </div>
                        <!-- Jo'natish tugmasi -->
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-m">
                                <i class="fas fa-check"></i> Jo'natish </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Responsive Jadval qo'shish -->
        <div class="card mt-4 table-responsive">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Stipendiya Arizalari Ro'yxati</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
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
                        <tr>
                            <td>Shoxrux</td>
                            <td>file1.pdf</td>
                            <td>file2.pdf</td>
                            <td>file3.pdf</td>
                            <td>file4.pdf</td>
                            <td><span class="badge badge-success">Tasdiqlandi</span></td>
                            <td><button class="btn btn-danger btn-sm">O'chirish</button></td>
                        </tr>
                        <!-- Qo'shimcha talabalar ma'lumotlari qo'shiladi -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
