<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winningticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'winning_number',
        'description',
        'winning_name',
        'phone',
        'game_date',
    ];
}
