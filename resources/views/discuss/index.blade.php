@extends('layouts.main')

@include('partials.navbar')
<style>
        .redHeart {

            color : red;
        }
    </style>

@section('content')

{{-- CREATE DISCUSSION --}}
<div class="row">

  {{-- image --}}
	<div class="col-auto text-center flex-column d-none d-sm-flex">
		<div class="row h-50">
			<div class="col">&nbsp;</div>
			<div class="col">&nbsp;</div>
		</div>
		<h5 class="m-2">
      <span class="badge bg-light"><img src="{{ asset('assets/images/avatar-user/'.Auth::user()->avatar) }}" class="rounded-circle" width="50" height="50" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}"></span>
		</h5>
		<div class="row h-50">
			<div class="col border-end">&nbsp;</div>
			<div class="col">&nbsp;</div>
		</div>
  </div>

  <div class="col py-2">
    <div class="card radius-15">
      <div class="card-body">
        {{-- name dan username --}}
        <div class="d-flex align-items-center mb-3">
          <h4 class="card-title text-muted mb-0">{{ Auth::user()->name }}</h4>
          <p class="mb-0 ms-3">{{ '@'.Auth::user()->username }}</p>
        </div>
        {{-- topic and image --}}
        <form action="{{ route('discuss.store') }}" method="post">
          @csrf
          @method('PATCH')
          <div class="input-group mb-3">
            <select class="form-select" aria-label="Default select example" name="topic_id">
              <option selected>Pilih Topic</option>
              @foreach ($topic as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
              @endforeach
            </select>
            <input class="form-control" type="file" name="image[]" multiple>
          </div>
          {{-- content --}}
          <div class="input-group">
            <input type="text"name="content" class="form-control" placeholder="Mulai diskusi...">
            <button class="btn btn-primary" type="submit" id="reply">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

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
                  <li><a class="dropdown-item" href="#" onclick="modalDelete('Discussion', 'discussion {{ $item->sender->name }}', '{{ route('discuss.delete', $item->id) }}', '{{ route('discuss.index') }}')">Delete</a></li>
                  {{-- <button class="text-danger border-0" onclick="modalDelete('Profile', 'profile {{ $item->user->name }}', '{{ route('admin.profile.delete', $item->id) }}', '{{ route('admin.profile.index') }}')" title="Delete"><i class="bi bi-trash-fill"></i></button> --}}
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
          <button class="like-button" data-discussion-id="{{ $item->id }}">
    <i class="fas fa-thumbs-up"></i> Like
</button>

            {{-- @auth
                <a href="#" class="btn btn-sm btn-outline-secondary me-2">
              <i class="fas fa-heart" {{ $item->like->contains('user_id', Auth::user()->id) }}></i> Like {{ $item->like->count }}
            </a>
            @endauth --}}

            {{-- @auth
                    <i class="fal fa-heart pressLove {{$item->like->contains('user_id',auth()->id()) ? 'redHeart' : ''}} float-right">{{$post->likes->count()}}</i>
                @else
                    <i class="fal fa-heart pressLove float-right">{{$post->likes->count()}}</i>
                @endauth --}}

            {{-- <button class="btn btn-primary like-button fas fa-heart" data-discussion-id="{{ $item->id }}">Like</button> --}}

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

