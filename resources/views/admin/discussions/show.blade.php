@extends('layouts.app')
@include('partials.sidebar')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('assets/images/avatar-user/'.$discuss->avatar->avatar) }}" class="rounded-circle" width="100" height="100" alt="{{ $discuss->sender->name }}" title="{{ $discuss->sender->name }}">
            </div>
            <div class="col-md-10">
                <div class="d-flex align-items-center">
                    <h4 class="card-title text-muted mb-0">{{ $discuss->sender->name }}</h4>
                    <p class="mb-0 ms-3">{{ '@'.$discuss->sender->username }}</p>
                </div>
                <p class="mb-0 font-13"><span class="badge rounded-pill alert-success">{{ $discuss->topic->title }}</span></p>
                <br>
                <p class="mb-0">{{ $discuss->content }}</p>
                <div class="d-flex align-items-center mt-3 float-end">
                    <a href="#" class="btn btn-sm btn-outline-primary me-2" id="reply" onclick="show()">
                        <i class="fas fa-reply"></i> Reply
                    </a>
                    <a href="#" class="btn btn-sm btn-outline-secondary me-2">
                        <i class="fas fa-heart"></i> Like
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        <div class="float-end">{{ $discuss->created_at }}</div>
        <a href="{{ route('admin.discuss.index') }}" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Back</a>
    </div>        
</div>
    
<br><br>


  <div class="card">
    <div class="card-header py-3">
      <h3>Replies</h3>
    </div>
    <div class="card-body">

      <div class="table-responsive">
  <table class="table align-middle table-striped">
      <thead class="table-dark">
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Account</th>
          <th class="text-center">Content</th>
          <th class="text-center">Created</th>
          <th class="text-center">Updated</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($reply as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="productlist">
            <a class="d-flex align-items-center gap-2" href="#">
              <div class="product-box">
                <img src="{{ asset('assets/images/avatar-user/'.$item->user->avatar) }}" alt="{{ $item->user->name }}" title="{{ $item->user->name }}">
              </div>
              <div>
                <h6 class="mb-0 product-title">{{ $item->user->name }}</h6>
              </div>
            </a>
          </td>
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
              <button class="text-danger border-0" onclick="modalDelete('Reply', 'reply {{ $item->user->name }}', '{{ route('admin.reply.delete', $item->id) }}', '{{ route('admin.discuss.show', $discuss->id) }}')" title="Delete"><i class="bi bi-trash-fill"></i></button>
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