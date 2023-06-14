@extends('layouts.main')
@include('partials.navbar')

@section('content')
<div class="page-breadcrumb d-flex align-items-center justify-content-between mb-3">
  <div class="breadcrumb-title pe-3">Angkatan {{ $category->school_generation }}</div>
  <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
    <select class="form-select" onchange="filterByDepartment(this.value)">
      <option value="">All Departments</option>
      <option value="Teknik Ototronik">Teknik Ototronik</option>
      <option value="Teknik Mekatronik">Teknik Mekatronik</option>
      <option value="Sistem Informatika Jaringan dan Aplikasi">SIJA</option>
    </select>
  </div>
  <div class="col-md-1 col-12">
    <button onclick="history.back()" class="btn btn-secondary float-end">Back</button>
  </div>
</div>


<div class="row" id="profile-container">
  @foreach ($profile as $item)
    <div class="col-md-4 mb-4 profile-item" data-department="{{ $item->department->name }}">
      <div class="card">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="{{ asset('assets/images/profile-image/'. $item->image) }}" title="{{ $item->name }}" class="card-img img-fluid rounded-circle mb-3" alt="{{ $item->name }}">
          </div>
          <div class="col-md-8 d-flex align-items-center">
            <div class="card-body">
              <h5 class="card-title mb-0"><a href="{{ route('profile.show', $item->id) }}">{{ $item->name }}</a></h5>
              <p class="card-text mb-0">{{ $item->department->name }}</p>
              {{-- <p class="card-text mb-0">{{ $item->graduated_id }}</p> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>


@endsection

@push('scripts')
    <script>
  function filterByDepartment(department) {
    // Hapus kelas "d-none" dari semua elemen dengan kelas "profile-item"
    let profileItems = document.getElementsByClassName('profile-item');
    for (let i = 0; i < profileItems.length; i++) {
      profileItems[i].classList.remove('d-none');
    }

    // Jika department dipilih, sembunyikan semua item yang memiliki department yang berbeda
    if (department) {
      for (let i = 0; i < profileItems.length; i++) {
        if (profileItems[i].getAttribute('data-department') !== department) {
          profileItems[i].classList.add('d-none');
        }
      }
    }
  }
</script>
@endpush