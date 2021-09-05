<!DOCTYPE html>
<html lang="en">

@include('layouts.partials._head')

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        @include('layouts.partials._navbar')
        @include('layouts.partials._sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="app">
            @include('flash::message')
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        @include('layouts.partials._footer')
    </div>
    <!-- ./wrapper -->

    @include('layouts.partials._footer-script')

</body>
</html>
