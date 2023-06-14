@extends('layouts.app')

@include('partials.sidebar')

@section('content')		
<div class="row">
	<div class="card">
		<div class="card-header">
			<h1>Create Category Profile</h1>
		</div>
		<div class="card-body">
			<form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
                <div class="mb-3">
					<label for="formFile" class="form-label">Image</label>
					<input class="form-control" type="file" name="image">
				</div>
				<div class="mb-3">
					<label class="form-label">School Generation</label>
					<input type="number" class="form-control @error('school_generation') is-invalid @enderror" name="school_generation" placeholder="Input school generation..."  >
					@error('school_generation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label class="form-label">Three Years Graduated</label>
					<input type="number" class="form-control @error('three_years') is-invalid @enderror" name="three_years" placeholder="Input first year..."  >
					@error('three_years')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label class="form-label">Four Years Graduated</label>
					<input type="number" class="form-control @error('four_years') is-invalid @enderror" name="four_years" placeholder="Input end year..."  >
					@error('four_years')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<a href="{{ url()->previous() }}" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Back</a>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>	

@endsection

@push('scripts')

@endpush