{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.main')

{{-- <nav class="navbar bg-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" alt="SMKN 69" width="200" height="60">
      </a>

      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
      </ul>
    </div>
</nav> --}}

@include('partials.navbar')

  
@section('content')<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="{{ asset('assets/images/carousel/1.jpeg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="{{ asset('assets/images/carousel/2.jpeg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/images/carousel/3.jpeg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<h2 class="text-center m-5">Alumni</h2>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl row-cols-xxl-4">
  <div class="col">
    <div class="card radius-10 border-0 border-start border-danger border-3">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="">
            <p class="mb-1">Teknik Ototronik</p>
            <h4 class="mb-0 text-danger">{{ $ototronik }}</h4>
          </div>
          <div class="ms-auto widget-icon bg-danger text-white">
            <i class="fa-solid fa-gauge"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card radius-10 border-0 border-start border-orange border-3">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="">
            <p class="mb-1">Teknik Mekatronik</p>
            <h4 class="mb-0 text-orange">{{ $mekatronik }}</h4>
          </div>
          <div class="ms-auto widget-icon bg-orange text-white">
            <i class="fa-solid fa-robot"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card radius-10 border-0 border-start border-tiffany border-3">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="">
            <p class="mb-1">SIJA</p>
            <h4 class="mb-0 text-tiffany">{{ $sija }}</h4>
          </div>
          <div class="ms-auto widget-icon bg-tiffany text-white">
            <i class="fa-solid fa-code"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<h2 class="text-center m-5">diskusi</h2>
{{-- ALL DISCUSSIONS --}}
@foreach($discuss as $item)
  <div class="row">
    {{-- image --}}
    <div class="col-auto text-center flex-column d-none d-sm-flex">
      <div class="row h-50">
        <div class="col">&nbsp;</div>
        <div class="col">&nbsp;</div>
      </div>
      <h5 class="m-2">
        <span class="badge bg-light"><img src="{{ asset('assets/images/avatar-user/'.$item->avatar->avatar) }}" class="rounded-circle" width="50" height="50" alt="{{ $item->sender->name }}" title="{{ $item->sender->name }}"></span>
      </h5>
      <div class="row h-50">
        <div class="col border-end">&nbsp;</div>
        <div class="col">&nbsp;</div>
      </div>
    </div>

    <div class="col py-2">
      <div class="card radius-15">
        <div class="card-body">
          <div class="dropdown float-end">
            <div class="badge bg-secondary me-3">{{ $item->created_at->diffForHumans(now()) }}</div>
            {{-- dropdown edit and delete --}}
              @if (Auth::user()->id == $item->sender_id)
                <a href="#" role="button" id="dropdownMenuLink{{ $item->id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink{{ $item->id }}">
                  <li><a class="dropdown-item" href="{{ route('discuss.edit', $item->id) }}">Edit</a></li>
                  <li><a class="dropdown-item" href="#">Delete</a></li>
                </ul>
              @endif
          </div>
          {{-- name and username --}}
          <div class="d-flex align-items-center mb-1">
            <h4 class="card-title text-muted mb-0">{{ $item->sender->name }}</h4>
            <p class="mb-0 ms-3">{{ '@'.$item->sender->username }}</p>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="badge bg-primary me-2">{{ $item->topic->title }}</div>
          </div>
          {{-- content --}}
          <p class="card-text">{{ $item->content }}</p>
          {{-- @foreach ($item['image'] as $image)
            <!-- output image -->
          <img src="{{ asset('assets/images/content-discuss/'.$image) }}" width="50" height="50" alt="{{ $item->sender->name }}">{!! ($item->image) !!}
          @endforeach --}}
          <div class="d-flex align-items-center mt-3">
            <a href="#" class="btn btn-sm btn-outline-secondary me-2">
              <i class="fas fa-heart"></i> Like
            </a>
            <a href="{{ route('discuss.show', $item->id) }}" class="btn btn-sm btn-outline-info">
              <i class="fas fa-comment"></i> Comment
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection



@push('scripts')
  {{-- <script>
    // Data kualitatif atau kategorikal
    var labels = ["Label 1", "Label 2", "Label 3"];

    // Inisialisasi chart dengan data kualitatif atau kategorikal
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar', // Jenis chart
      data: {
        labels: labels, // Data kualitatif atau kategorikal
        datasets: [{
          label: 'Contoh Chart Tanpa Data Angka',
          data: [{{ $countKerja }}, {{ $countKuliah }}, {{ $countLainnya }}], // Menggunakan hasil perhitungan dari controller
          backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang
          borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
          borderWidth: 1 // Ketebalan garis
        }]
      },
      options: {
        // Konfigurasi lainnya
      }
    });
  </script> --}}
@endpush