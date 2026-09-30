<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'label', 'description', 'technologies', 'image', 'link'];

    // Casting field technologies (JSON) menjadi Array PHP secara otomatis
    protected $casts = [
        'technologies' => 'array',
    ];
}
