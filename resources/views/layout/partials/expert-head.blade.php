<title>Data Warriors</title>
<meta charset="utf-8" />
<link rel="icon" href="./images/justlogo2.png" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<link rel="stylesheet" href="{{ asset('css/master.css') }}" />

<!-- bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- bootstrap end -->

{{-- <script type="text/javascript" src="{{ asset('js/expert.js') }}">
</script> --}}
<script>
    document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("filename").value = this.value;
    };

</script>