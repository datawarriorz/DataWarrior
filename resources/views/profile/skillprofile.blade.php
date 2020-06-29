@extends('profile.profilelayout')

@section('profilecontent')

    
<div class="card">
    <div class="card-body">
        
<form  class="form-inline form-horizontal" method="POST" action="/updateskills">
    @csrf
    @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <br/>
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
    <label for="skill1">Skill 1:</label>
<input type="text" name='skill1' required class="form-control" value={{old('skill1')}}>

</div>
<div class="form-group">
    <label for="skill2">Skill 2:</label>
<input type="text" name='skill2' required class="form-control" value={{old('skill2')}}>

</div>

<div class="form-group">
    <label for="skill3">Skill 3:</label>
<input type="text" name='skill3' class="form-control" value={{old('skill3')}}>

</div>


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
                <th scope="col">Skill 1</th>
                <th scope="col">Skill 2</th>
                <th scope="col">Skill 3</th>
               
              </tr>
            </thead>
            <tbody>
              <?php $i=0; ?>  
                @foreach($skills as $skill)
              <tr>
                
                <?php $i++; ?> 
                <td><?php echo $i;?> </td>
                <td>{{$skill->skill1}}</td>
                <td>{{$skill->skill2}}</td>
                <td>{{$skill->skill3}}</td>
                
                <td>
                <form   method="POST" action="/deleteskills">
                    @csrf
                    <input type="hidden" name="userskills_id" value={{$skill->userskills_id}} />
                    <button type="submit" class="btn btn-danger" onclick="">Delete</button>
                </form>
                </td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    </div>
    


@endsection