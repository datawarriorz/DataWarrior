@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-10-1-list-projects.css') }}" />

<div class="col-12 col-sm-12 col-md-10 offset-md-1" style="background-color: white;">
    <div class="col-12">
        <br>
        <h3 class="text-xl lg:text-3xl leading-tight text-gray-800 font-bold mt-2 text-center">
            Projects in <br class="d-block d-lg-none"> <?php echo ucwords("programming")?>
        </h3>
        <br>
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
                            <div class="text-right">
                                <p class="card-text">
                                    <a class="project-view-btn btn btn-primary" href="">
                                        View Details
                                    </a>
                                </p>
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
