<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'city';

    protected $fillable = [
        'province',
        'city',
        'district',
        'urban',
        'postal_code'
    ];

    public function dropships()
    {
        return $this->hasMany('App\Models\Dropship');
    }
}
