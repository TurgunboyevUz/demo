@extends('layouts::teacher.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Yuklangan Maqolalar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Yuklangan Maqolalar</li>
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
                            <h3 class="card-title">Barcha Biriktirilgan Talabalar Maqolalari</h3>
                            <div class="ml-auto d-flex">
                                <button id="zipDownload" class="btn btn-success">
                                    <i class="fas fa-file-archive"></i> ZIP Yuklash
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-width: 105%; overflow-x: auto;">
                                <table id="articlesTable" class="table table-bordered table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;"><input type="checkbox" id="checkAll"></th>
                                            <th style="width: 5%;">#</th>
                                            <th>Rasmi</th>
                                            <th>Talaba Ism, Familiyasi</th>
                                            <th>Ilmiy Ish Nomi</th>
                                            <th>Kalit So'zlar</th>
                                            <th>Til</th>
                                            <th>Mualliflar</th>
                                            <th>DOI</th>
                                            <th>Manba (Jurnal) Nomi</th>
                                            <th>Xalqaro Ilmiy Bazalar</th>
                                            <th>Nashr Yili</th>
                                            <th>Nashr Parametrlari</th>
                                            <th>O'quv Yili</th>
                                            <th>Fayl Nomi</th>
                                            <th>Harakatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id = 1; @endphp

                                        @foreach($files as $item)
                                        <tr>
                                            <td><input type="checkbox" class="checkItem"></td>
                                            <td>{{ $id++ }}</td>
                                            <td><img src="{{ asset('storage/' . $item->user->picture_path) }}" alt="User" class="img-circle" style="height: 30px;"></td>
                                            <td>{{ $item->user->fio() }}</td>
                                            <td>{{ $item->article->title }}</td>
                                            <td>{{ $item->article->keywords }}</td>
                                            <td>{{ $item->article->lang() }}</td>
                                            <td>{{ $item->article->authors }}</td>
                                            <td>{{ $item->article->doi }}</td>
                                            <td>{{ $item->article->journal_name }}</td>
                                            <td>{{ $item->article->international_databases }}</td>
                                            <td>{{ $item->article->published_year }}</td>
                                            <td>{{ $item->article->publish_params }}</td>
                                            <td>{{ $item->article->education_year }}</td>
                                            <td>{{ $item->name }}</td>
                                            @if($item->status == 'pending')
                                            <td>
                                                <button class="btn btn-sm btn-success confirmAction" data-id="{{ $item->article->id }}"><i class="fas fa-check"></i></button>
                                                <button class="btn btn-sm btn-danger cancelAction" data-id="{{ $item->article->id }}"><i class="fas fa-ban"></i></button>
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
        var e = $("#articlesTable").DataTable({
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
                    url: '{{ route("employee.teacher.article.review") }}', // Replace with your actual route
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
                url: "{{ route('employee.teacher.article.reject') }}", // Replace with your actual endpoint
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
