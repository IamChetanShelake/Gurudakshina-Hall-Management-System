<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ideal extends Model
{
    use HasFactory;
    protected $fillable = ['hall_id', 'title'];

    // Relationship with Hall
    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id');
    }
}
