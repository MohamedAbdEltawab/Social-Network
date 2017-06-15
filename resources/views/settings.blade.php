@extends('layouts.app')


@section('content')

<div class="container">
	<div class="setting">
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						Basic
					</div>
					<div class="panel-body">
						name
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Profile
					</div>
					<div class="panel-body">
						<form action="{{url('settings/'.$user->id. '/update')}}" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<div class="col-md-3">
									<label>Username</label>
								</div>
								<div class="col-md-8">
									<input type="text" name="name" class="form-control" value="{{$user->name}}">
								</div>
							</div><br><br>
							<div class="form-group">
								<div class="col-md-3">
									<label>E-Mail</label>
								</div>
								<div class="col-md-8">
									<input type="email" name="email" class="form-control" value="{{$user->email}}">
								</div>
							</div><br><br>
							<div class="form-group">
								<div class="col-md-3">
									<label>Worked at</label>
								</div>
								<div class="col-md-8">
									<input type="text" name="work" class="form-control" value="{{$user->work}}">
								</div>
							</div><br><br>
							<div class="form-group">
								<div class="col-md-3">
									<label>Relationship</label>
								</div>
								<div class="col-md-8">
									<input type="text" name="relation" class="form-control" value="{{$user->relation}}">
								</div>
							</div><br><br>
							<div class="form-group">
								<div class="col-md-3">
									<label>Birthday</label>
								</div>
								<div class="col-md-8">
									<input type="date" name="birhtday" class="form-control" value="{{$user->birthday}}">
								</div>
							</div><br><br>
							<div class="form-group">
								<div class="col-md-3">
									<label>Education</label>
								</div>
								<div class="col-md-8">
									<input type="text" name="education" class="form-control" value="{{$user->education}}">
								</div>
							</div><br><br>
							<div class="form-group">
								<div class="col-md-3">
									<label>Country</label>
								</div>
								<div class="col-md-8">
									<input type="text" name="country" class="form-control" value="{{$user->country}}">
								</div>
							</div><br><br>
							<div class="form-group">
								<div class="col-md-3 col-md-offset-3">
									<input type="submit" class="btn btn-primary" value="Save Changes">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection