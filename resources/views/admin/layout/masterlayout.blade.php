<!DOCTYPE html>

<html lang="en">

<head>

    @include('admin.layout.partials.head')

</head>

<body>

    @include('admin.layout.partials.navbar')

    @include('admin.layout.partials.sidenav')

    @yield('content')

    @include('admin.layout.partials.footer')

    @include('admin.layout.partials.footer-scripts')

</body>

</html>
