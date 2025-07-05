<?php

namespace App\Models;

use App\Models\BookedHall;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventService extends Model
{
    use HasFactory;

    protected $fillable = ['booked_hall_id', 'service_name', 'service_price', 'service_description', 'quantity', 'total_price'];


    public function bookedHall() {
        return $this->belongsTo(BookedHall::class, 'booked_hall_id');
    }
}
