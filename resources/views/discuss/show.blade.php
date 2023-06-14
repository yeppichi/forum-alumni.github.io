@extends('layouts.main')
@include('partials.navbar')

@section('content')

<div class="card">
  <form action="{{ route('discuss.reply', $discuss->id) }}" method="post">
    @csrf
  <div class="card-body">
        <div class="row">
          <div class="col-md-2">
            <img src="{{ asset('assets/images/avatar-user/'.$discuss->avatar->avatar) }}" class="rounded-circle" width="100" height="100" alt="{{ $discuss->sender->name }}" title="{{ $discuss->sender->name }}">
          </div>
        <div class="col-md-10">
            {{-- dropdown delete and edit --}}
            <div class="dropdown float-end">
              @if (Auth::user()->id == $discuss->sender_id)
                <a href="#" role="button" id="dropdownMenuLink{{ $discuss->id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink{{ $discuss->id }}">
                  <li><a class="dropdown-item" href="{{ route('discuss.edit', $discuss->id) }}">Edit</a></li>
                  <li><a class="dropdown-item" href="#" onclick="modalDelete('Discussion', 'discussion {{ $discuss->sender->name }}', '{{ route('discuss.delete', $discuss->id) }}', '{{ route('discuss.index', $discuss->id) }}')">Delete</a></li>
                </ul>
              @endif
            </div>
            {{-- name and username --}}
            <div class="d-flex align-items-center mb-1">
              <h4 class="card-title text-muted mb-0">{{ $discuss->sender->name }}</h4>
              <p class="mb-0 ms-3">{{ '@'.$discuss->sender->username }}</p>
            </div>
            <div class="d-flex align-items-center">
              <div class="badge bg-primary me-2">{{ $discuss->topic->title }}</div>
            </div>
            <br>
            {{-- content --}}
            <p class="mb-0">{{ $discuss->content }}</p>
            <div class="d-flex align-items-center mt-3 float-end">
              {{-- <a href="#" class="btn btn-sm btn-outline-primary me-2" id="reply" onclick="show()">
                <i class="fas fa-reply"></i> Reply
              </a> --}}
              <a href="#" class="btn btn-sm btn-outline-secondary me-2">
                <i class="fas fa-heart"></i> Like
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-muted">
        <div class="float-end">{{ $discuss->created_at->diffForHumans(now()) }}</div>
        <a href="{{ route('discuss.index') }}" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Back</a>
      </div>
      <div class="card-footer">
        {{-- input reply message --}}
        <div class="input-group">
          <input type="text"name="content" class="form-control" placeholder="Type your message...">
          <button class="btn btn-primary" type="submit" id="reply">Send</button>
        </div>
      </div>
    </div>
  </form>
      
  {{-- ALL REPLIES --}}
  @foreach($reply as $item)
    <div class="row">
      <div class="col-auto text-center flex-column d-none d-sm-flex">
        <div class="row h-50">
          <div class="col">&nbsp;</div>
          <div class="col">&nbsp;</div>
        </div>
        <h5 class="m-2">
          <span class="badge rounded-pill bg-light">  
            <img src="{{ asset('assets/images/avatar-user/'.$item->user->avatar) }}" class="rounded-circle" width="50" height="50" alt="{{ $item->user->name }}" title="{{ $item->user->name }}">
          </span>
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
                <div class="badge bg-secondary me-3">{{ $discuss->created_at->diffForHumans(now()) }}</div>
                  @if (Auth::user()->id == $item->user_id)
                    <a href="#" role="button" id="dropdownMenuLink{{ $item->id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink{{ $item->id }}">
                      <li><a class="dropdown-item" href="{{ route('discuss.edit', $item->id) }}">Edit</a></li>
                      <li><a class="dropdown-item" href="#" onclick="modalDelete('Reply', 'reply {{ $item->user->name }}', '{{ route('reply.delete', $item->id) }}', '{{ route('discuss.show', $discuss->id) }}')">Delete</a></li>
                    </ul>
                  @endif
                </div>
                <div class="d-flex align-items-center mb-1">
                  <h4 class="card-title text-muted mb-0">{{ $item->user->name }}</h4>
                  <p class="mb-0 ms-3">{{ '@'.$item->user->username }}</p>
                </div>
                <div class="d-flex align-items-center mb-3">
                  <div class="badge bg-primary me-2">{{ $item->topic->title }}</div>
                </div>
                <p class="card-text">{{ $item->content }}</p>
                {{-- @foreach ($item['image'] as $image)
                  <!-- output image -->
                <img src="{{ asset('assets/images/content-discuss/'.$image) }}" width="50" height="50" alt="{{ $item->sender->name }}">{!! ($item->image) !!}
                @endforeach --}}
                {{-- <div class="d-flex align-items-center mt-3">
                  <a href="#" class="btn btn-sm btn-outline-primary me-2">
                    <i class="fas fa-reply"></i> Reply
                  </a>
                  <a href="#" class="btn btn-sm btn-outline-secondary me-2">
                    <i class="fas fa-heart"></i> Like
                  </a>
                  <a href="{{ route('discuss.show', $item->id) }}" class="btn btn-sm btn-outline-info">
                    <i class="fas fa-comment"></i> Comment
                  </a>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      @endforeach

@endsection

@push('scripts')

@endpush