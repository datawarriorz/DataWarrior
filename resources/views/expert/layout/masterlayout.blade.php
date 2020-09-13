<!DOCTYPE html>

<html lang="en">

<head>

    @include('expert.layout.partials.head')

</head>

<body>

    @include('expert.layout.partials.navbar')

    @yield('content')

    @include('expert.layout.partials.footer')

    @include('expert.layout.partials.footer-scripts')

</body>

</html>