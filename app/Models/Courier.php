<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    protected $table = 'courier';

    protected $fillable = [
        'reff_id',
        'name',
        'website',
        'active'
    ];

    public function dropships()
    {
        return $this->hasMany('App\Models\Dropship');
    }
}
