@extends('layout.expertlayout')

@section('content')
<link rel="stylesheet" href="./css/expert-listarticles.css">
<link rel="stylesheet" href="./css/expert-master.css">
<div class="dashboard-wrapper">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4 text-left">
                                    Your Articles
                                </div>
                                <div class="col-md-8 text-right">
                                    <a href="/expertdashboard">
                                        <button type="button" class="btn tab-edit-btn">
                                            <i class="fas fa-arrow-left"></i> Go Back
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body dashboard-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link profilenav active" id="articles-tab" data-toggle="tab"
                                                href="#articles" role="tab" aria-controls="articles"
                                                aria-selected="true">
                                                <h5>Live</h5>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link profilenav" id="certification-tab" data-toggle="tab"
                                                href="#certification" role="tab" aria-controls="certification"
                                                aria-selected="false">
                                                <h5>On Review</h5>
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
                                                            <th scope="col" style="min-width: 180px;">Artile Title</th>
                                                            <th scope="col" style="min-width: 280px;">Description</th>
                                                            <th scope="col" class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=0; ?>
                                                        @foreach($articles as $article)
                                                            <?php $i++; ?>
                                                            <tr>
                                                                <td><?php echo $i;?>
                                                                </td>
                                                                <td>
                                                                    {{ $article->title }}
                                                                </td>
                                                                <td>
                                                                    {{ $article->description }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <form method="post" action="/expert-viewarticle">
                                                                        @csrf
                                                                        <input type="hidden" name="article_id"
                                                                            value={{ $article->article_id }} />
                                                                        <button type="submit" class="btn" onclick="">
                                                                            View <i class="far fa-eye"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="certification" role="tabpanel"
                                            aria-labelledby="education-tab">
                                            <br>
                                            <div class="container" style="overflow-x: scroll">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="min-width: 70px;">Sr. No</th>
                                                            <th scope="col" style="min-width: 180px;">Artile Title</th>
                                                            <th scope="col" style="min-width: 280px;">Description</th>
                                                            <th scope="col" class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=0; ?>
                                                        @foreach($articles as $article)
                                                            <?php $i++; ?>
                                                            <tr>
                                                                <td><?php echo $i;?>
                                                                </td>
                                                                <td>
                                                                    {{ $article->title }}
                                                                </td>
                                                                <td>
                                                                    {{ $article->description }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <form method="post" action="/expert-viewarticle">
                                                                        @csrf
                                                                        <input type="hidden" name="article_id"
                                                                            value={{ $article->article_id }} />
                                                                        <button type="submit" class="btn" onclick="">
                                                                            View <i class="far fa-eye"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-12">
                    <div class="card feed-card">
                        <div class="card-header">
                            Feed
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
