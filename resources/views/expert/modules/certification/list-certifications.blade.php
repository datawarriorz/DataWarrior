@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/expert/expert-7-1-list-certifications.css') }}">

<div class="col-12">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-0 no-gutters pl-4 pr-4">
            <div class="col-md-12">
                <div class="card dashboard-card ml-0 mr-0 mb-0 mb-sm-0 mb-md-0 mb-lg-4">
                    <div class="card-header">
                        <div class="col-12 pl-0 pr-0">
                            <div class="row">
                                <div class="col-8 text-left">
                                    <div style="margin-bottom: 0px"><i class="fas fa-columns"></i> Your Certifications
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <a class="tab-edit-btn" href="/expertdashboard">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body dashboard-card-body">
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="articles" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <br>
                                        <div class="container" style="overflow-x: scroll">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="min-width: 70px;">Sr. No</th>
                                                        <th scope="col" style="min-width: 180px;">Artile Title</th>
                                                        <th scope="col" style="min-width: 280px;">Description</th>
                                                        <th scope="col" style="min-width: 130px;" class="text-left">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach($certifications as $certification)
                                                        <?php $i++; ?>
                                                        <tr>
                                                            <td><?php echo $i; ?>
                                                            </td>
                                                            <td>
                                                                {{ $certification->cert_title }}
                                                            </td>
                                                            <td>
                                                                <?php echo substr(nl2br($certification->cert_description),0,100); ?>...
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="row" class="text-center">
                                                                    <form method="post"
                                                                        action="/expert-viewcertification">
                                                                        @csrf
                                                                        <input type="hidden" name="cert_id"
                                                                            value="{{ $certification->cert_id }}" />
                                                                        <button type="submit" class="btn tab-edit-btn"
                                                                            style="margin-left:4px">
                                                                            <i class="far fa-eye"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form method="post"
                                                                        action="/expert-edit-certificationform">
                                                                        @csrf
                                                                        <input type="hidden" name="cert_id"
                                                                            value="{{ $certification->cert_id }}" />
                                                                        <button type="submit" class="btn tab-edit-btn"
                                                                            style="margin-left:4px">
                                                                            <i class="fas fa-edit"></i></i>
                                                                        </button>
                                                                    </form>
                                                                    <form method="post"
                                                                        action="/expert-deletecertification">
                                                                        @csrf
                                                                        <input type="hidden" name="cert_id"
                                                                            value="{{ $certification->cert_id }}" />
                                                                        <button type="submit" class="btn tab-edit-btn"
                                                                            style="margin-left:4px">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 offset-lg-0 no-gutters pl-lg-0 pl-4 pr-4">
            <div class="col-md-12">
                <div class="card trending-card right-card ml-0 mr-0 mb-4 mb-sm-4 mb-md-4 mb-sm-0">
                    <div class="card-header">
                        <i class="fas fa-hashtag"></i> Latest Certifications
                    </div>
                    <div class="card-body">
                        no certifications posted
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
