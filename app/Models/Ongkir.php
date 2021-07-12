<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    use HasFactory;

    protected $table = 'ongkir';

    protected $fillable = [
        'packagetype_id',
        'country_id',
        'customer_id',
        'price',
        'modal',
        'estimation',
        'estimation_detail',
        'remark',
        'active'
    ];

    public static function get_items()
    {
        $items = self::join('packagetype','ongkir.packagetype_id','=','packagetype.id')
                    ->join('country','ongkir.country_id','=','country.id')
                    ->select(
                        'ongkir.id as idx',
                        'packagetype.name as packagetypes',
                        'country.name as countries',
                        'ongkir.price as prices',
                        'ongkir.active as status'
                    );

        return $items->get();
    }

    
}
