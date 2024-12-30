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
                                <option value="" disabled selected>Fakultetni tanlang</option>
                                @foreach ($faculties as $faculty)
                                @php
                                $attributes = 'disabled';

                                if($faculty->id == $department->id)
                                {
                                $attributes = '';
                                }
                                @endphp

                                <option value="{{ $faculty->id }}" {{ $attributes }}>{{ $faculty->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="departmentSelect">Kafedrani tanlang</label>
                            <select class="form-control" id="departmentSelect">

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
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
<script>
    $(document).ready(function() {
        function showToast(position, icon, toast_message) {
            Swal.fire({
                toast: true,
                position: position,
                icon: icon,
                title: toast_message,
                background: "#f5f6f7",
                timerProgressBar: true,
                showCloseButton: true,
                timer: 4000
            });
        }

        const populateList = (listElement, items) => {
            $(listElement).empty();
            items.forEach(item => {
                const li = $(`<li class="list-group-item" data-id="${item.id}">${item.name}</li>`);
                li.on('click', function() {
                    $(listElement).find('.active').removeClass('active');
                    $(this).toggleClass('active');
                });
                $(listElement).append(li);
            });
        };

        $('#facultySelect').on('change', function() {
            const facultyId = $(this).val();

            $('#departmentSelect').empty().append('<option value="" disabled selected>Kafedrani tanlang</option>').prop('disabled', true);
            $('#studentList').empty().append('<li class="list-group-item disabled">Talabalar yuklanmoqda...</li>');

            if (facultyId) {
                $.ajax({
                    url: `/employee/dean/department-list/${facultyId}`,
                    type: 'GET',
                    success: function(response) {
                        const departments = response.data;
                        if (departments.length > 0) {
                            departments.forEach(department => {
                                $('#departmentSelect').append(`<option value="${department.id}">${department.name}</option>`);
                            });
                            $('#departmentSelect').prop('disabled', false);
                        } else {
                            showToast('top-end', 'warning', 'Bu fakultetda kafedralar mavjud emas.');
                        }
                    },
                    error: function() {
                        showToast('top-end', 'error', 'Kafedralarni yuklashda xatolik yuz berdi.');
                    }
                });

                $.ajax({
                    url: `/employee/dean/student-list/${facultyId}`,
                    type: 'GET',
                    success: function(response) {
                        const students = response.data;
                        $('#studentList').empty();
                        if (students.length > 0) {
                            populateList('#studentList', students.map(student => ({
                                id: student.id,
                                name: `${student.level} - kurs | ${student.direction.name} ${student.group.name} | ${student.user.name} ${student.user.surname}`
                            })));
                        } else {
                            $('#studentList').append('<li class="list-group-item disabled">Bu fakultetda talabalar mavjud emas.</li>');
                        }
                    },
                    error: function() {
                        showToast('top-end', 'error', 'Talabalarni yuklashda xatolik yuz berdi.');
                    }
                });
            }
        });

        $('#departmentSelect').on('change', function() {
            const departmentId = $(this).val();

            $('#professorList').empty().append('<li class="list-group-item disabled">Professorlarni yuklash...</li>');

            if (departmentId) {
                $.ajax({
                    url: `/employee/dean/employee-list/${departmentId}`,
                    type: 'GET',
                    success: function(response) {
                        const professors = response.data;
                        if (professors.length > 0) {
                            populateList('#professorList', professors.map(prof => ({
                                id: prof.id,
                                name: `${prof.user.name} ${prof.user.surname}`
                            })));
                        } else {
                            $('#professorList').empty().append('<li class="list-group-item disabled">Bu kafedrada professorlar mavjud emas.</li>');
                        }
                    },
                    error: function() {
                        showToast('top-end', 'error', 'Professorlarni yuklashda xatolik yuz berdi.');
                    }
                });
            }
        });

        const assignedPairs = new Set();
        $('#professorList, #studentList').on('click', function() {
            const selectedProfessor = $('#professorList .active');
            const selectedStudent = $('#studentList .active');

            if (selectedProfessor.length && selectedStudent.length) {
                const professorId = selectedProfessor.data('id');
                const studentId = selectedStudent.data('id');
                const pairKey = `${professorId}-${studentId}`;

                if (!assignedPairs.has(pairKey)) {
                    $('#assignedTableBody').append(`
                            <tr class="fade-in">
                                <td data-id="${professorId}">${selectedProfessor.text()}</td>
                                <td data-id="${studentId}">${selectedStudent.text()}</td>
                            </tr>
                        `);
                    assignedPairs.add(pairKey);
                    selectedProfessor.removeClass('active');
                    selectedStudent.removeClass('active');
                } else {
                    showToast('top-end', 'warning', 'Bu talaba allaqachon biriktirilgan!');
                }
            }
        });

        $('#saveChanges').on('click', function() {
            const dataToSend = [];
            $('#assignedTableBody tr').each(function() {
                const professor = $(this).find('td').eq(0);
                const student = $(this).find('td').eq(1);

                dataToSend.push({
                    employee_id: professor.data('id'),
                    student_id: student.data('id'),
                });
            });

            $.ajax({
                url: '/employee/dean/attach-student',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    data: dataToSend,
                    _token: "{{ csrf_token() }}" // Fetch CSRF token dynamically
                }),
                success: function() {
                    showToast('top-end', 'success', 'O’zgarishlar muvaffaqiyatli saqlandi!');
                },
                error: function() {
                    showToast('top-end', 'error', 'O’zgarishlarni saqlashda xatolik yuz berdi.');
                }
            });
        });

        $('#ListofProfessorsandStudents').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                url: uzLocaleFile
            }
        });
    });
</script>
@endsection
