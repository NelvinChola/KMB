@extends('layouts.adminLayout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Music Management</h4>
    <a href="{{ route('music.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i> Add New Track
    </a>
</div>

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Music Tracks</h5>
        <form action="{{ route('music.index') }}" method="GET" class="d-flex w-50">
            <input type="text" name="search" class="form-control me-2" placeholder="Search tracks..." value="{{ request('search') }}">
            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Genre</th>
                        <th>Downloads</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($musics as $music)
                    <tr>
                        <td>
                            @if($music->cover_image)
                                <img src="{{ asset('storage/' . $music->cover_image) }}" alt="Cover" width="50" height="50" class="rounded">
                            @else
                                <i class="fas fa-music text-secondary fs-3"></i>
                            @endif
                        </td>
                        <td>{{ $music->title }}</td>
                        <td>{{ $music->artist }}</td>
                        <td>{{ $music->genre ?? 'Uncategorized' }}</td>
                        <td>{{ number_format($music->downloads) }}</td>
                        <td>
                            <span class="badge 
                                @if($music->status == 'published') bg-success
                                @elseif($music->status == 'pending') bg-warning text-dark
                                @else bg-secondary
                                @endif">
                                {{ ucfirst($music->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('music.edit', $music->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('music.destroy', $music->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this track?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No music tracks found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white">
        {{ $musics->links() }}
    </div>
</div>
@endsection
