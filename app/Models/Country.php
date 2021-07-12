<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'country';

    protected $fillable = [
        'name',
        'alpha2code',
        'alpha3code'
    ];

    public function customers()
    {
        $this->belongsToMany('App\Models\Customer');
    }

    public static function get_country_name()
    {
        $country_name = self::join('country','ongkir.country_id','=','country.id')
                        ->select(
                            'country.name as countries'
                        );

        return $country_name->get();
    }
}
