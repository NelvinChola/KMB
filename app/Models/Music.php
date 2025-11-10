<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Music extends Model
{
    // app/Models/Music.php

        use HasFactory;

    protected $table = 'musics';
protected $fillable = [
    'title', 'artist', 'genre', 'status', 'description', 'cover_image', 'file_path', 'downloads'
];

}
