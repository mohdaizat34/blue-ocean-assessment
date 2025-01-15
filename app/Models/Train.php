<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'train_name',
        'origin',
        'destination',
        'departure_time',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trains';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'departure_time' => 'datetime',
    ];

    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }


}
