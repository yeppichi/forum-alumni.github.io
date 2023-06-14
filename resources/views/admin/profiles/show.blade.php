@extends('layouts.app')

@include('partials.sidebar')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body text-center">
            <img style="width: 70%" src="{{ asset('assets/images/profile-image/'.$profile->image) }}" alt="{{ $profile->name }}" title="{{ $profile->name }}" class="img-fluid rounded-circle mb-3">
            <h5 class="card-title">{{ $profile->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $profile->user ? '@' . $profile->user->username : 'account not found' }}</h6>
            <p class="card-subtitle mb-2 text-muted">{{ $profile->department->name }}</p>
            <p class="card-subtitle mb-2 text-muted">{{ $profile->graduated }}</p>
            <hr>
            <p class="card-subtitle mb-2">{{ $profile->bio ? $profile->bio : '-' }}</p>
            <hr><br>
            @if ($profile->instagram)
                {{-- <a href="https://www.instagram.com/{{ $profile->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a> --}}
                <a href="https://www.instagram.com/{{ $profile->instagram }}" target="_blank"><i class="fab fa-instagram fa-lg text-dark"></i></a>

            @else
                <a href="#"><i class="fab fa-instagram fa-lg text-dark"></i></a>
            @endif

            @if ($profile->twitter)
              <a href="https://twitter.com/{{ $profile->twitter }}" target="_blank"><i class="fab fa-twitter fa-lg text-dark"></i></a>
            @else
              <a href="#"><i class="fab fa-twitter fa-lg text-dark"></i></a>
            @endif

            @if ($profile->linkedin)
                <a href="https://www.linkedin.com/in/{{ $profile->linkedin }}" target="_blank"><i class="fab fa-linkedin fa-lg text-dark"></i></a>
            @else
                <a href="#"><i class="fab fa-linkedin fa-lg text-dark"></i></a>
            @endif
          {{-- <p class="card-text">acticuty</p> --}}
        </div>
      </div>
    </div>


    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <a href="{{ route('admin.profile.edit', $profile->id) }}" class="btn btn-sm btn-primary float-end"><i class="fas fa-pencil-alt"></i> Edit</a>
          
          <h5 class="card-title">Profile</h5>
          <hr style="width: 10%" class="bold">
          <div class="row">
            <div class="col-md-6">
              <p class="mb-2 fw-bold">Name</p>
              <p class="mb-2 fw-bold">Birth Date</p>
              <p class="mb-2 fw-bold">Gender</p>
              <p class="mb-2 fw-bold">Address</p>
              <p class="mb-2 fw-bold">Department</p>
              <p class="mb-2 fw-bold">Graduated Year</p>
              <p class="mb-2 fw-bold">Activity Now</p>
              <p class="mb-2 fw-bold">Description of Activity</p>
            </div>
            <div class="col-md-6">
              <p class="mb-2">{{ $profile->name }}</p>
              <p class="mb-2">{{ $profile->birth_date }}</p>
              <p class="mb-2">{{ $profile->gender }}</p>
              <p class="mb-2">{{ $profile->address }}</p>
              <p class="mb-2">{{ $profile->department->name }}</p>
              <p class="mb-2">{{ $profile->graduated }}</p>
              <p class="mb-2">{{ $profile->activity->name }}</p>
              <p class="mb-2">{{ $profile->description }}</p>
            </div>
          </div>
        </div>
      </div>
      <a href="{{ route('admin.profile.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>


    

  </div>
</div>
@endsection