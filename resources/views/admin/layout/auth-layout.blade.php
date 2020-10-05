<!DOCTYPE html>

<html lang="en">

<head>

    @include('admin.layout.partials.head')

</head>

<body>

    @include('admin.layout.partials.navbar')

    @yield('content')

    @include('admin.layout.partials.footer')

    @include('admin.partials.footer-scripts')

</body>

</html>
