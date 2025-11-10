@extends('layouts.adminLayout.blade')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Add New Track</h4>
    <a href="{{ route('music.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('music.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Artist</label>
                    <input type="text" name="artist" class="form-control" required value="{{ old('artist') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Genre</label>
                    <select name="genre" class="form-select">
                        <option value="">Select Genre</option>
                        <option value="Afrobeat">Afrobeat</option>
                        <option value="Kalindula">Kalindula</option>
                        <option value="Zed Hip Hop">Zed Hip Hop</option>
                        <option value="Gospel">Gospel</option>
                        <option value="Zedbeat">Zedbeat</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft">Draft</option>
                        <option value="pending">Pending</option>
                        <option value="published">Published</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Cover Image</label>
                    <input type="file" name="cover_image" class="form-control" accept="image/*">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Music File</label>
                    <input type="file" name="file_path" class="form-control" accept="audio/*">
                </div>

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
