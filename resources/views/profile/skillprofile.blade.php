@extends('profile.profilelayout')

@section('profilecontent')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Add your Skills</h5>
                </div>
                <div class="col-md-12">
                    <br>
                    <form class="form-inline form-horizontal" method="POST" action="/updateskills">
                        <div class="form-group col-md-6">
                            <label for="skill1">Skill Name</label>
                            <br>
                            <input type="text" name="skill_name" required class="form-control col-md-12"
                                value={{old('skill_name')}}>
                        </div>
                        <br>
                        <br>
                        <div class="form-group col-md-4">
                            <label for="skill1">Experience </label>
                            <br>
                            <select class="form-control custom-select col-md-12" id="skill_level_id"
                                name="skill_level_id">
                                @foreach($skilllevel as $sl)
                                <option value={{$sl->skill_level_id}}>{{$sl->skill_level_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="col-md-12">
                                <label for="skill1"></label>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                        @if($process=="internship")
                        <div class="form-group">
                            <input type="hidden" name="process" class="form-control" value="internship" />
                        </div>
                        @endif
                        @if($process=="job")
                        <div class="form-group">
                            <input type="hidden" name="process" class="form-control" value="job" />
                        </div>
                        @endif

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

                    </form>
                    <br>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th scope="col">Skill Name</th>
                                <th scope="col">Skill Experience Level</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i=0; ?>
                            @foreach($skills as $skill)
                            <tr>
                                <td>
                                    <?php $i++; ?>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                    {{$skill->skill_name}}
                                </td>
                                <td>
                                    @foreach ($skilllevel as $sk)
                                    @if($sk->skill_level_id==$skill->skill_level_id)
                                    {{$sk->skill_level_name}}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    <form method="POST" action="/deleteskills">
                                        @csrf
                                        <input type="hidden" name="userskills_id" value={{$skill->userskills_id}} />
                                        @if($process=="internship")
                                        <div class="form-group">
                                            <input type="hidden" name="process" class="form-control"
                                                value="internship" />
                                        </div>
                                        @endif
                                        @if($process=="job")
                                        <div class="form-group">
                                            <input type="hidden" name="process" class="form-control" value="job" />
                                        </div>
                                        @endif
                                        <button type="submit" class="btn btn-danger" onclick="">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($process=="internship")
                    <a href="/internshipfinal" class="btn btn-primary">View Internship form</a>
                    @endif
                    @if($process=="job")
                    <a href="/jobfinal" class="btn btn-primary">View Job Application form</a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
<br>
</div>

@endsection