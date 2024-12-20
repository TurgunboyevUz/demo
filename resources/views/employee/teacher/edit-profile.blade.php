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
                        <input type="email" id="email" class="form-control" value="anoyatillo16@gmail.com">
                    </div>

                    <!-- Talaba telefoni -->
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Xodim telefoni (+998 xx xxx-xx-xx)</label>
                        <input type="tel" id="phone" class="form-control" value="+998 93 446-67-52">
                    </div>

                    <!-- Rasm yuklash -->
                    <div class="col-md-6 mb-3">
                        <label for="profilePicture" class="form-label">Rasm</label>
                        <div class="profile-picture-upload">
                            <img src="img/image.jpg" alt="Profil rasmi" class="img-thumbnail" style="width: 100px; height: 100px;">
                            <input type="file" id="profilePicture" class="form-control mt-2">
                        </div>
                    </div>

                    <!-- Parolni o'zgartirish -->
                    <div class="col-md-12 mb-3">
                        <input type="checkbox" id="changePasswordCheckbox" onchange="togglePasswordFields()">
                        <label for="changePasswordCheckbox">Parolni o'zgartirish</label>
                    </div>

                    <!-- Yangi parol -->
                    <div class="col-md-6 mb-3" id="newPasswordField" style="display: none;">
                        <label for="newPassword" class="form-label">Yangi parol</label>
                        <input type="password" id="newPassword" class="form-control" placeholder="Yangi parol">
                    </div>

                    <!-- Parol tasdiq -->
                    <div class="col-md-6 mb-3" id="confirmPasswordField" style="display: none;">
                        <label for="confirmPassword" class="form-label">Parol tasdiq</label>
                        <input type="password" id="confirmPassword" class="form-control" placeholder="Parol tasdiq">
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