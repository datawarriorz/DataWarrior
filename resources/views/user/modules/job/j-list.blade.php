@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/user/ji-list.css" />
<div class="ji-list-content col-12 col-sm-12 col-md-12 col-lg-12 text-center no-pad no-gutters">
    <br>
    <div class="ji-list-header">
        <div class="row no-gutters">
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 offset-lg-4">
                <h4><?php $i=0; ?>
                    @foreach($jobsobj as $jo)
                        <?php $i++; ?>
                    @endforeach<?php echo $i;?> jobs available
                    <i class="fas fa-chevron-down"></i></h4>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 offset-lg-4 ji-list-m-filter">
                <h4><small>Filters</small></h4>
            </div>
        </div>
    </div>
    <br>
    <div class="ji-list-body col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="ji-list-content">
            <div class="row no-gutters">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 offset-lg-1 ji-list-filter">
                    <br>
                    <div class="card">
                        <p></p>
                        <h5><small><b>FILTERS</b><i class="fas fa-filter"></i></small></h5>
                        <div class="card-body text-left">
                            <form method="POST" action="/jobfilterapply">
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
                                    <label>Domain</label>
                                    <input type="text" name="job_domain" class="form-control"
                                        placeholder="e.g Data Science" autocomplete="on" value="">
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="job_location" class="form-control"
                                        placeholder="e.g. Mumbai " autocomplete="on" value="">
                                </div>
                                <div class="form-group">
                                    <label>Job Duration</label>
                                    <input type="text" name="job_shift" class="form-control"
                                        placeholder="e.g. Full Time " autocomplete="on" value="">
                                </div>
                                <input type="hidden" name="job_type_id" value="1">
                                <div class="form-group col-md-12 text-center">
                                    <button type="submit" class="btn tab-edit-btn" style="font-weight: 500">
                                        Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-10 offset-1 col-sm-10 offset-sm-1 col-lg-7">
                    @foreach($jobsobj as $jo)
                        <div class="ji-list-data text-left">
                            <br>
                            <div class="data-job-title col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                {{ $jo->job_title }}
                            </div>
                            <div class="data-job-company col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                {{ $jo->job_company }}
                            </div>
                            <br>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                Salary: ₹{{ $jo->job_salary }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                Start Date: {{ $jo->job_starttime }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                Apply By: {{ $jo->job_apply_by }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
                                <form method="post" action="/viewjobdetails">
                                    @csrf
                                    <input type="hidden" name="job_id" value={{ $jo->job_id }} />
                                    <button type="submit" class="btn btn-primary">
                                        View Details <i class="fas fa-arrow-right"></i>
                                    </button>
                                </form>
                            </div>
                            <br>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection
