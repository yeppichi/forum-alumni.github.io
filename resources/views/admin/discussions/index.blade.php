@extends('layouts.app')

@include('partials.header')
@include('partials.sidebar')

@section('content')

    <!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Forum Alumni</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Discussions</li>
      </ol>
    </nav>
  </div>
  {{-- <div class="ms-auto">
    <div class="btn-group">
      <a href="{{ route('admin.discuss.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New Data</a>
    </div>
  </div> --}}
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
          <th class="text-center">#</th>
          <th class="text-center">Account</th>
          <th class="text-center">Topic</th>
          <th class="text-center">Content</th>
          <th class="text-center">Created</th>
          <th class="text-center">Updated</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($discuss as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="productlist">
            <a class="d-flex align-items-center gap-2" href="#">
              <div class="product-box">
                <img src="{{ asset('assets/images/avatar-user/'.$item->avatar->avatar) }}" alt="{{ $item->sender->name }}" title="{{ $item->sender->name }}">
              </div>
              <div>
                <h6 class="mb-0 product-title">{{ $item->sender->name }}</h6>
              </div>
            </a>
          </td>
          <td><span class="badge rounded-pill alert-success">{{ $item->topic->title }}</span></td>
          <td><span>{{ $item->content }}</span></td>
          <td><span>{{ $item->created_at }}</span></td>
          <td><span>{{ $item->updated_at }}</span></td>
          
          {{-- <td class="text-end">
            <div class="product-box">
              @if(is_array($item->image))
                @foreach($item->image as $image)
                  <img src="{{ asset('assets/images/content-discuss/'.$image) }}">
                @endforeach
              @else
                <img src="{{ asset('assets/images/content-discuss/'.$item->image) }}">
              @endif
            </div>
          </td> --}}
          <td>
            <div class="d-flex align-items-center gap-3 fs-6">
              <a href="{{ route('admin.discuss.show', $item->id) }}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
              <button class="text-danger border-0" onclick="modalDelete('Discussion', 'discussion {{ $item->sender->name }}', '{{ route('admin.discuss.delete', $item->id) }}', '{{ route('admin.discuss.index') }}')" title="Delete"><i class="bi bi-trash-fill"></i></button>
                {{-- <a href="{{ route('admin.discuss.edit', $item->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a> --}}
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