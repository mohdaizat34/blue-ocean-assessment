<?php

// app/Models/Seat.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    // Table name is 'seats' by default
    protected $table = 'seats';

    // Fillable properties for mass assignment
    protected $fillable = [
        'coach_id',
        'seat_number',
        'is_available',
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
