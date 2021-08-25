<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $table = 'shipment';

    protected $fillable = [
        'shipper_id',
        'consignee_id',
        'packagetype_id',
        'marketing_id',
        'partner_id',
        'connote',
        'values',
        'amount',
        'redoc_connote',
        'redoc_params',
        'kpi',
        'kpi_created_at',
        'modal',
        'payment_method',
        'payment_status',
        'payment_created_at',
        'delivery_instruction',
        'remark',
        'printed',
        'description',
        'created_by'
    ];

    /**
     * Generate for Connote in Shipment
     * 
     */
    public static function get_connote($query)
	{

		$query = '622' . date('ym');
		$code = self::where('connote', 'LIKE', "{$query}%")
			->orderBy('connote', 'desc')
			->select('connote')
			->first();

		if ( ! isset($code->connote))
		{
			return $query . '00001';
		}
		return $query . sprintf("%'.05d", (int)str_replace($query, '', $code->connote) + 1);
	}


    /**
     * Relation for Shipment and Details
     */
    public function details()
    {
        return $this->hasMany(ShipmentDetail::class, 'shipment_id','id');
    }

    /**
     * Relation for Shipment and Tracking
     */
    public function tracking()
    {
        return $this->hasMany(TrackingShipment::class, 'shipment_id','id');
    }

    public static function get_items()
    {
        $items = self::join('customer','shipment.consignee_id','=','customer.id')
                    ->join('customer AS sh','sh.id','=','shipment.shipper_id')
                    ->join('country','country.id','=','customer.country_id')
                    ->join('shipment_details','shipment.id','=','shipment_details.id')
                    ->join('users','shipment.marketing_id','=','users.id')
                    ->select('shipment.created_at AS time','shipment.connote AS connote','sh.name AS ship_name','customer.name AS con_name','shipment.description AS description','country.name AS cou_name','shipment_details.sum_weight AS weight','shipment.created_by AS created','users.name AS marketing','shipment.payment_status AS payment_status','shipment.printed AS printed');

        return $items->get();
    }
}