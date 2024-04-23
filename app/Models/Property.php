<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'address',
        'location_id',
        'landlord_id',
        'subletter_id',
        'type',
        'list_in',
        'sq_yard',
        'price',
        'allow_sublet',
        'bedrooms',
        'bathrooms',
        'kitchens',
        'garages',
        'built_year',
        'uuid',
        'amenities',
        'media',
    ];

    protected $casts = [
        'amenities' => 'json',
        'media' => 'json',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class, 'landlord_id');
    }

    public function subletter()
    {
        return $this->belongsTo(Subletter::class, 'subletter_id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
