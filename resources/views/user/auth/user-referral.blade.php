@extends('user.layout.masterlayout')

@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="col-md-12">
    <div class="col-md-4 offset-md-4">
        <div class="card dashboard-card">
            <div class="card-header text-center">
                <h5>Enter Referral Code</h5>
            </div>
            <div class="card-body dashboard-card-body">
                <div class="col-md-12 text-center">
                    <br>
                    <form method="POST" action="/add-user-referral">
                        @csrf
                        @if(count($errors))
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <br />
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="text" name='referral_code' class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                            <div class="col-md-6 text-center">
                                <a class="btn btn-primary" href="/">Skip</a>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 text-center">
                            <small>Press Skip if you dont have one</small>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
