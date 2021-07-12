<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupUser extends Model
{
    use HasFactory;

    protected $table = 'pickuplistuser';

    protected $fillable = [
        'name',
        'jalur',
        'active'
    ];
}
