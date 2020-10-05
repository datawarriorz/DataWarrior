@extends('admin.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/admin-4-1-post-article.css') }}" />
<div class="content-wrapper" id="mycontent-wrapper">
    <div class="col-md-12" style="position: inherit;">
        <div class="row">
            <div class="col-md-12">
                <div class="card dashboard-card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-2 text-left">
                                <div style="margin-bottom: 0px">
                                    <i class="fas fa-arrow-right open-icon" id="myopen-icon" onclick="openNav()"></i>
                                    <i class="fas fa-arrow-left close-icon" id="myclose-icon" onclick="closeNav()"></i>
                                    <i class="fas fa-arrow-right m-open-icon" id="m-myopen-icon"
                                        onclick="mopenNav()"></i>
                                </div>
                            </div>
                            <div class="col-8 text-center">
                                Counselor Form
                            </div>
                            <div class="col-2 text-left">
                            </div>
                        </div>
                    </div>
                    <div class="card-body dashboard-card-body">
                        <br>
                        <form method="POST" action="/admin-create-counselorform">
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
                            <div class="col-md-12" style="padding: 0px;">
                                <div class="form-group">
                                    <label>First Name :</label>
                                    <input type="text" name="co_firstname" class="form-control" placeholder="Eg. "
                                        autocomplete="on" value={{ old('co_firstname') }}>
                                </div>
                                <div class="form-group">
                                    <label>Last Name :</label>
                                    <input type="text" name="co_lastname" class="form-control" placeholder="Eg. "
                                        autocomplete="on" value={{ old('co_lastname') }}>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address :</label>
                                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                                        placeholder="Ex. example@datawarriors.co.in" id="email"
                                        value={{ old('email') }}>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password :</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Referral Code :</label>
                                    <input type="text" name="referral_code" class="form-control"
                                        value={{ old('referral_code') }}>
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <button type="submit" class="btn tab-edit-btn">
                                        Register Counselor
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
