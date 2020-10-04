<!DOCTYPE html>

<html lang="en">

<head>

    @include('layout.partials.head')

</head>

<body>

    @include('layout.partials.nav-admin')

    @yield('content')

    @include('layout.partials.footer')

    @include('layout.partials.admin-scripts')

</body>

</html>