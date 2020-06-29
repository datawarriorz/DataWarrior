<div id="tab4">
	<h3>Job Experience Details</h3>
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

	<div class="card">
	  <div class="card-body">
		<div class="form-group">
			<label for="Fname">Profile</label>
			<input type="text" name='profile' required class="form-control" value={{old('profile')}}>
		</div>
		<div class="form-group">
			<label for="Lname">Organisation</label>
			<input type="text" name='organisation' required class="form-control" value={{old('oraganisation')}}>
		</div>
		<div class="form-group">
			<label for="InputEmail">Location</label>
			<input type="text" class="form-control" id="location" required name='location' value={{old('location')}}>
		</div>
		<div class="form-group">
			<label for="start_date">Start Date</label>
			<input type="date" name="startdate" required class="form-control" value={{old('start_date')}}>
		</div>
		<div class="form-group">
			<label for="end_date">End Date</label>
			<input type="date" name="enddate" required class="form-control" value={{old('end_date')}}>
		</div>       
		<div class="form-group form-inline" >
			<input type="checkbox" name="currentjob" id="currentjob"  class="form-control" value="yes" > <label>Currently working</label>
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea  rows="4" class="form-control" id="description" required name='description' value={{old('description')}}></textarea>
		</div>    
		<div style="overflow:auto;">
			<div style="float:right;">
				<button id="prev3" type="button">Previous</button>
				<button id="next4" type="button">Next</button>
			</div>
		</div>
		</div>
	</div>
</div>