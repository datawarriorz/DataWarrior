@extends('expert.layout.masterlayout')

@section('content')

<link rel="stylesheet" href="./css/expert/expert-4-1-3-edit-article.css">
<br>
<div class="contaner col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Certification</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="/expert-edit-certification" enctype="multipart/form-data">
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
                                <label>Title :</label>
                                <input type="text" name="cert_title" class="form-control" placeholder="Eg. "
                                    autocomplete="on" value="{{ $certification->cert_title }}">
                            </div>
                            <div class="form-group">
                                <label>Price :</label>
                                <input type="text" name="cert_price" class="form-control" placeholder="Eg. "
                                    autocomplete="on" value="{{ $certification->cert_price }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Image :</label>
                                <div class="upload-btn-wrapper">
                                    <textarea id="uploadFile" class="disableInputField" placeholder="Choose File"
                                        disabled="disabled" rows="2" autocomplete="off">
                                        </textarea>
                                    <label class="fileUpload form-control">
                                        <input id="uploadBtn" enctype="multipart/form-data" type="file"
                                            name="cert_image" class="upload" />
                                        <span class="uploadBtn">Upload / Browse File ..</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="cert_id" value="{{ $certification->cert_id }}" />
                    </div>
                    <div class="form-group">
                        <label>Summary / Description :</label>
                        <textarea name="cert_description" class="form-control" id="cert_description" autocomplete="on"
                            rows="10"><?php echo utf8_decode($certification->cert_description); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Pre - Requiste :</label>
                        <textarea name="cert_prerequisites" class="form-control" id="cert_prerequisites"
                            autocomplete="on"
                            rows="10"> <?php echo utf8_decode($certification->cert_prerequisites); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Provider :</label>
                        <input type="text" name="cert_provider" class="form-control" placeholder="Eg. "
                            autocomplete="on" value="{{ $certification->cert_provider }}">
                    </div>
                    <div class="form-group">
                        <label>Domain :</label>
                        <input type="text" name="cert_domain" class="form-control" placeholder="Eg. " autocomplete="on"
                            value="{{ $certification->cert_domain }}">
                    </div>
                    <div class="form-group">
                        <label>Validation Period :</label>
                        <input type="text" name="cert_validationperiod" class="form-control" placeholder="Eg. "
                            autocomplete="on" value="{{ $certification->cert_validationperiod }}">
                    </div>

                    <div class="form-group col-md-12 text-center">
                        <br>
                        <button type="submit" class="btn tab-edit-btn" style="font-weight: 600">
                            Update Certification <i class="far fa-eye"></i>
                        </button>
                        <br>
                        <br>
                        <a class="btn tab-edit-btn" href="/expertdashboard">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
