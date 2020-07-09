@extends('profile.profilelayout')

@section('profilecontent')


<div class="card">
    <div class="card-body">

        <form class="form-inline form-horizontal" method="POST" action="/updateskills">
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
            <fieldset>
                <legend>Add your Skills </legend>
                <div class="form-group">
                    <label for="skill1">Skill:</label>
                    <input type="text" name='skill' required class="form-control" value={{old('skill')}}>

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


                <fieldset class="form-group form-inline">
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </fieldset>
        </form>

    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th scope="col">Skills</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach($skills as $skill)
                <tr>

                    <?php $i++; ?>
                    <td><?php echo $i;?>
                    </td>
                    <td>{{$skill->skill}}</td>
                    

                    <td>
                        <form method="POST" action="/deleteskills">
                            @csrf
                            <input type="hidden" name="userskills_id" value={{$skill->userskills_id}} />
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
@endsection