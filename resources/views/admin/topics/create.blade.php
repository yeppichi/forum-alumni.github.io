@extends('layouts.app')

@include('partials.sidebar')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>Create Topic</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.topic.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Input title...">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
				    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="Input slug...">
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
				    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Input description...">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
				    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Back</a>
				    <button type="submit" class="btn btn-primary">Submit</button>
                </form>    
            </div>
        </div>
    </div>
@endsection