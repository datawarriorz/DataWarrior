@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-10-1-list-projects.css') }}" />

<div class="col-12 col-sm-12 col-md-10 offset-md-1" style="background-color: white;">
    <div class="col-12">
        <br>
        <h3 class="text-xl lg:text-3xl leading-tight text-gray-800 font-bold mt-2 text-center">
            Projects in <br class="d-block d-lg-none"> <?php echo ucwords($projectdomain[0]->project_domain)?>
        </h3>
        <br>
        <div class="alert alert-light text-center" role="alert">
            <i class="fas fa-exclamation-circle"></i> These are the projects which we have carried out earlier. Our experts can train you on these projects as well as share the documentation necessary for the project report
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($projectsobj as $proj)
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="project-cards card mb-3">
                        <div class="card-header">
                            <h5 class="card-title">
                                <?php echo substr(nl2br($proj->project_name),0,50); ?>
                            </h5>
                        </div>
                        <div class="card-body text-primary">
                            <p class="card-text">
                                <?php echo substr(nl2br($proj->project_description),0,150); ?>...
                            </p>
                            <div class="col-12 p-0">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="card-text">
                                            <a class="project-view-btn btn btn-primary"
                                                href="{{ url('/showprojectdetails/'.$proj->project_id) }}">
                                                View Details
                                            </a>
                                        </p>
                                    </div>
                                    <div class="col-6 text-right" style="color:#25ac25;padding: .375rem 1.75rem;">
                                        <?php $i=true; ?>
                                        @foreach($projectsreqobj as $pr)
                                            @if($pr->project_id==$proj->project_id)
                                                Requested <i class="fas fa-check-square"></i>
                                                <?php $i=false; ?>
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br>
</div>
@endsection
