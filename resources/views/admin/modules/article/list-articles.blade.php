@extends('admin.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/admin-4-2-0-list-articles.css">
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
                                    Your Articles
                                </div>
                                <div class="col-2 text-left">
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
                                                        <th scope="col" style="min-width: 180px;">Article Title</th>
                                                        <th scope="col" style="min-width: 280px;">Description</th>
                                                        <th scope="col" style="min-width: 150px;" class="text-center">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach($articleslive as $article)
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
                                                                    <form method="post" action="/admin-view-article">
                                                                        @csrf
                                                                        <input type="hidden" name="article_id"
                                                                            value={{ $article->article_id }} />
                                                                        <button type="submit" class="btn expert-btn1">
                                                                            <i class="far fa-eye"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form method="post"
                                                                        action="/admin-edit-articleform">
                                                                        @csrf
                                                                        <input type="hidden" name="article_id"
                                                                            value={{ $article->article_id }} />
                                                                        <button type="submit" class="btn expert-btn1"
                                                                            style="margin-left:4px">
                                                                            <i class="fas fa-edit"></i></i>
                                                                        </button>
                                                                    </form>
                                                                    <form method="post" action="/admin-deletearticle">
                                                                        @csrf
                                                                        <input type="hidden" name="article_id"
                                                                            value={{ $article->article_id }} />
                                                                        <button type="submit" class="btn expert-btn1"
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
                                                        <th scope="col" style="min-width: 180px;">Artile Title</th>
                                                        <th scope="col" style="min-width: 280px;">Description</th>
                                                        <th scope="col" style="min-width: 150px;" class="text-center">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach($articlesreview as $article)
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
                                                                    <form method="post" action="/admin-view-article">
                                                                        @csrf
                                                                        <input type="hidden" name="article_id"
                                                                            value={{ $article->article_id }} />
                                                                        <button type="submit" class="btn expert-btn1">
                                                                            <i class="far fa-eye"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form method="post"
                                                                        action="/admin-edit-articleform">
                                                                        @csrf
                                                                        <input type="hidden" name="article_id"
                                                                            value={{ $article->article_id }} />
                                                                        <button type="submit" class="btn expert-btn1"
                                                                            style="margin-left:4px">
                                                                            <i class="fas fa-edit"></i></i>
                                                                        </button>
                                                                    </form>
                                                                    <form method="post" action="/admin-deletearticle">
                                                                        @csrf
                                                                        <input type="hidden" name="article_id"
                                                                            value={{ $article->article_id }} />
                                                                        <button type="submit" class="btn expert-btn1"
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
    </div>
</div>
@endsection
