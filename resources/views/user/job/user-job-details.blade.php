@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/user/ji-job-details.css" />
<div class="ji-job-container card col-12 col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 text-center no-pad">
    <div class="job-details-header">
        <div class="data-job-title">
            {{ $jobobj->job_title }}
        </div>
    </div>
    <div class="card-body job-details-data text-left">
        <div class="data-job-designation">
            {{ $jobobj->job_designation }}
        </div>
        <div class="data-job-company">
            {{ $jobobj->job_company }}
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
                <p>We're looking for front-end development interns familiar with ReactJS, who are aligned with the
                    companies
                    vision, can create the best user experience possible, share our passion for innovation, and are
                    ready to
                    step out of their comfort zone and always give priority to creativity.</p>
                <p>Selected intern's day-to-day responsibilities include:</p>
                <p>1. Developing, and testing UI for web applications using ReactJS</p>
                <p>2. Building reusable code and libraries for future use</p>
                <p>3. Brainstorming for ideas to improve the design</p>
                <p>4. Building reusable code and libraries for future use</p>
                <p>5. Translating user and business needs into functional front-end </p>
                <p>6. Keeping user experience a top priority</p>

            </div>
            @if($jobappobj==0)
                <div class="col-12 text-center">
                    <form method="POST" action="/jobapply">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $jobobj->job_id }}">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </div>
            @else
                <div class="col-12 text-center">
                    <button class="btn disabled">Applied</button>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
