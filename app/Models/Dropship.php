<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dropship extends Model
{
    use HasFactory;

    protected $table = 'dropship';

    protected $fillable = [
        'resi',
        'name',
        'jenis_barang',
        'berat',
        'city',
        'users_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
