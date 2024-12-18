@extends('layouts::employee.teacher.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Grand/Xo'jalik Shartnomalari</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Grand/Xo'jalik Shartnomalari</li>
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
                            <h3 class="card-title">Barcha Grand/Xo'jalik Shartnomalari</h3>
                            <div class="ml-auto d-flex">
                                <button id="zipDownload" class="btn btn-success">
                                    <i class="fas fa-file-archive"></i> ZIP Yuklash
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
                                <table id="contractsTable" class="table table-bordered table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;"><input type="checkbox" id="checkAll"></th>
                                            <th style="width: 5%;">#</th>
                                            <th style="width: 7%;">Rasmi</th>
                                            <th>Talaba FIO</th>
                                            <th>Shartnoma Turi</th>
                                            <th>Grant/Loyiha Nomi</th>
                                            <th>Buyruq Raqami</th>
                                            <th>Mablag' Miqdori</th>
                                            <th>Fayl Nomi</th>
                                            <th>Holati</th>
                                            <th>Harakatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id = 1; @endphp
                                        @foreach($files as $item)
                                        <tr>
                                            <td><input type="checkbox" class="checkItem"></td>
                                            <td>{{ $id++ }}</td>
                                            <td><img src="{{ asset('storage/' . $item->user->picture_path)}}" alt="User" class="img-circle" style="height: 30px;"></td>
                                            <td>{{ $item->user->fio() }}</td>
                                            <td>{{ $item->grand_economy->criteria->name }}</td>
                                            <td>{{ $item->grand_economy->title }}</td>
                                            <td>{{ $item->grand_economy->order_number }}</td>
                                            <td>{{ $item->grand_economy->amount }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><span class="badge badge-{{ $item->status()['color'] }}">{{ $item->status()['name'] }}</span></td>
                                            @if($item->status == 'pending')
                                            <td>
                                                <button class="btn btn-sm btn-success confirmAction" data-id="{{ $item->grand_economy->id }}"><i class="fas fa-check"></i></button>
                                                <button class="btn btn-sm btn-danger cancelAction" data-id="{{ $item->grand_economy->id }}"><i class="fas fa-ban"></i></button>
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
        var e = $("#contractsTable").DataTable({
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
                    url: '{{ route("employee.teacher.grand-economy.review") }}', // Replace with your actual route
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
                url: "{{ route('employee.teacher.grand-economy.reject') }}", // Replace with your actual endpoint
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
