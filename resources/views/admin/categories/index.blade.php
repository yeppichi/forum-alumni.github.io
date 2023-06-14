@extends('layouts.app')

@include('partials.header')
@include('partials.sidebar')

@section('content')
<!--start content-->
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Forum Alumni</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Categories</li>
      </ol>
    </nav>
  </div>
  <div class="ms-auto">
    <div class="btn-group">
      <a href="{{ route('admin.category.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New Data</a>
    </div>
  </div>
</div>
<!--end breadcrumb-->

  <div class="card">
    <div class="card-header py-3">
      <div class="row align-items-center m-0">
        <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
            <select class="form-select">
                <option>All category</option>
                <option>Fashion</option>
                <option>Electronics</option>
                <option>Furniture</option>
                <option>Sports</option>
            </select>
        </div>
        <div class="col-md-2 col-6">
            <input type="date" class="form-control">
        </div>
        <div class="col-md-2 col-6">
            <select class="form-select">
                <option>Status</option>
                <option>Active</option>
                <option>Disabled</option>
                <option>Show all</option>
            </select>
        </div>
      </div>
    </div>
    <div class="card-body">

      <div class="table-responsive">
        <table class="table align-middle table-striped">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>School Generation</th>
              <th>Three Years</th>
              <th>Four Years</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($category as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><span>{{ 'Angkatan '.$item->school_generation }}</span></td>
                <td><span>{{ $item->three_years }}</span></td>
                <td><span>{{ $item->four_years }}</span></td>
                <td>
                    <img src="{{ asset('assets/images/image-category/' . $item->image) }}" alt="{{ $item->school_generation }}" title="{{ $item->school_generation }}" style="max-width: 100px; height: auto;">
                </td>
            <td>
                <div class="d-flex align-items-center gap-3 fs-6">
                  <a href="{{ route('admin.category.edit', $item->id) }}" class="text-warning" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                  <button class="text-danger border-0" onclick="modalDelete('Category', 'category angkatan {{ $item->school_generation }}', '{{ route('admin.category.delete', $item->id) }}', '{{ route('admin.category.index') }}')" title="Delete"><i class="bi bi-trash-fill"></i></button>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

<nav class="float-end mt-4" aria-label="Page navigation">
  <ul class="pagination">
    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</div>
</div>

@endsection

@push('scripts')
    
@endpush