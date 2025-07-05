<?php

namespace App\Models;

use App\Models\Hall;
use App\Models\Accessorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HallEnquiry extends Model
{
    use HasFactory;

    protected $table = 'hallenquirys';

    protected $fillable = [
        'name',
        'organization',
        'gst_no',
        'email',
        'contact_no',
        'address',
        'referred_by',
        'event_type',
        'hall',
        'event_date',
        'duration',
        'start_time',
        'end_time',
        'expected_audience',
    ];

    // Relationship with Hall
    public function halll()
    {
        return $this->belongsTo(Hall::class, 'hall_id', 'id');
    }

    // A Hallenquiry can have multiple Accessories
    public function accessories()
    {
        return $this->hasMany(Accessorie::class, 'enquiry_id');
        // Make sure 'enquiry_id' exists in the 'accessoris' table
    }
    public function bookedhall()
    {
        return $this->hasOne(Hall::class, 'hall_enquiry_id', 'id');
    }

}
