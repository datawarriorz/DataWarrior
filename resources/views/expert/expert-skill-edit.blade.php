@extends('profile.profilelayout')

@section('profilecontent')
<link rel="stylesheet" href="./css/expert/skill.css">
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
                    <form class="form-inline form-horizontal" method="POST" action="/expert-skill-add">
                        <div class="form-group col-md-6">
                            <label for="skill1">Skill Name :</label>
                            <br>
                            <input type="text" name="sk_name" required class="form-control col-md-12"
                                placeholder="Eg. Java" value={{ old('sk_name') }}>
                        </div>
                        <br>
                        <br>

                        <div class="form-group col-md-2">
                            <div class="col-md-12">
                                <label for="skill1"></label>
                                <button type="submit" class="btn skill_btn">
                                    Save <i class="far fa-save"></i>
                                </button>
                            </div>
                        </div>


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
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i=0; ?>
                            @foreach($skillsobj as $skill)
                                <tr>
                                    <td>
                                        <?php $i++; ?>
                                        <?php echo $i;?>
                                    </td>
                                    <td>
                                        {{ $skill->sk_name }}
                                    </td>
                                    <td>
                                        <form method="POST" action="/expert-skill-delete">
                                            @csrf
                                            <input type="hidden" name="sk_id" value={{ $skill->sk_id }} />

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
</div>
</div>
</div>
<br>
</div>

@endsection
