<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $guarded = ['id'];

    public function transportMode()
    {
        return $this->belongsTo(TransportMode::class, 'transport_mode_id');
    }
}
