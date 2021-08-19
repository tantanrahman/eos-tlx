<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShipmentDetail extends Model
{
    use HasFactory;

    protected $table = 'shipment_details';

    protected $fillable = [
        'shipment_id',
        'actual_weight',
        'length',
        'width',
        'height',
        'sum_volume',
        'sum_weight'
    ];

    public static function get_details()
    {
        $query = DB::raw(
            "shipment_details.actual_weight",
            "shipment_details.length",
            "shipment_details.width",
            "shipment_details.height",
            "shipment_details.volume",
            "shipment_details.total_weight",
        );

        $items = self::select($query);

        return $items->get();
    }
}
