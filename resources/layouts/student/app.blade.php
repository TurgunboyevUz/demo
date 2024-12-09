<!DOCTYPE html>
<html lang="uz">

@include('layouts::student.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Loader -->
        <div class="loader-wrapper">
            <div class="loader"></div>
        </div>

        @include('layouts::student.navbar')
        @include('layouts::student.sidebar')

        @yield('content')

        @include('layouts::student.footer')

        @include('layouts::student.scripts')

    </div>

    @yield('scripts')

</body>

</html>
