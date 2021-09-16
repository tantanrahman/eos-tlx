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

    /**
     * @author Tantan 
     * @description get Details from Shipment Details
     * @created 16 Sep 2021
     */
    public static function get_details()
    {
        $items = self::leftjoin('shipment','shipment_details.shipment_id','=','shipment.id')
                    ->select(
                        'shipment_details.id',
                        'shipment.id',
                        'shipment_details.actual_weight',
                        'shipment_details.length',
                        'shipment_details.width',
                        'shipment_details.height',
                        'shipment_details.sum_volume',
                        'shipment_details.sum_weight',
                    );

            return $items->first();
    }
    
}
