@extends('layouts.main')

@include('partials.navbar')

@section('content')
<div class="row">
  @foreach ($category as $item)
    <div class="col-sm-6">
      <div class="card mb-3">
        <img src="assets/img/gambar.png" class="card-img-top" alt="angkatan 1">
        <div class="card-body">
          <h5 class="card-title">{{ 'Angkatan'. $item->school_generation }}</h5>
          <p class="card-text"><small class="text-muted">{{ $item->start_year }} - {{ $item->end_year }}</small></p>
          
          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio1">Ototronik</label>
          
            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">Mekatronik</label>
          
            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3">SIJA</label>
          </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach  






@endsection

@push('scripts')

@endpush