@extends('layout.mainlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br><br><br>
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif
                    {{ __('Before proceeding, please check your email for a verification link.') }}<br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-center">{{ __('click here
                            to verify')
                            }}</button>.
                    </form><br>



                </div>
            </div>
            <br><br><br><br><br>
        </div>

    </div>
</div>
@endsection