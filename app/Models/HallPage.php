<?php

namespace App\Models;

use App\Models\Hall;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HallPage extends Model
{
    use HasFactory;

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
