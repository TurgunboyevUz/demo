@extends('layouts::student.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>O'quv yili davomida erishgan yutuqlar</h1>
    </section>

    <!-- Card boshi -->
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Yutuq qo'shish</h3>
        </div>
        <div class="card-body">
            <form id="achievementForm" action="{{ route('student.achievement.store') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <!-- Yutuq turi -->
                    <div class="col-md-6 mb-3">
                        <label for="achievementType" class="form-label">
                            <i class="fas fa-trophy"></i> Yutuq turi
                        </label>
                        <select id="achievementType" class="form-control" name="type" required>
                            <option value="" disabled selected>Tanlang</option>
                            <option value="sport">Sport</option>
                            <option value="cultural">Ma'naviy-ma'rifiy ishlar</option>
                        </select>
                    </div>

                    <!-- Darajasi -->
                    <div class="col-md-6 mb-3">
                        <label for="degree" class="form-label">
                            <i class="fas fa-layer-group"></i> Darajasi
                        </label>
                        <select id="level" class="form-control" name="level" required>
                            <option value="" disabled selected>Tanlang</option>
                            <option value="institutional">Institut</option>
                            <option value="regional">Viloyat</option>
                            <option value="national">Respublika</option>
                            <option value="international">Xalqaro</option>
                        </select>
                    </div>

                    <!-- Ishtirokchilar -->
                    <div class="col-md-6 mb-3">
                        <label for="participant" class="form-label">
                            <i class="fas fa-users"></i> Ishtirokchilar
                        </label>
                        <select id="participants" class="form-control" name="participants" required onchange="toggleTeamInputs()">
                            <option value="" disabled selected>Tanlang</option>
                            <option value="team">Jamoaviy</option>
                            <option value="individual">Yakalik</option>
                        </select>
                    </div>

                    <!-- F.I.SH (agar jamoaviy tanlansa) -->
                    <div class="col-md-12 mb-3" id="teamMembers" style="display: none;">
                        <label for="teamMemberName" class="form-label">
                            <i class="fas fa-user"></i> F.I.SH
                        </label>
                        <input type="text" id="teamMemberName" class="form-control" name="team_members" placeholder="Ishtirokchilar ismi, sharifi">
                    </div>

                    <!-- O'tkazilgan joyi -->
                    <div class="col-md-6 mb-3">
                        <label for="location" class="form-label">
                            <i class="fas fa-map-marker-alt"></i> O'tkazilgan joyi
                        </label>
                        <select id="location" class="form-control" name="location" required>
                            <option value="" disabled selected>Tanlang</option>
                            <option value="tashkent">Toshkent</option>
                            <option value="andijan">Andijon</option>
                        </select>
                    </div>

                    <!-- Hujjat turi -->
                    <div class="col-md-6 mb-3">
                        <label for="document_type" class="form-label">
                            <i class="fas fa-file-alt"></i> Hujjat turi
                        </label>
                        <select id="documentType" class="form-control" name="document_type" required>
                            <option value="" disabled selected>Tanlang</option>
                            <option value="certificate">Sertifikat</option>
                            <option value="diploma">Diplom</option>
                        </select>
                    </div>

                    <!-- Fayl yuklash -->
                    <div class="col-md-12 mb-3">
                        <label for="uploadFile" class="form-label">
                            <i class="fas fa-file-upload"></i> Fayl yuklash
                        </label>
                        <input type="file" name="file" id="uploadFile" class="form-control" required>
                    </div>
                </div>

                <!-- Saqlash tugmasi -->
                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Saqlash
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Jadval qismi -->
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Yutuqlar Ro'yxati</h3>
        </div>
        <div class="card-body p-4 table-responsive">
            <table class="table table-bordered table-hover table-responsive">
                <thead class="thead">
                    <tr>
                        <th>Yutuq turi</th>
                        <th>Darajasi</th>
                        <th>Ishtirokchilar</th>
                        <th>O'tkazilgan joyi</th>
                        <th>Hujjat turi</th>
                        <th>Fayl</th>
                        <th>Harakatlar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sport</td>
                        <td>Respublika</td>
                        <td>Jamoaviy</td>
                        <td>Toshkent</td>
                        <td>Sertifikat</td>
                        <td>certificate.pdf</td>
                        <td>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                O'chirish</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    function toggleTeamInputs() {
        const participants = document.getElementById('participants');
        const teamMembers = document.getElementById('teamMembers');

        if (participants.value === 'team') {
            teamMembers.style.display = 'block';
        } else {
            teamMembers.style.display = 'none';
        }
    }
@endsection