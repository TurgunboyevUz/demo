@extends('layouts::employee.inspeksiya.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ixtro/DGU/Foydali Model</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Ixtro/DGU/Foydali Model</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Barcha Ixtro/DGU/Foydali Model</h3>
                            <div class="ml-auto d-flex">
                                <button id="zipDownload" class="btn btn-success">
                                    <i class="fas fa-file-archive"></i> ZIP Yuklash
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
                                <table id="inventionsTable" class="table table-bordered table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;"><input type="checkbox" id="checkAll"></th>
                                            <th style="width: 5%;">#</th>
                                            <th style="width: 7%;">Rasmi</th>
                                            <th>Talaba FIO</th>
                                            <th>Intellektual Mulk Nomi</th>
                                            <th>Turi</th>
                                            <th>Raqami</th>
                                            <th>Mualliflar soni</th>
                                            <th>Mualliflar</th>
                                            <th>Nashr Parametrlari</th>
                                            <th>O'quv yili</th>
                                            <th>Fayl nomi</th>
                                            <th>Holati</th>
                                            <th>Harakatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id = 1; @endphp

                                        @foreach ($files as $item)
                                        <tr>
                                            <td><input type="checkbox" class="checkItem"></td>
                                            <td>{{ $id++ }}</td>
                                            <td><img src="{{ asset('storage/' . $item->user->picture_path) }}" alt="User" class="img-circle" style="height: 30px;"></td>
                                            <td>{{ $item->user->fio() }}</td>
                                            <td>{{ $item->invention->title }}</td>
                                            <td>{{ $item->invention->criteria->name }}</td>
                                            <td>{{ $item->invention->property_number }}</td>
                                            <td>{{ $item->invention->authors_count }}</td>
                                            <td>{{ $item->invention->authors }}</td>
                                            <td>{{ $item->invention->publish_params }}</td>
                                            <td>{{ $item->invention->education_year }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><span class="badge badge-{{ $item->status()['color'] }}">{{ $item->status()['name'] }}</span></td>
                                            @if($item->status == 'reviewed')
                                            <td>
                                                <button class="btn btn-sm btn-success confirmAction" data-id="{{ $item->invention->id }}"><i class="fas fa-check"></i></button>
                                                <button class="btn btn-sm btn-danger cancelAction" data-id="{{ $item->invention->id }}"><i class="fas fa-ban"></i></button>
                                            </td>
                                            @else
                                            <td>Bu fayl uchun harakat imkonsiz</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal for cancel reason -->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">Bekor Qilish Izohi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" rows="4" placeholder="Bekor qilish sababini kiriting..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                <button type="button" class="btn btn-primary">Saqlash</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        var e = $("#inventionsTable").DataTable({
                responsive: true
                , autoWidth: false
                , language: {
                    url: "{{ asset('dist/js/uzbek.json') }}"
                }
            }),

            t = $("#checkAll");

        t.click(function() {
                e.find("tr").each(function() {
                    var e = $(this).find("input.checkItem");
                    e.prop("checked", t.prop("checked"))
                })
            }),

            $("#zipDownload").click(function() {
                var e = $(".checkItem:checked").length;
                if (e > 0) alert("Fayl yuklanish boshlandi"), console.log("ZIP yuklash boshlandi");
                else alert("Siz biror talaba tanlamagansiz")
            })
    });

    $(document).ready(function() {
        $(".confirmAction").click(function(e) {
            e.preventDefault();

            var itemId = $(this).data('id');

            if (confirm("Tasdiqlamoqchimisiz?")) {
                $.ajax({
                    url: '{{ route("employee.inspeksiya.invention.approve") }}', // Replace with your actual route
                    method: 'POST'
                    , data: {
                        _token: '{{ csrf_token() }}'
                        , id: itemId
                    }
                    , success: function(response) {
                        alert(response.message);
                    }
                    , error: function(xhr) {
                        alert('Xatolik yuz berdi: ' + xhr.responseText);
                    }
                });
            }
        });
    });

    $(function() {
        let cancelItemId = null;

        $(".cancelAction").click(function() {
            cancelItemId = $(this).data("id"); // Get the item_id from the button's data-id attribute
            $("#cancelModal").modal("show"); // Show the modal
        });

        $("#cancelModal .btn-primary").click(function() {
            const reason = $("#cancelModal textarea").val(); // Get the reason from the modal

            if (!reason) {
                alert("Bekor qilish sababini kiriting!"); // Show an alert if no reason is provided
                return;
            }

            $.ajax({
                url: "{{ route('employee.teacher.invention.reject') }}", // Replace with your actual endpoint
                type: "POST"
                , data: {
                    id: cancelItemId
                    , reason: reason
                    , _token: '{{ csrf_token() }}' // Add CSRF token for Laravel
                },

                success: function(response) {
                    alert("Bekor qilish muvaffaqiyatli amalga oshirildi!"); // Show success message
                    $("#cancelModal").modal("hide"); // Hide the modal
                },

                error: function(xhr) {
                    alert("Bekor qilishda xatolik yuz berdi."); // Show error message
                }
            });
        });
    });

</script>
@endsection
