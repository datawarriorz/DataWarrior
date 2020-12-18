<script type="text/javascript" src="{{ asset('js/user/user.js') }}">
</script>
{{-- <script type="text/javascript" src="{{ asset('js/fontawesome-5.14.0.js') }}">
</script>
<script type="text/javascript" src="{{ asset('js/popper-1.16.1.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('js/bootstrap-4.5.2.min.js') }}">
</script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://kit.fontawesome.com/01bd91f070.js" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@if(Session::get('newuser')=="yes")
    <script>
        swal("Thank You for joining us! ", "Our Counsellor will get in touch with you in 24 hrs.", "success");

    </script>
    {{ Session::forget('newuser') }}
@endif
