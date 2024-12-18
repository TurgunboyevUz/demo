<!DOCTYPE html>
<html lang="uz">

@include('layouts::employee.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Loader -->
        <div class="loader-wrapper">
            <div class="loader"></div>
        </div>

        @include('layouts::employee.inspeksiya.navbar')
        @include('layouts::employee.inspeksiya.sidebar')

        @yield('content')

        @include('layouts::employee.footer')

        @include('layouts::employee.scripts')

    </div>

    @yield('scripts')
</body>
</html>
