@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/expert/expert-4-1-1-list-articles.css">
<div class="col-12">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-0 no-gutters pl-4 pr-4">
            <div class="col-md-12">
                <div class="card dashboard-card ml-0 mr-0 mb-0 mb-sm-0 mb-md-0 mb-lg-4">
                    <div class="card-header">
                        <div class="col-12 pl-0 pr-0">
                            <div class="row">
                                <div class="col-6 text-left">
                                    <div style="margin-bottom: 0px"><i class="fas fa-columns"></i> Your Articles</div>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="tab-edit-btn" href="/expertdashboard">
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
                                                        <th scope="col" style="min-width: 130px;" class="text-left">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach ($articleslive as $article)
                                                    <?php $i++; ?>
                                                    <tr>
                                                        <td><?php echo $i; ?>
                                                        </td>
                                                        <td>
                                                            {{ $article->title }}
                                                        </td>
                                                        <td>
                                                            {{ $article->description }}
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="row" class="text-center">
                                                                <form method="post" action="/expert-viewarticle">
                                                                    @csrf
                                                                    <input type="hidden" name="article_id"
                                                                        value={{ $article->article_id }} />
                                                                    <button type="submit" class="btn tab-edit-btn"
                                                                        style="margin-left:4px">
                                                                        <i class="far fa-eye"></i>
                                                                    </button>
                                                                </form>
                                                                <form method="post" action="/expert-edit-articleform">
                                                                    @csrf
                                                                    <input type="hidden" name="article_id"
                                                                        value={{ $article->article_id }} />
                                                                    <button type="submit" class="btn tab-edit-btn"
                                                                        style="margin-left:4px">
                                                                        <i class="fas fa-edit"></i></i>
                                                                    </button>
                                                                </form>
                                                                <form method="post" action="/expert-deletearticle">
                                                                    @csrf
                                                                    <input type="hidden" name="article_id"
                                                                        value={{ $article->article_id }} />
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

                                    <div class="tab-pane fade" id="certification" role="tabpanel"
                                        aria-labelledby="education-tab">
                                        <br>
                                        <div class="container" style="overflow-x: scroll">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="min-width: 70px;">Sr. No</th>
                                                        <th scope="col" style="min-width: 180px;">Article Title</th>
                                                        <th scope="col" style="min-width: 280px;">Description</th>
                                                        <th scope="col" style="min-width: 130px;" class="text-left">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach ($articlesreview as $article)
                                                    <?php $i++; ?>
                                                    <tr>
                                                        <td><?php echo $i; ?>
                                                        </td>
                                                        <td>
                                                            {{ $article->title }}
                                                        </td>
                                                        <td>
                                                            {{ $article->description }}
                                                        </td>
                                                        <td>
                                                            <div class="row" class="text-center">
                                                                <form method="post" action="/expert-viewarticle">
                                                                    @csrf
                                                                    <input type="hidden" name="article_id"
                                                                        value={{ $article->article_id }} />
                                                                    <button type="submit" class="btn tab-edit-btn"
                                                                        style="margin-left:4px">
                                                                        <i class="far fa-eye"></i>
                                                                    </button>
                                                                </form>
                                                                <form method="post" action="/expert-edit-articleform">
                                                                    @csrf
                                                                    <input type="hidden" name="article_id"
                                                                        value={{ $article->article_id }} />
                                                                    <button type="submit" class="btn tab-edit-btn"
                                                                        style="margin-left:4px">
                                                                        <i class="fas fa-edit"></i></i>
                                                                    </button>
                                                                </form>
                                                                <form method="post" action="/expert-deletearticle">
                                                                    @csrf
                                                                    <input type="hidden" name="article_id"
                                                                        value={{ $article->article_id }} />
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
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 offset-lg-0 no-gutters pl-lg-0 pl-4 pr-4">
            <div class="col-md-12">
                <div class="card trending-card right-card ml-0 mr-0 mb-4 mb-sm-4 mb-md-4 mb-sm-0">
                    <div class="card-header">
                        <i class="fas fa-hashtag"></i> Latest Articles
                    </div>
                    <div class="card-body">
                        no articles posted
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection