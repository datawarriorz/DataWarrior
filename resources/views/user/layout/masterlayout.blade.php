<!DOCTYPE html>

<html lang="en">

<head>

    @include('user.layout.partials.head')

</head>

<body>

    @include('user.layout.partials.nav')

    @yield('content')

    @include('user.layout.partials.footer')

    @include('user.layout.partials.footer-scripts')

</body>

</html>