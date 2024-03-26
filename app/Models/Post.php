<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title', 'description', 'slug', 'image_path', 'user_id', 'category'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
