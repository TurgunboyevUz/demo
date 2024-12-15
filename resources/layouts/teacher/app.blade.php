<!DOCTYPE html>
<html lang="uz">

@include('layouts::teacher.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Loader -->
        <div class="loader-wrapper">
            <div class="loader"></div>
        </div>

        @include('layouts::teacher.navbar')
        @include('layouts::teacher.sidebar')

        @yield('content')

        @include('layouts::teacher.footer')

        @include('layouts::teacher.scripts')

    </div>

    @yield('scripts')
</body>
</html>
