@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-md-12">
		<form method="POST" action="/cat/store">

            @csrf

			<div class="form-group">
				<label for="name">Cat: </label>
				<input type="text" class="form-control" id="name" name="name">
			</div>

			<div class="form-group">
				<label for="breed">Breed: </label>
				<input type="text" class="form-control" id="breed" name="breed">
			</div>

			<div class="form-group">
			<label for="gender">Gender: </label>
				<select class="form-control" id="gender" name="gender">
					<option value='male'>Male</option>
					<option value='female'>Female</option>
				</select>
			</div>


			<div class="form-group">
                <label for="age">Age: </label>
                <input type="number" id="age" class="form-control" name="age" min="0" max="200" step="1">
            </div>

            <div class="form-group">
				<label for="details">Description: </label>
				<textarea type="text" rows="5" class="form-control" id="details" name="details"></textarea>
				<small id="detailsHelp" class="form-text text-muted">Please provide an as-detailed-as-possible description of your pet so that potential pet-sitters can have a better knowledge of your needs.</small>
			</div>



			<div class="form-group">
				<button type="submit" class="btn btn-primary">add cat</button>
			</div>



		</form>
	</div>
</div>

@endsection
