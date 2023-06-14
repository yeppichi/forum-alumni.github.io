@extends('layouts.main')

@include('partials.navbar')

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
            <p class="card-subtitle mb-2 text-muted">Angkatan {{ $profile->categories->school_generation }}</p>
            <hr>
            <p class="card-subtitle mb-2">{{ $profile->bio ? $profile->bio : '-' }}</p>
            <hr><br>
            @if ($profile->instagram)
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
        </div>
      </div>
    </div>


    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          @if($profile->user_id == Auth::user()->id)
          <a href="{{ route('profile.edit', Auth::user()->profile->id) }}" class="btn btn-sm btn-primary float-end"><i class="fas fa-pencil-alt"></i> Edit</a>
          @endif
          
          <h5 class="card-title">Profile</h5>
          <hr style="width: 10%" class="bold">
          <div class="row">
            <div class="col-md-6">
              <p class="mb-2 fw-bold">Nama</p>
              <p class="mb-2 fw-bold">Jenis Kelamin</p>
              {{-- <p class="mb-2">Tanggal Lahir</p> --}}
              <p class="mb-2 fw-bold">Jurusan</p>
              <p class="mb-2 fw-bold">Tahun Lulus</p>
              <p class="mb-2 fw-bold">Kegiatan Sekarang</p>
              <p class="mb-2 fw-bold">Deskripsi Kegiatan</p>
            </div>
            <div class="col-md-6">
              <p class="mb-2">{{ $profile->name }}</p>
              <p class="mb-2">{{ $profile->gender }}</p>
              <p class="mb-2">{{ $profile->department->name }}</p>
              <p class="mb-2">
                @if ($profile->department->name == 'Teknik Ototronik')
                    {{ $profile->categories->three_years }}
                @else
                    {{ $profile->categories->four_years }}
                @endif
              </p>
              <p class="mb-2">{{ $profile->activity->name }}</p>
              <p class="mb-2">{{ $profile->description }}</p>
            </div>
          </div>
        </div>
      </div>
      <a href="{{ route('profile.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>


    

  </div>
</div>
@endsection