<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    // app/Models/Music.php
protected $fillable = [
    'title', 'artist', 'genre', 'status', 'description', 'cover_image', 'file_path', 'downloads'
];

}
