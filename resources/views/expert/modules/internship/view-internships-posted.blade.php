@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/expert/expert-4-3-1-view-jobs.css">
<div class="col-12">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-0 no-gutters pl-4 pr-4">
            <div class="col-md-12">
                <div class="card dashboard-card ml-0 mr-0 mb-0 mb-sm-0 mb-md-0 mb-lg-4">
                    <div class="card-header">
                        <div class="col-12 pl-0 pr-0">
                            <div class="row">
                                <div class="col-6 text-left">
                                    <div style="margin-bottom: 0px"><i class="fas fa-columns"></i> Internships Posted By
                                        You
                                    </div>
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
                        <div class="container" style="overflow-x: scroll">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="min-width: 70px;">Sr. No</th>
                                        <th scope="col" style="min-width: 242px;">Internship Title</th>
                                        <th scope="col" style="min-width: 199px;">Designation</th>
                                        <th scope="col" style="min-width: 93px;">Duration</th>
                                        <th scope="col" style="min-width: 140px;">Created on</th>
                                        <th scope="col" style="min-width: 160px;" class="text-left">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($jobsobj as $jo)
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?>
                                        </td>
                                        <td>
                                            {{$jo->job_title }}
                                        </td>
                                        <td>
                                            {{$jo->job_company }}
                                        </td>
                                        <td>
                                            {{$jo->job_duration }}
                                        </td>
                                        <td>
                                            <?php echo date_format($jo->created_at,"d M' Y");?>
                                        </td>
                                        <td class="text-center">
                                            <div class="row" class="text-center">
                                                <form method="post" action="/expert-viewarticle">
                                                    @csrf
                                                    <input type="hidden" name="article_id" value={{$jo->job_id }} />
                                                    <button type="submit" class="btn tab-edit-btn"
                                                        style="margin-left:4px">
                                                        <i class="far fa-eye"></i>
                                                    </button>
                                                </form>
                                                <form method="post" action="/expert-edit-articleform">
                                                    @csrf
                                                    <input type="hidden" name="article_id" value={{$jo->job_id }} />
                                                    <button type="submit" class="btn tab-edit-btn"
                                                        style="margin-left:4px">
                                                        <i class="fas fa-edit"></i></i>
                                                    </button>
                                                </form>
                                                <form method="post" action="/expert-deletearticle">
                                                    @csrf
                                                    <input type="hidden" name="article_id" value={{$jo->job_id }} />
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
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 offset-lg-0 no-gutters pl-lg-0 pl-4 pr-4">
            <div class="col-md-12">
                <div class="card trending-card right-card ml-0 mr-0 mb-4 mb-sm-4 mb-md-4 mb-sm-0">
                    <div class="card-header">
                        <i class="fas fa-hashtag"></i> Last Job Posted
                    </div>
                    <div class="card-body">
                        no jobs posted
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection