<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'events';


    protected $fillable = [
        'id',
        'event_name',
        'start_date',
        'end_date',
        'time',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
    

}
