@extends('layouts.app')

@include('partials.sidebar')

@section('content')		
<div class="row">
	<div class="card">
		<div class="card-header">
			<h1>Create Profile User</h1>
		</div>
		<div class="card-body">
			<form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="mb-3">
					<label class="form-label">User</label>
					<select class="form-select @error('user_id') is-invalid @enderror" name="user_id">
						<option selected disabled>Select User</option>
						@foreach ($user as $item)
							<option value="{{ $item->id }}">{{ $item->name }} - {{ '@'.$item->username }}</option>
						@endforeach
					</select>
					@error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label class="form-label">Name</label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Input name...">
					@error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label for="formFile" class="form-label @error('image') is-invalid @enderror">Profile Image</label>
					<input class="form-control" type="file" name="image">
					@error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label class="form-label">Birth Date</label>
					<input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date">
					@error('birth_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
                	<label for="nama">Gender</label>
        
                	<div class="form-check @error('gender') is-invalid @enderror">
                    	<input class="form-check-input" type="radio" name="gender" value="Male">
                    	<label class="form-check-label">Male</label>
                	</div>
                	<div class="form-check @error('gender') is-invalid @enderror">
                    	<input class="form-check-input" type="radio" name="gender" value="Female">
                    	<label class="form-check-label">Female</label>
                	</div>
					@error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            	</div>
				<div class="mb-3">
					<label class="form-label">Address</label>
					<textarea class="form-control @error('address') is-invalid @enderror" name="address" id="" cols="30" rows="5" placeholder="Input address..."></textarea>
					@error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label class="form-label">Bio</label>
					<input type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" placeholder="Input bio...">
					@error('bio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label class="form-label">Department</label>
					<select class="form-select @error('department_id') is-invalid @enderror" name="department_id">
						<option selected disabled>Select Department</option>
						@foreach ($department as $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
						@endforeach
					</select>
					@error('department_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label class="form-label">Graduated</label>
					<select class="form-select @error('categories_id') is-invalid @enderror" name="categories_id">
						<option selected disabled>Select Graduated Year</option>
						@foreach ($categories as $item)
							<option value="{{ $item->id }}">{{ $item->three_years }} or {{ $item->four_years }} = {{ 'Angkatan '.$item->school_generation }}</option>
						@endforeach
					</select>
					@error('categories_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label class="form-label">Activity</label>
					<select class="form-select @error('activity_id') is-invalid @enderror" name="activity_id">
						<option selected disabled>Select Activity</option>
						@foreach ($activity as $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
						@endforeach
					</select>
					@error('activity_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label class="form-label">Description of Activity</label>
					<textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" cols="30" rows="5" placeholder="Input description of activity"></textarea>
					@error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label class="form-label">Username Instagram</label>
					<input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" placeholder="Input username instagram">
					@error('instagram')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label class="form-label">Username Twitter</label>
					<input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" placeholder="Input username twitter">
					@error('twitter')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
				</div>
				<div class="mb-3">
					<label class="form-label">Username LinkedIn</label>
					<input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" placeholder="Input username linkedin">
					@error('linkedin')
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
<script>
	/*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}
</script>
@endpush