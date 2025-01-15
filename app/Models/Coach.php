<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = [
        'train_id',
        'coach_name',
        'seat_capacity',
    ];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
