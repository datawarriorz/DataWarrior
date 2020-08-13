@extends('layout.expertlayout')

@section('content')
<link rel="stylesheet" href="./css/expert/expert-5-4-edit-skill.css">

<div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-2">
    <div class="card">
        <div class="card-header text-center">
            <h5>Add your Skills</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="/expert-skill-add">
                <div class="form-group col-md-12">
                    <label for="skill1">Skill Name :</label>
                    <br>
                    <input type="text" name="sk_name" required class="form-control" placeholder="Eg. Java"
                        value={{ old('sk_name') }}>
                </div>
                <br>
                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <div class="row text-center">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-right">
                            <a class="btn expert-btn1" href="/expert-profile">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-left">
                            <button type=" submit" class="btn expert-btn1">
                                Save <i class="far fa-save"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @csrf
                @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <br>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </form>
        </div>
    </div>
    <div class="card" style="min-height: 200px;">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th scope="col">Skill Name</th>
                        <th scope="col" class="text-center">Action</th>
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
                        <td class="text-center">
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

@endsection