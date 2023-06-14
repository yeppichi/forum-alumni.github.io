@extends('layouts.main')

@include('partials.navbar')

@section('content')
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

                {{-- content --}}
                <form action="{{ route('discuss.update', $discuss->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="input-group mb-3">
                        <select class="form-select" aria-label="Default select example" name="topic_id">
                            <option selected>Pilih Topic</option>
                            @foreach ($topic as $item)
                                <option value="{{ $item->id }}" {{ $discuss->topic_id == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
                            @endforeach
                        </select>
                        <input class="form-control" type="file" name="image[]" multiple>
                    </div>
                    <div class="input-group">
                        <input type="text"name="content" class="form-control" placeholder="Mulai diskusi..." value="{{ $discuss->content }}">
                        <button class="btn btn-primary" type="submit" id="reply">Send</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- back button --}}
    <a href="{{ url()->previous() }}" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Back</a>
    </div>
</div>
@endsection