@extends('layouts.main')

@include('partials.navbar')

@section('content')
<div class="row d-flex justify-content-center align-items-center h-100">
  <div class="col col-md-9 col-lg-7 col-xl-5">
    <div class="card" style="border-radius: 15px;">
      <div class="card-body p-4">
        <div class="row">
          <div class="col-4 col-md-4 col-lg-4">
            <img src="{{ asset('assets/images/avatar-user/'. Auth::user()->avatar) }}" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
          </div>
          <div class="col-8 col-md-8 col-lg-8">
            <h5 class="mb-3">{{ $user->name }}</h5>
            <div class="row">
              <div class="col-4">
                <p class="mb-2 pb-1" style="color: #2b2a2a;">Username</p>
                <p class="mb-2 pb-1" style="color: #2b2a2a;">Email</p>
              </div>
              <div class="col-8">
                <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ ': '.$user->username }}</p>
                <p class="mb-2">{{ ': '.$user->email }}</p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
      <a href="{{ route('home') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
      <a href="{{ route('account.edit', Auth::user()->id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
  </div>
</div>

@endsection