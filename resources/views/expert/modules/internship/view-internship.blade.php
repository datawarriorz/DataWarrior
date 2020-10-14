@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/expert/expert-9-2-view-internship.css') }}">
<div class="col-12">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-0 no-gutters pl-4 pr-4">
            <div class="col-md-12">
                <div class="card dashboard-card ml-0 mr-0 mb-0 mb-sm-0 mb-md-0 mb-lg-4">
                    <div class="card-header">
                        <div class="col-12 pl-0 pr-0">
                            <div class="row">
                                <div class="col-6 text-left">
                                    <div style="margin-bottom: 0px"><i class="fas fa-columns"></i> Job Details
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="tab-edit-btn" href="/expert-view-jobs-posted">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body dashboard-card-body">
                        <div class="text-center">
                            <div class="job-details-header">
                                <div class="data-job-title">
                                    <h3><b>{{ $jobobj->job_title }}</b></h3>
                                </div>
                            </div>
                            <div class="card-body job-details-data">
                                <div class="col-12 pl-0 pr-0">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-4 pl-0 pr-0 text-center">
                                            <div class="data-job-designation">
                                                <b>Designation</b>
                                                <br>
                                                {{ $jobobj->job_designation }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4 pl-0 pr-0 text-center">
                                            <div class="data-job-company">
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
                                                    Link
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-12 pl-0 pr-0 text-center">
                                    <div class="row">
                                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                            <b>Apply By</b>
                                            <br>
                                            <?php echo date_format($jobobj->created_at,"d M' Y");?>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                            <b>Salary</b>
                                            <br>
                                            <div class="">{{ $jobobj->job_salary }} /-</div>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                            <b>Location</b>
                                            <br>
                                            <div class="">{{ ucwords( $jobobj->job_location) }}</div>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                            <b>Duration</b>
                                            <br>
                                            <div class="">{{ $jobobj->job_duration }}</div>
                                        </div>
                                    </div>
                                    <br>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-title data-job-description-header">
                        <b>Job Participants</b>
                        <br>
                        <br>
                        <div class="container" style="overflow-x: scroll">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="min-width: 70px;">Sr. No</th>
                                        <th scope="col" style="min-width: 242px;">Particiant Name</th>
                                        <th scope="col" style="min-width: 199px;">Contact No</th>
                                        <th scope="col" style="min-width: 157px;">Email Id</th>
                                        <th scope="col" style="min-width: 157px;">Applied on</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach($users as $user)
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?>
                                            </td>
                                            <td>
                                                {{ $user->first_name }}
                                                {{ $user->last_name }}
                                            </td>
                                            <td>
                                                {{ $user->contact_no }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                <?php echo date_format($jobobj->created_at,"d M' Y");?>
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
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 offset-lg-0 no-gutters pl-lg-0 pl-4 pr-4">
            <div class="col-md-12">
                <div class="card trending-card right-card ml-0 mr-0 mb-4 mb-sm-4 mb-md-4 mb-sm-0">
                    <div class="card-header">
                        <i class="fas fa-hashtag"></i> Last Job Posted
                    </div>
                    <div class="card-body">
                        no jobs posted
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
