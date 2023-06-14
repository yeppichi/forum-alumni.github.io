@extends('layouts.main')

@include('partials.navbar')

@section('content')
<div class="row">
	<div class="card">
		<div class="card-header">
			<h1>Edit</h1>
		</div>
		<div class="card-body">
			<form action="{{ route('account.update',Auth::user()->id) }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
                <div class="mb-3">
                    <label for="formFile" class="form-label">Avatar</label>
                    <input class="form-control" type="file" name="avatar">
                </div>
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Name</label>
					<input type="text" class="form-control" name="name" value="{{ $user->name }}">
				</div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                </div>
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Email</label>
					<input type="email" class="form-control" name="email" value="{{ $user->email }}">
				</div>
				<a href="{{ url()->previous() }}" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Back</a>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>	
@endsection