@extends('layouts::student.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Startup/Tanlov</h1>
    </section>

    <!-- Card boshi -->
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Startup Selection</h3>
        </div>
        <div class="card-body">
            <form id="startupForm" action="{{ route('student.startup.store') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <!-- Yutuq turi -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="achievementType" class="form-label">
                            <i class="fas fa-trophy"></i> Yutuq turi
                        </label>
                        <select id="achievementType" name="type" class="form-control" required>
                            <option value="" disabled selected>Tanlang</option>
                            <option value="startup">Start up</option>
                            <option value="contest">Tanlovlar</option>
                        </select>
                    </div>

                    <!-- Darajasi -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="level" class="form-label">
                            <i class="fas fa-layer-group"></i> Darajasi
                        </label>
                        <select id="level" name="degree" class="form-control" required>
                            <option value="" disabled selected>Tanlang</option>
                            <option value="institutional">Institut</option>
                            <option value="regional">Viloyat</option>
                            <option value="national">Respublika</option>
                            <option value="international">Xalqaro</option>
                        </select>
                    </div>

                    <!-- Ishtirokchilar -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="participants" class="form-label">
                            <i class="fas fa-users"></i> Ishtirokchilar
                        </label>
                        <select id="participants" name="participant" class="form-control" required onchange="toggleTeamInputs()">
                            <option value="" disabled selected>Tanlang</option>
                            <option value="team">Jamoaviy</option>
                            <option value="individual">Yakalik</option>
                        </select>
                    </div>

                    <!-- F.I.SH (agar jamoaviy tanlansa) -->
                    <div class="col-12 mb-3" id="teamMembers" style="display: none;">
                        <label for="teamMemberName" class="form-label">
                            <i class="fas fa-user"></i> F.I.SH
                        </label>
                        <input type="text" id="teamMemberName" name="team_members" class="form-control" placeholder="Ishtirokchilar ismi, sharifi">
                    </div>

                    <!-- O'tkazilgan joyi -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="location" class="form-label">
                            <i class="fas fa-map-marker-alt"></i> O'tkazilgan joyi
                        </label>
                        <select id="location" class="form-control" name="location" required>
                            <option value="" disabled selected>Tanlang</option>
                            <option value="tashkent">Toshkent</option>
                            <option value="andijan">Andijon</option>
                        </select>
                    </div>

                    <!-- Mavzusi -->
                    <div class="col-12 mb-3">
                        <label for="topic" class="form-label">
                            <i class="fas fa-lightbulb"></i> Mavzusi
                        </label>
                        <textarea id="topic" class="form-control" name="title" placeholder="Mavzuni kiriting" required></textarea>
                    </div>

                    <!-- Asos bo'luvchi hujjat -->
                    <div class="col-12 mb-3">
                        <label for="supportingDocument" class="form-label">
                            <i class="fas fa-file-upload"></i> Asos bo'luvchi hujjat
                        </label>
                        <input type="file" id="supportingDocument" name="file" class="form-control" required>
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

    <!-- Jadval: Yuklangan Yutuqlar Ro'yxati -->
    <div class="card card-primary mt-4">
        <div class="card-header">
            <h3 class="card-title">Yuklangan Yutuqlar Ro'yxati</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th>Yutuq turi</th>
                        <th>Darajasi</th>
                        <th>Ishtirokchilar</th>
                        <th>O'tkazilgan joyi</th>
                        <th>Mavzusi</th>
                        <th>Fayl nomi</th>
                        <th>Holati</th>
                        <th>Harakatlar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Startup</td>
                        <td>Xalqaro</td>
                        <td>Yakalik</td>
                        <td>Toshkent</td>
                        <td>Yashil texnologiyalar</td>
                        <td>document1.pdf</td>
                        <td><span class="badge badge-success">Tasdiqlandi</span></td>
                        <td>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> O'chirish</button>
                        </td>
                    </tr>
                    <!-- Qo'shimcha yutuqlar ma'lumotlari qo'shiladi -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function toggleTeamInputs() {
        const participants = document.getElementById('participants');
        const teamMembers = document.getElementById('teamMembers');

        if (participants.value === 'team') {
            teamMembers.style.display = 'block';
        } else {
            teamMembers.style.display = 'none';
        }
    }

</script>
@endsection