<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagpackage extends Model
{
    use HasFactory;

    protected $table = 'bagpackage';

    protected $fillable = [
        'name'
    ];
}
