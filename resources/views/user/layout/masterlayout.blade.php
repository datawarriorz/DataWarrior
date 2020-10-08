<!DOCTYPE html>

<html lang="en">

<head>

    @include('user.layout.partials.head')

    <script>
        window.onload = function () {
            //display loader on page load 
            $('.loader').fadeOut('medium');
        }

    </script>
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
            text-align: center;
        }

        .loader img {
            position: relative;

            top: 40%
        }

    </style>
</head>

<body>


    <div class="loader"><img src="{{ asset('./images/loading.gif') }}">

    </div>

    @include('user.layout.partials.navbar')

    @yield('content')

    @include('user.layout.partials.footer')

    @include('user.layout.partials.footer-scripts')

</body>

</html>
