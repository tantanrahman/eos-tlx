<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrackingShipment extends Model
{
    use HasFactory;

    protected $table = 'tracking_shipment';

    protected $fillable = [
        'shipment_id',
        'track_time',
        'status_eng',
        'status_ind',
        'apikey'
    ];

    //GET APIKEY FOR SHIPMENT
	public static function get_apikey()
	{

		$apikey = self::select('shipment_id','track_time','status_eng','status_ind');

		return $apikey->get();

	}
}