@extends('layouts.adminLayout.blade')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Edit Track</h4>
    <a href="{{ route('music.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('music.update', $music->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $music->title) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Artist</label>
                    <input type="text" name="artist" class="form-control" value="{{ old('artist', $music->artist) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Genre</label>
                    <select name="genre" class="form-select">
                        <option value="">Select Genre</option>
                        @foreach(['Afrobeat','Kalindula','Zed Hip Hop','Gospel','Zedbeat'] as $genre)
                            <option value="{{ $genre }}" {{ $music->genre == $genre ? 'selected' : '' }}>
                                {{ $genre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        @foreach(['draft','pending','published'] as $status)
                            <option value="{{ $status }}" {{ $music->status == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description', $music->description) }}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Cover Image</label><br>
                    @if($music->cover_image)
                        <img src="{{ asset('storage/' . $music->cover_image) }}" alt="Cover" width="100" class="mb-2 rounded">
                    @endif
                    <input type="file" name="cover_image" class="form-control" accept="image/*">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Music File</label><br>
                    @if($music->file_path)
                        <audio controls class="w-100 mb-2">
                            <source src="{{ asset('storage/' . $music->file_path) }}" type="audio/mpeg">
                        </audio>
                    @endif
                    <input type="file" name="file_path" class="form-control" accept="audio/*">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Update Track
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
