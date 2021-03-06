@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
		@endif

		@if(Session::has('error'))
		<div class="alert alert-danger">{{ Session::get('error') }}</div>
		@endif

		<div class="panel panel-primary col-xs-4">
			<div class="panel-heading">Edit Service</div>
			<div class="panel-body">

				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				
				<form method="post" action="{{ url('/updateservice') }}">
					
					{{ csrf_field() }}

					@foreach($data as $row)

					<div class="form-group">
						<label>Additional Service type</label>
						<input type="text" name="service" placeholder="e.g. torn corllar, wornout zip" value="{{ $row->service }}" class="form-control">
					</div>

					<div class="form-group">
						<label>Price</label>
						<input type="number" name="price" value="{{ $row->price }}" placeholder="e.g. 400" class="form-control">
					</div>

					<input type="hidden" name="id" value="{{ $row->id }}">

					@endforeach

					<input type="submit" name="submit" class="btn btn-primary">

				</form>

			</div>
			
		</div>

	</div>
</div>
@endsection
