$(document).ready(function () {
    function showToast(position, icon, toast_message) {
        Swal.fire({
            toast: true,
            position: position,
            icon: icon,
            title: toast_message,
            background: "#f5f6f7",
            timerProgressBar: true,
            showCloseButton: true,
            showConfirmButton: false,
            timer: 4000
        });
    }

    const populateList = (listElement, items) => {
        $(listElement).empty();
        items.forEach(item => {
            const li = $(`<li class="list-group-item" data-id="${item.id}">${item.name}</li>`);
            li.on('click', function () {
                $(listElement).find('.active').removeClass('active');
                $(this).toggleClass('active');
            });
            $(listElement).append(li);
        });
    };

    $('#facultySelect').on('change', function () {
        const facultyId = $(this).val();

        $('#departmentSelect').empty().append('<option value="" disabled selected>Kafedrani tanlang</option>').prop('disabled', true);
        $('#studentList').empty().append('<li class="list-group-item disabled">Talabalar yuklanmoqda...</li>');

        if (facultyId) {
            $.ajax({
                url: `/employee/dean/department-list/${facultyId}`,
                type: 'GET',
                success: function (response) {
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
                error: function () {
                    showToast('top-end', 'error', 'Kafedralarni yuklashda xatolik yuz berdi.');
                }
            });

            $.ajax({
                url: `/employee/dean/student-list/${facultyId}`,
                type: 'GET',
                success: function (response) {
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
                error: function () {
                    showToast('top-end', 'error', 'Talabalarni yuklashda xatolik yuz berdi.');
                }
            });
        }
    });

    $('#departmentSelect').on('change', function () {
        const departmentId = $(this).val();

        $('#professorList').empty().append('<li class="list-group-item disabled">Professorlarni yuklash...</li>');

        if (departmentId) {
            $.ajax({
                url: `/employee/dean/employee-list/${departmentId}`,
                type: 'GET',
                success: function (response) {
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
                error: function () {
                    showToast('top-end', 'error', 'Professorlarni yuklashda xatolik yuz berdi.');
                }
            });
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

    $('#saveChanges').on('click', function () {
        const dataToSend = [];
        $('#assignedTableBody tr').each(function () {
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
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }),
            success: function () {
                showToast('top-end', 'success', 'O’zgarishlar muvaffaqiyatli saqlandi!');
            },
            error: function () {
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