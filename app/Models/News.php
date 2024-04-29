<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title_news',
        'info',
        'name_image',
        'video_name',
        'user_id',
    ];
}
