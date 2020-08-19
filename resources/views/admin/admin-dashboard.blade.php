@extends('layout.adminlayout')

@section('content')
    <div class="content-wrapper" id="mycontent-wrapper">
        <div class="col-md-12" style="position: inherit;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            <div style="margin-bottom: 0px">
                                <i class="fas fa-columns open-icon" id="myopen-icon" onclick="openNav()"></i>
                                <i class="fas fa-columns close-icon" id="myclose-icon" onclick="closeNav()"></i>
                                <i class="fas fa-columns m-open-icon" id="m-myopen-icon" onclick="mopenNav()"></i>
                                Dashboard</div>
                        </div>
                        <div class="card-body dashboard-card-body">

                        </div>
                    </div>
                    {{-- <div class="col-md-3">
                        <div class="col-md-12">
                            <div class="card notification-card right-card">
                                <div class="card-header">
                                    <i class="far fa-bell"></i> Notifications
                                </div>
                                <div class="card-body">
                                    empty
                                </div>
                            </div>
                            <div class="card trending-card right-card">
                                <div class="card-header">
                                    <i class="fas fa-hashtag"></i> Trending Articles
                                </div>
                                <div class="card-body">
                                    no articles
                                </div>
                            </div>
                            <div class="card views-card right-card">
                                <div class="card-header">
                                    <i class="far fa-eye"></i> Total Views
                                </div>
                                <div class="card-body">
                                    no views
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
