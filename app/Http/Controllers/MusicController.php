<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{
    /**
     * Display a listing of the music tracks.
     */
    public function index(Request $request)
    {
        $query = Music::query();

        // Search by title, artist, or genre
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('artist', 'like', "%{$search}%")
                  ->orWhere('genre', 'like', "%{$search}%");
            });
        }

        $musics = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.music.index', compact('musics'));
    }

    /**
     * Show the form for creating a new track.
     */
    public function create()
    {
        return view('admin.music.create');
    }

    /**
     * Store a newly created track in storage.
     */
  public function store(Request $request)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'artist'      => 'required|string|max:255',
        'genre'       => 'nullable|string|max:100',
        'status'      => 'required|in:draft,pending,published',
        'description' => 'nullable|string',
        'cover_image' => 'nullable|image|max:2048',
        'file_path'   => 'nullable|mimes:mp3,wav,ogg|max:10240',
    ]);

    try {
        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('music/covers', 'public');
        }

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('music/files', 'public');
        }

        $validated['created_by'] = 1; // important

        Music::create($validated);

        return redirect()->route('music.index')->with('success', 'Music track added successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Error creating music track: ' . $e->getMessage());
    }
}

    /**
     * Show the form for editing a track.
     */
    public function edit(Music $music)
    {
        return view('admin.music.edit', compact('music'));
    }

    /**
     * Update the specified track in storage.
     */
    public function update(Request $request, Music $music)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'artist'      => 'required|string|max:255',
            'genre'       => 'nullable|string|max:100',
            'status'      => 'required|in:draft,pending,published',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048',
            'file_path'   => 'nullable|mimes:mp3,wav,ogg|max:10240',
        ]);

        // Update cover image if uploaded
        if ($request->hasFile('cover_image')) {
            // Delete old cover if exists
            if ($music->cover_image && Storage::disk('public')->exists($music->cover_image)) {
                Storage::disk('public')->delete($music->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('music/covers', 'public');
        }

        // Update music file if uploaded
        if ($request->hasFile('file_path')) {
            if ($music->file_path && Storage::disk('public')->exists($music->file_path)) {
                Storage::disk('public')->delete($music->file_path);
            }
            $validated['file_path'] = $request->file('file_path')->store('music/files', 'public');
        }

        $music->update($validated);

        return redirect()->route('music.index')->with('success', 'Music track updated successfully.');
    }

    /**
     * Remove the specified track from storage.
     */
    public function destroy(Music $music)
    {
        // Delete files
        if ($music->cover_image && Storage::disk('public')->exists($music->cover_image)) {
            Storage::disk('public')->delete($music->cover_image);
        }

        if ($music->file_path && Storage::disk('public')->exists($music->file_path)) {
            Storage::disk('public')->delete($music->file_path);
        }

        $music->delete();

        return redirect()->route('music.index')->with('success', 'Music track deleted successfully.');
    }


    /**
 * Increment play count for a track
 */
public function play(Music $music)
{
    $music->increment('play_count');
    return response()->json(['status' => 'success', 'play_count' => $music->play_count]);
}

/**
 * Download music track and increment download count
 */
public function download(Music $music)
{
    $music->increment('download_count');

    if (Storage::disk('public')->exists($music->file_path)) {
        return response()->download(storage_path('app/public/' . $music->file_path));
    }

    return redirect()->back()->with('error', 'File not found.');
}
}
