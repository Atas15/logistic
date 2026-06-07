<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransportMode extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function pricings()
    {
        return $this->hasMany(Pricing::class, 'transport_mode_id');
    }

    public function shipments(): HasMany
    {
        return $this->hasMany(Shipment::class, 'transport_mode_id');
    }

    public function getName()
    {
        return $this->id . ' ' . $this->code;
    }

}
