@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-5-4-edit-skill.css') }}">
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
                        <div class="form-group col-md-6">
                            <label for="skill1">Skill Name :</label>
                            <br>
                            <input type="text" name="skill_name" required class="form-control col-md-12"
                                placeholder="Eg. Java" value={{ old('skill_name') }}>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="skill1">Experience :</label>
                            <br>
                            <select class="form-control custom-select col-md-12" id="sl_id" name="sl_id">
                                @foreach($skilllevel as $sl)
                                    <option value={{ $sl->sl_id }}>{{ $sl->skill_level_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2" style="text-align: center">
                            <button type="submit" class="btn tab-edit-btn skill_btn">
                                Save <i class="far fa-save"></i>
                            </button>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12 text-center">
                                <br>
                                <a class="btn tab-edit-btn" href="/viewprofile">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
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
                                        {{ $skill->skill_name }}
                                    </td>
                                    <td>
                                        @foreach($skilllevel as $sk)
                                            @if($sk->sl_id==$skill->sl_id)
                                                {{ $sk->skill_level_name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <form method="POST" action="/deleteskills">
                                            @csrf
                                            <input type="hidden" name="userskills_id"
                                                value={{ $skill->userskills_id }} />
                                            <button type="submit" class="btn btn-danger" onclick="">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <br>
</div>

@endsection
