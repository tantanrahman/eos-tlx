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
        'courier_id',
        'jenis_barang',
        'berat',
        'city',
        'users_id',
        'photo'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function couriers()
    {
        return $this->belongsTo('App\Models\Courier');
    }

    public function cities()
    {
        return $this->belongsTo('App\Models\City');
    }
}
