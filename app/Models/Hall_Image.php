<?php

namespace App\Models;

use App\Models\Hall;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hall_Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_id',  //  Add this field
        'image',
    ];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
