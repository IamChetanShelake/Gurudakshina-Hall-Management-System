<?php

namespace App\Models;

use App\Models\Key;
use App\Models\Ideal;
use App\Models\HallImage;
use App\Models\HallEnquiry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hall extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'short_description', 'price', 'description', 'image', 'capacity', 'area'];


    public function images()
    {
        return $this->hasMany(Hall_Image::class);
    }


    public function policy()
    {
        return $this->hasOne(HallPage::class);
    }

    // Relationship with KeyFeature
    public function keys()
    {
        return $this->hasMany(Key::class, 'hall_id');
    }

    // Define relationship with ideals
    public function ideals()
    {
        return $this->hasMany(Ideal::class, 'hall_id');
    }

    public function hallenquirys()
    {
        return $this->hasMany(Hallenquiry::class, 'hall_id');
        // hall (in hallenquirys table) stores hall names instead of hall_id
    }


}
