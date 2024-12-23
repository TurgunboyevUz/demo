@extends('layouts::employee.dean.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h1 class="m-0">Talabalarni biriktirish</h1>
             </div>
          </div>
       </div>
    </div>
<!-- Main content -->
<div class="content">
 <div class="container-fluid">
    <div class="row">
       <!-- Fakultet va Kafedra tanlash -->
       <div class="col-md-12 mb-4">
             <div class="row">
                <div class="col-md-6">
                   <label for="facultySelect">Fakultetni tanlang</label>
                   <select class="form-control" id="facultySelect">
                         <option value="">Fakultetni tanlang</option>
                         <option value="informatika">Informatika</option>
                         <option value="iqtisodiyot">Iqtisodiyot</option>
                         <!-- Qo'shimcha fakultetlar -->
                   </select>
                </div>
                <div class="col-md-6">
                   <label for="departmentSelect">Kafedrani tanlang</label>
                   <select class="form-control" id="departmentSelect">
                         <option value="">Kafedrani tanlang</option>
                         <option value="dasturiy_ta'minot">Dasturiy ta'minot</option>
                         <option value="moliya">Moliya</option>
                         <!-- Qo'shimcha kafedralar -->
                   </select>
                </div>
             </div>
       </div>

       <!-- Biriktirilgan talabalar jadvali -->
       <div class="col-md-12 mb-4">
             <h4>Biriktirilgan talabalar jadvali</h4>
             <table class="table table-responsive table-bordered" id="assignedTable">
                <thead>
                   <tr>
                         <th>Professorlar ro'yxati</th>
                         <th>Talabalar ro'yxati</th>
                   </tr>
                </thead>
                <tbody id="assignedTableBody">
                   <!-- Dinamik jadval -->
                </tbody>
             </table>
             <center>
                <button class="btn btn-success btn-sm mb-2" id="saveChanges">
                   <i class="fas fa-check mr-2"></i>O'zgarishlarni saqlash
                </button>
             </center>
       </div>

       <!-- Professorlar va Talabalar jadvali -->
       <table class="table table-bordered" id="ListofProfessorsandStudents">
             <thead>
                <tr>
                   <th>Professorlar</th>
                   <th>Talabalar</th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td>
                         <ul class="list-group" id="professorList">
                            <!-- Professorlar dinamik ro'yxati -->
                         </ul>
                   </td>
                   <td>
                         <ul class="list-group" id="studentList">
                            <!-- Talabalar dinamik ro'yxati -->
                         </ul>
                   </td>
                </tr>
             </tbody>
       </table>
    </div>
 </div>
</div>
</div>
@endsection
