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
                                Expert Form
                            </div>
                            <div class="col-2 text-left">
                            </div>
                        </div>
                    </div>
                    <div class="card-body dashboard-card-body">
                        <br>
                        <form method="POST" action="/admin-create-expert" enctype="multipart/form-data">
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
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>First Name :</label>
                                            <input type="text" name="ex_firstname" class="form-control"
                                                placeholder="Eg. " autocomplete="on"
                                                value={{ old('ex_firstname') }}>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name :</label>
                                            <input type="text" name="ex_lastname" class="form-control"
                                                placeholder="Eg. " autocomplete="on"
                                                value={{ old('ex_lastname') }}>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Image :</label>
                                            <div class="upload-btn-wrapper">
                                                <textarea id="uploadFile" class="disableInputField"
                                                    placeholder="Choose File" disabled="disabled" rows="2"
                                                    autocomplete="off">
                                                </textarea>
                                                <label class="fileUpload form-control">
                                                    <input id="uploadBtn" enctype="multipart/form-data" type="file"
                                                        name="ex_image" class="upload" />
                                                    <span class="uploadBtn">Upload / Browse File ..</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
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
                                    <label for="mobileno">Contact Code :</label>
                                    <input type="text" class="form-control" name="ex_contactcode"
                                        placeholder="555-555-5555" id="ex_contactcode"
                                        value={{ old('ex_contactcode') }}>
                                </div>
                                <div class="form-group">
                                    <label for="mobileno">Contact No. :</label>
                                    <input type="text" class="form-control" name="ex_contactno"
                                        placeholder="555-555-5555" id="ex_contactno"
                                        value={{ old('ex_contactno') }}>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" name="ex_dateofbirth"
                                        value={{ old('ex_dateofbirth') }} id="dateofbirth">
                                </div>
                                <div class="form-group">
                                    <label>About me :</label>
                                    <textarea name="ex_aboutme" class="form-control" id="ex_aboutme" placeholder="Eg. "
                                        autocomplete="on" rows="2"
                                        value={{ old('ex_aboutme') }}></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Description :</label>
                                    <textarea name="ex_description" class="form-control" id="ex_description"
                                        placeholder="Eg. " autocomplete="on" rows="4"
                                        value={{ old('ex_description') }}></textarea>
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <button type="submit" class="btn tab-edit-btn">
                                        Register Expert
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
