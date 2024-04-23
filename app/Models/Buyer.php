<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'about', 'location_id', 'profile_picture'
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
