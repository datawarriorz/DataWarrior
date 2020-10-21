@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/user/user-6-2-job-details.css" />
<div class="ji-job-container card col-12 col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 text-center no-pad">
    <div class="card-body dashboard-card-body pb-0">
        <div class="text-center">
            <div class="job-details-header">
                <div class="data-job-title">
                    <h3><b>{{ $jobobj->job_title }}</b></h3>
                </div>
            </div>
            <div class="card-body job-details-data pb-0">
                <div class="col-12 pl-0 pr-0">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4 pl-0 pr-0 text-center">
                            <div class="">
                                <b>Designation</b>
                                <br>
                                {{ $jobobj->job_designation }}
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 pl-0 pr-0 text-center">
                            <div class="">
                                <b>Company</b>
                                <br>
                                {{ $jobobj->job_company }}
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 pl-0 pr-0 text-center">
                            <div class="card-text data-job-website-data">
                                <b>Website</b>
                                <br>
                                <a href="{{ $jobobj->job_companywebsite }}" style="color: #171f2a;">
                                    Click here
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body job-details-data text-center">
        <div class="col-12 no-gutters no-padding">
            <div class="row no-gutters"
                style="border-bottom: 1px solid #c8c8c8;border-top: 1px solid #c8c8c8;padding-bottom: 8px;padding-top: 8px;">
                <div class="col-12 col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="data-job-bold-header">Apply By</div>
                            <div class=""><?php echo date_format($jobobj->job_apply_by,"d M' Y");?> </div>
                        </div>
                        <div class="col-6">
                            <div class="data-job-bold-header">Salary</div>
                            <div class="">₹ {{ $jobobj->job_salary }}/-</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="data-job-bold-header">Location</div>
                            <div class="">{{ ucwords( $jobobj->job_location) }}</div>
                        </div>
                        <div class="col-6">
                            <div class="data-job-bold-header">Duration</div>
                            <div class="">{{ $jobobj->job_duration }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card-title data-job-description-header">
                <b>Job Description</b>
            </div>
            <div class="text-left">
                <div class="card-text data-job-description-data">
                    <?php echo nl2br($jobobj->job_description); ?>
                </div>
            </div>
            <br>

            @if($jobappobj==0)
                <div class="col-12 text-center">
                    <form method="POST" action="/jobapply">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $jobobj->job_id }}">
                        <button type="submit" class="btn tab-edit-btn">Apply</button>
                    </form>
                </div>
            @else
                <div class="col-12 text-center" style="color:#25ac25;padding: .375rem .75rem;">
                    Applied <i class="fas fa-check-square"></i>
                </div>
            @endif
            <br>
            <div class="col-12 text-center">
                <form method="post" action="/jobfilterapply">
                    @csrf
                    <input type="hidden" name="job_type_id" value="1">
                    <button class="btn tab-edit-btn" type="submit"><i class="fas fa-arrow-left"></i>Back</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
