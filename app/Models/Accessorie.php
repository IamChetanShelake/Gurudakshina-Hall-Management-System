<?php

namespace App\Models;

use App\Models\HallEnquiry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accessorie extends Model
{
    use HasFactory;


    public function hallEnquiry()
    {
        return $this->belongsTo(Hallenquiry::class, 'enquiry_id'); // enquiry_id should exist in the table
    }
}
