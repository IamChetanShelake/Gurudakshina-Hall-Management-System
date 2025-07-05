<?php

namespace App\Models;

use App\Models\HallEnquiry;
use App\Models\EventService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookedHall extends Model
{
    use HasFactory;

    public function enquiry()
    {
        return $this->belongsTo(HallEnquiry::class, 'hall_enquiry_id');
    }

    // Function to check if payment is completed
    public function isFullyPaid()
    {
        return $this->remaining_amount == 0;
    }

     // Relationship with Event Services
     public function eventServices() {
        return $this->hasMany(EventService::class, 'booked_hall_id');
    }

    //Relationship with Catering Services
    public function cateringServices() {
        return $this->hasMany(CateringService::class, 'booked_hall_id');
    }


}
