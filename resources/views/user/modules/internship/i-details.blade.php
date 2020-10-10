@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/user/user-7-2-internship-details.css" />
<div class="ji-job-container card col-12 col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 text-center no-pad">
    <div class="job-details-header">
        <div class="data-job-title">
            {{ $jobobj->job_title }}
        </div>
    </div>
    <div class="card-body job-details-data text-left">
        <div class="col-12">
            <div class="row">
                <div class="col-8 col-sm-8 col-md-6 pl-0 pr-0 text-center">
                    <div class="data-job-designation">
                        {{ $jobobj->job_designation }}
                    </div>
                    <div class="data-job-company">
                        {{ $jobobj->job_company }}
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-md-6 pl-0 pr-0 text-center">
                    <div class="card-text data-job-description-data">
                        <a href="{{ $jobobj->job_companywebsite }}" style="color: #171f2a;">
                            <i class="fas fa-globe"></i>
                            <br>
                            Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="col-12 no-gutters no-padding">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                    <table>
                        <tr>
                            <td>
                                <div class="data-job-bold-header">Apply By</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class=""> {{ substr($jobobj->job_apply_by ,0,9) }}</div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                    <table>
                        <tr>
                            <td>
                                <div class="data-job-bold-header">Salary</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="">{{ $jobobj->job_salary }}</div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                    <table>
                        <tr>
                            <td>
                                <div class="data-job-bold-header">Location</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="">{{ ucwords( $jobobj->job_location) }}</div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                    <table>
                        <tr>
                            <td>
                                <div class="data-job-bold-header">Duration</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="">{{ $jobobj->job_duration }}</div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="card-title data-job-description-header">
                <b>Job Description</b>
            </div>
            <div class="card-text data-job-description-data">
                <?php echo nl2br($jobobj->job_description); ?>
            </div>
            <br>
            @if($jobappobj==0)
                <div class="col-12 text-center">
                    <form method="POST" action="/internshipapply">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $jobobj->job_id }}">
                        <button type="submit" class="btn tab-edit-btn">Apply</button>
                    </form>
                </div>
            @else
                <div class="col-12 text-center">
                    <button class="btn disabled">Applied</button>
                </div>
            @endif
            <br>
            <div class="col-12 text-center">
                <form method="post" action="/jobfilterapply">
                    @csrf
                    <input type="hidden" name="job_type_id" value="2">
                    <button class="btn tab-edit-btn" type="submit"><i class="fas fa-arrow-left"></i>Back</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
