@extends('admin.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/admin-7-2-view-project.css') }}">
<div class="content-wrapper" id="mycontent-wrapper">
    <div class="col-md-12" style="position: inherit;">
        <div class="row">
            <div class="col-md-12">
                <div class="card dashboard-card">
                    <div class="card-header">
                        <div class="col-12 pl-0 pr-0">
                            <div class="row">
                                <div class="col-2 text-left">
                                    <div style="margin-bottom: 0px">
                                        <i class="fas fa-arrow-right open-icon" id="myopen-icon"
                                            onclick="openNav()"></i>
                                        <i class="fas fa-arrow-left close-icon" id="myclose-icon"
                                            onclick="closeNav()"></i>
                                        <i class="fas fa-arrow-right m-open-icon" id="m-myopen-icon"
                                            onclick="mopenNav()"></i>
                                    </div>
                                </div>
                                <div class="col-8 text-center">
                                    <strong>Project #{{ $project->project_id }}</strong>
                                </div>
                                <div class="col-2 text-left">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body dashboard-card-body">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <div class="jumbotron" style="padding: 1rem 1rem;">
                                    <div class="col-md-10 offset-md-1 text-left">
                                        <div class="row">
                                            <div class="col-md-4 text-left">
                                                @if($project->project_image == null)
                                                    <img src="{{ asset('images/project_alt.jpg') }}"
                                                        style="height:166px;width:100%;border-radius:10px;" />
                                                @else
                                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($project->project_image); ?>"
                                                        style="height:166px;width:100%;border-radius:10px;" />
                                                @endif
                                            </div>
                                            <div class="col-md-8 ">
                                                <h3 class="card-text">
                                                    {{ $project->project_name }}
                                                </h3>
                                                <br>
                                                <p class="card-text data">
                                                    <strong class="heading">Price :</strong>
                                                    {{ $project->project_price }} /-
                                                </p>
                                                <p class="card-text data">
                                                    <strong class="heading">Domain :</strong>
                                                    <?php echo ucwords($project->project_domain);?>.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-10 offset-md-1 text-left">
                                        <strong>Description :</strong>
                                        <p class="data"><?php echo nl2br($project->project_description); ?></p>
                                    </div>
                                    <br>
                                    <div class="col-md-12 text-center">
                                        <a class="btn tab-edit-btn" href="/admin-manage-projects">Back</a>
                                    </div>
                                    {{-- <div class="col-md-12 text-center">
@if($project->status == 'review')
                                            <form method="POST" action="/admin-publish-article">
@csrf
                                                <input type="hidden" name="article_id"
                                                    value="{{ $project->article_id }}" />
                                    <button type="submit" class="btn tab-edit-btn">
                                        Publish <i class="far fa-eye"></i>
                                    </button>
                                    </form>
                                    @endif
                                    @if($project->status == 'published')
                                        <form method="POST" action="/admin-takedown-article">
                                            @csrf
                                            <input type="hidden" name="article_id"
                                                value="{{ $project->article_id }}" />
                                            <button type=" submit" class="btn tab-edit-btn">
                                                Take Down <i class="far fa-eye"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
