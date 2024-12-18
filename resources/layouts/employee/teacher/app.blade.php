<!DOCTYPE html>
<html lang="uz">

@include('layouts::employee.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Loader -->
        <div class="loader-wrapper">
            <div class="loader"></div>
        </div>

        @include('layouts::employee.teacher.navbar')
        @include('layouts::employee.teacher.sidebar')

        @yield('content')

        @include('layouts::employee.footer')

        @include('layouts::employee.scripts')

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

    @yield('scripts')
</body>
</html>
