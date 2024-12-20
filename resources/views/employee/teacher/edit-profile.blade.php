@extends('layouts::employee.teacher.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Profilni tahrirlash</h1>
    </section>

    <div class="card mt-3">
        <div class="card-body">
            <form id="profileForm">
                <div class="row">
                    <!-- Ismi -->
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">Ismi</label>
                        <input type="text" id="firstName" class="form-control" value="OYATILLO" readonly>
                    </div>

                    <!-- Familya -->
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Familiya</label>
                        <input type="text" id="lastName" class="form-control" value="ANVAROV" readonly>
                    </div>

                    <!-- Fakultet tanlash -->
                    <div class="col-md-6 mb-3">
                        <label for="faculty" class="form-label">Fakultet</label>
                        
                        <select id="faculty" class="form-control" readonly>
                            <option value="" disabled>Fakultetlar</option>
                        </select>
                    </div>

                    <!-- Login -->
                    <div class="col-md-6 mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" id="login" class="form-control" value="303211100651" readonly>
                    </div>

                    <!-- Pasport raqami -->
                    <div class="col-md-6 mb-3">
                        <label for="passport" class="form-label">Pasport raqami</label>
                        <input type="text" id="passport" class="form-control" value="AC2815719" readonly>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" value="anoyatillo16@gmail.com" readonly>
                    </div>

                    <!-- Talaba telefoni -->
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Xodim telefoni (+998 xx xxx-xx-xx)</label>
                        <input type="tel" id="phone" class="form-control" value="+998 93 446-67-52" readonly>
                    </div>

                    <!-- Rasm yuklash -->
                    <div class="col-md-6 mb-3">
                        <label for="profilePicture" class="form-label">Rasm</label>
                        <div class="profile-picture-upload">
                            <img src="img/image.jpg" alt="Profil rasmi" class="img-thumbnail" style="width: 100px; height: 100px;">
                        </div>
                    </div>

                    <!-- Saqlash tugmasi -->
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Saqlash
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection