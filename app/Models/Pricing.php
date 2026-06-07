<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $guarded = ['id'];

    public function transportMode()
    {
        return $this->belongsTo(TransportMode::class);
    }

    public function fromLocation()
    {
        return $this->belongsTo(Location::class, 'from_location_id');
    }
    
    public function toLocation()
    {
        return $this->belongsTo(Location::class, 'to_location_id');
    }
}
