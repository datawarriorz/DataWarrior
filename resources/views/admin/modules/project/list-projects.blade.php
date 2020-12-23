@extends('admin.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/admin-7-1-list-projects.css') }}">
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
                                <div class="col-6 text-center">
                                    Your Projects
                                </div>
                                <div class="col-4 text-right">
                                    <a class="tab-edit-btn" href="/admindashboard">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body dashboard-card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link profilenav active" id="articles-tab" data-toggle="tab"
                                            href="#articles" role="tab" aria-controls="articles" aria-selected="true">
                                            <h5>Live</h5>
                                        </a>
                                    </li>
                                </ul>
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
                                                        <th scope="col" style="min-width: 196px;">Project Name</th>
                                                        <th scope="col" style="min-width: 100px;">Price</th>
                                                        <th scope="col" style="min-width: 180px;">Domain</th>
                                                        <th scope="col" style="min-width: 170px;" class="text-left">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach($projects as $projects_obj)
                                                        <?php $i++; ?>
                                                        <tr>
                                                            <td><?php echo $i; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo substr(nl2br($projects_obj->project_name),0,100); ?>...
                                                            </td>
                                                            <td>
                                                                {{ $projects_obj->project_price }}
                                                            </td>
                                                            <td>
                                                                <?php echo ucwords($projects_obj->project_domain);?>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="row" class="text-center">
                                                                    <form method="post" action="/admin-view-project">
                                                                        @csrf
                                                                        <input type="hidden" name="project_id"
                                                                            value="{{ $projects_obj->project_id }}" />
                                                                        <button type="submit" class="btn tab-edit-btn"
                                                                            style="margin-left:4px">
                                                                            <i class="far fa-eye"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form method="post"
                                                                        action="/admin-edit-project-form">
                                                                        @csrf
                                                                        <input type="hidden" name="project_id"
                                                                            value="{{ $projects_obj->project_id }}" />
                                                                        <button type="submit" class="btn tab-edit-btn"
                                                                            style="margin-left:4px">
                                                                            <i class="fas fa-edit"></i></i>
                                                                        </button>
                                                                    </form>
                                                                    <form method="post" action="/admin-delete-project">
                                                                        @csrf
                                                                        <input type="hidden" name="project_id"
                                                                            value="{{ $projects_obj->project_id }}" />
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
    </div>
</div>
@endsection
