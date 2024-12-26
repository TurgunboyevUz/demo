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
                            <i class="fas fa-check mr-2"></i>O'zgarishlarni saqlash </button>
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

@section('scripts')
<script>
$(document).ready(function () {
    function populateList(listElement, items) {
        items.forEach(item => {
            const li = $(`<li class="list-group-item" data-id="${item.id}">${item.name}</li>`);
            li.on('click', function () {
                $(listElement).find('.active').removeClass('active');
                $(this).toggleClass('active');
            });
            $(listElement).append(li);
        });
    }
    
    $.ajax({
        url: '/api/dean/student-employee',
        type: 'GET',
        success: function (response) {
            const professors = response.data.employees.map(professor => {
                return {
                    id: professor.id,
                    name: professor.user.name + ' ' + professor.user.surname
                };
            });
            
            const students = response.data.students.map(student => {
                return {
                    id: student.id,
                    name: `${student.level} - kurs | ${student.specialty.name} ${student.group.name} | ${student.user.name} ${student.user.surname}`
                };
            });

            populateList('#professorList', professors);
            populateList('#studentList', students);
        },

        error: function (response) {
            console.log('Error:', response);
        }
    });

    const assignedPairs = new Set();

    $('#professorList, #studentList').on('click', function () {
        const selectedProfessor = $('#professorList .active');
        const selectedStudent = $('#studentList .active');

        if (selectedProfessor.length && selectedStudent.length) {
            const professorId = selectedProfessor.data('id');
            const studentId = selectedStudent.data('id');
            const pairKey = `${professorId}-${studentId}`;

            if (!assignedPairs.has(pairKey)) {
                $('#assignedTableBody').append(`
                       <tr class="fade-in">
                           <td>${selectedProfessor.text()}</td>
                           <td>${selectedStudent.text()}</td>
                       </tr>
                   `);
                assignedPairs.add(pairKey);
                selectedProfessor.removeClass('active').addClass('fade-out');
                selectedStudent.removeClass('active').addClass('fade-out');
                setTimeout(function () {
                    selectedProfessor.removeClass('fade-out');
                    selectedStudent.removeClass('fade-out');
                }, 500);
            } else {
                alert('Bu talaba allaqachon biriktirilgan!');
            }
        }
    });

    $('#facultySelect').on('change', function () {
        const faculty = $(this).val();
        if (faculty) {
            $('#departmentSelect').prop('disabled', false);
        } else {
            $('#departmentSelect').prop('disabled', true);
        }
    });

    $('#ListofProfessorsandStudents').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            url: "dist/js/uzbek.json"
        }
    });

    $('#saveChanges').on('click', function () {
        const dataToSend = [];
        $('#assignedTableBody tr').each(function () {
            const professor = $(this).find('td').eq(0).text();
            const student = $(this).find('td').eq(1).text();
            dataToSend.push({ professor, student });
        });

        $.ajax({
            url: '/api/dean/attach-student',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(dataToSend),
            success: function (response) {
                alert('O’zgarishlar muvaffaqiyatli saqlandi!');
            },
            error: function () {
                alert('O’zgarishlarni saqlashda xatolik yuz berdi.');
            }
        });
    });
});
</script>
@endsection