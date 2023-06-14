@extends('layouts.app')

@include('partials.sidebar')

@section('content')		
<div class="row">
	<div class="card">
		<div class="card-header">
			<h1>Edit User</h1>
		</div>
		<div class="card-body">
			<form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
				@csrf
        <div class="mb-3">
					<label for="formFile" class="form-label">Avatar</label>
					<input class="form-control" type="file" name="avatar">
				</div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Input nama..." value="{{ $user->name }}">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Username</label>
                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="Input username..." value="{{ $user->username }}">
                    @error('username')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Input email..." value="{{ $user->email }}">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Input new password..." value="{{ $user->password }}">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
				<a href="{{ url()->previous() }}" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Back</a>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>	

@endsection