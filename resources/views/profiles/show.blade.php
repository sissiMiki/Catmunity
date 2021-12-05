@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-lg-12 col-sm-12">
		<div class="card hovercard">
			<div class="card-background">
				<img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
				<!-- http://lorempixel.com/850/280/people/9/ -->
			</div>
			<div class="useravatar">
				<img alt="" src="http://lorempixel.com/100/100/people/9/">
			</div>
			<div class="card-info"> <span class="card-title">{{  $user->name  }}</span>

			</div>
		</div>

		<div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">

			<div class="btn-group" role="group">

				<button type="button" id="following" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="	glyphicon glyphicon-list" aria-hidden="true"></span>
					<div class="hidden-xs">Listings</div>
				</button>
			</div>


			<div class="btn-group" role="group">
				<button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<div class="hidden-xs">Profile</div>
				</button>
			</div>

			<div class="btn-group" role="group">
				<button type="button" id="stars" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
					<div class="hidden-xs">Cat</div>
				</button>
			</div>


		</div>

		<div class="well">
			<div class="tab-content">
				<div class="tab-pane fade in" id="tab3">
					<div class="list-group">

					@if (auth()->user()->id == $user->id)
					<form action="/cat/new" method="GET">
					<input type="submit" value="Add Pet" class="btn btn-success">

					</form>
					<br>
					@endif


					@foreach ($user->cats as $cat)
						<a href="#" class="list-group-item">
							<strong>
								Name: {{  $cat->name }}
							</strong>
							<br>
							<strong>
								Breed: {{  $cat->breed }}
							</strong>

							<strong>
								Age: {{  $cat->age }}
							</strong>
							<br>
							<strong>
								Gender: {{  $cat->gender }}
							</strong>
							<br>
							<strong>
								Description:
							</strong>{{  $cat->description }}
							<br>

							@endforeach
							</a>
						</div>


				</div>

				<div class="tab-pane fade in" id="tab2">
				@if (auth()->user()->id == $user->id)
					<form action="/user/edit" method="GET">
					<input type="submit" value="Edit Profile" class="btn btn-success">

					</form>
					<br>
					@endif
					<div class="panel panel-default">

						<div class="panel-body">

							<strong>Name: </strong>{{  $user->name  }}
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-body">
							<strong>Contact Email: </strong>{{  $user->email  }}
						</div>
					</div>

                    <div class="panel panel-default">
						<div class="panel-body">
							<strong>Role </strong>{{  $user->'role_id'  }}
						</div>
					</div>





	@endsection
