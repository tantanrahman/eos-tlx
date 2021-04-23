<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [

    ];

    // public function countries()
    // {
    //     return $this->hasMany('App\Models\Country');
    // }
}
