<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateringService extends Model
{
    use HasFactory;

    public function bookedHall() {
        return $this->belongsTo(BookedHall::class, 'booked_hall_id');
    }
}
