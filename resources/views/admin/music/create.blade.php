@extends('layouts.adminLayout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Add New Track</h4>
    <a href="{{ route('music.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i> Back
    </a>
</div>

{{-- Success/Error Notifications --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Validation Errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('music.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                {{-- Title --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                </div>

                {{-- Artist --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Artist <span class="text-danger">*</span></label>
                    <input type="text" name="artist" class="form-control" required value="{{ old('artist') }}">
                </div>

                {{-- Genre --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Genre</label>
                    <select name="genre" class="form-select">
                        <option value="">Select Genre</option>
                        <option value="Afrobeat" {{ old('genre') == 'Afrobeat' ? 'selected' : '' }}>Afrobeat</option>
                        <option value="Kalindula" {{ old('genre') == 'Kalindula' ? 'selected' : '' }}>Kalindula</option>
                        <option value="Zed Hip Hop" {{ old('genre') == 'Zed Hip Hop' ? 'selected' : '' }}>Zed Hip Hop</option>
                        <option value="Gospel" {{ old('genre') == 'Gospel' ? 'selected' : '' }}>Gospel</option>
                        <option value="Zedbeat" {{ old('genre') == 'Zedbeat' ? 'selected' : '' }}>Zedbeat</option>
                    </select>
                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                {{-- Description --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>

                {{-- Cover Image --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Cover Image</label>
                    <input type="file" name="cover_image" class="form-control" accept="image/*">
                </div>

                {{-- Music File --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Music File</label>
                    <input type="file" name="file_path" class="form-control" accept="audio/*">
                </div>

                {{-- Submit Button --}}
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Save Track
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
