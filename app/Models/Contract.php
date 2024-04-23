<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'landlord_id',
        'buyer_id',
        'property_id',
        'landlord_signature',
        'buyer_signature',
        'list_in',
        'from',
        'to',
        'uuid',
        'status'
    ];

    public function landlord()
    {
        return $this->belongsTo(Landlord::class, 'landlord_id');
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
