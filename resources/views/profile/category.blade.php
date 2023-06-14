@extends('layouts.main')

@include('partials.navbar')

@section('content')
{{-- @foreach($profile->groupBy('graduated_id') as $year => $graduated) --}}
    <div class="row">
    @foreach ($category as $item)
      <div class="col-md-4">
        <div class="card mb-3">
          <img src="{{ asset('assets/images/image-category/' . $item->image) }}" alt="{{ 'Angkatan '. $item->school_generation }}" title="{{ 'Angkatan '. $item->school_generation }}" class="img-top">
          <div class="card-body">
            <h5 class="card-title"><a href="{{ route('category', $item->id) }}">{{ 'Angkatan '. $item->school_generation }}</a></h5>
            <p class="card-text"><small class="text-muted">{{ $item->three_years }} or {{ $item->four_years }}</small></p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
{{-- @endforeach --}}
@endsection

@push('scripts')

@endpush


