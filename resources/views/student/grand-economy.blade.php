@extends('layouts::student.app')

@section('content')
<div class="content-wrapper" style="padding: 5px;">
    <section class="content-header">
        <h1>Grand/Xo'jalik Shartnomalari</h1>
    </section>

    <section class="content" style="padding: 5;">
        <div class="container-fluid my-4">
            <!-- Shartnoma Tafsilotlari formasi -->
            <div class="card mt-3 p-4">
                <h3 class="card-title mb-3">Shartnoma Tafsilotlari</h3>
                <form id="contractForm" action="{{ route('student.grand-economy.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Shartnoma turi -->
                        <div class="col-12 col-md-6 mb-3">
                            <label for="contractType" class="form-label">
                                <i class="fas fa-file-contract"></i> Shartnoma turi
                            </label>
                            <select id="contractType" class="form-control" name="type" required>
                                <option value="" disabled selected>Tanlang</option>
                                <option value="grant">Grand shartnoma</option>
                                <option value="economic">Xo'jalik shartnoma</option>
                            </select>
                        </div>

                        <!-- Grant/Loyiha nomi -->
                        <div class="col-12 col-md-6 mb-3">
                            <label for="projectName" class="form-label">
                                <i class="fas fa-project-diagram"></i> Grant/Loyiha nomi
                            </label>
                            <input type="text" id="projectName" class="form-control" name="name" placeholder="Grant yoki loyiha nomini kiriting" required>
                        </div>

                        <!-- Buyruq raqami -->
                        <div class="col-12 col-md-6 mb-3">
                            <label for="orderNumber" class="form-label">
                                <i class="fas fa-hashtag"></i> Buyruq raqami
                            </label>
                            <input type="text" id="orderNumber" class="form-control" name="order_number" placeholder="Buyruq raqamini kiriting" required>
                        </div>

                        <!-- Mablag'i miqdori -->
                        <div class="col-12 col-md-6 mb-3">
                            <label for="amount" class="form-label">
                                <i class="fas fa-dollar-sign"></i> Mablag'i miqdori
                            </label>
                            <input type="number" id="amount" class="form-control" name="amount" placeholder="Mablag' miqdorini kiriting" required>
                        </div>

                        <!-- Buyruq (ko'chirma yuklash) -->
                        <div class="col-12 mb-3">
                            <label for="orderFile" class="form-label">
                                <i class="fas fa-file-upload"></i> Buyruqdan ko'chirma
                            </label>
                            <input type="file" id="orderFile" class="form-control" name="file" required>
                        </div>
                    </div>

                    <!-- Saqlash tugmasi -->
                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="fas fa-save"></i> Saqlash
                    </button>
                </form>
            </div>

            <!-- Jadval: Shartnoma Tafsilotlari -->
            <div class="card card-primary mt-4">
                <div class="card-header">
                    <h3 class="card-title">Yuklangan Shartnomalar Ro'yxati</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <center>
                                <tr>
                                    <th>Shartnoma turi</th>
                                    <th>Grant/Loyiha nomi</th>
                                    <th>Buyruq raqami</th>
                                    <th>Mablag' miqdori</th>
                                    <th>Fayl nomi</th>
                                    <th>Holati</th>
                                    <th>Harakatlar</th>
                                </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Grand shartnoma</td>
                                <td>Loyiha nomi 1</td>
                                <td>123456</td>
                                <td>$10,000</td>
                                <td>file1.pdf</td>
                                <td><span class="badge badge-success">Tekshirildi</span></td>
                                <td>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> O'chirish</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
