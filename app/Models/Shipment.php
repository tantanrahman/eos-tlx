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
     * @author Tantan
     * @description Generate for Connote in Shipment
     * @created 1 Sep 2021
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
     * @author Tantan 
     * @description Get Query For Datatable
     * @created 1 Sep 2021
     */
    public static function get_items($idx)
    {

        $items = self::leftjoin('customer','shipment.shipper_id','=','customer.id')
                     ->leftjoin('customer AS con','shipment.consignee_id','=','con.id')
                     ->leftjoin('country','con.country_id','=','country.id')
                     ->leftjoin('shipment_details','shipment.id','=','shipment_details.shipment_id')
                     ->join('users','shipment.marketing_id','=','users.id')
                     ->select('shipment.id AS idx','shipment.created_at AS time','shipment.connote AS connote','con.name AS con_name','customer.name AS ship_name','customer.address AS ship_address','customer.account_code AS account_code','shipment.description AS description','country.name AS cou_name','shipment_details.sum_weight AS weight','shipment.created_by AS created','users.name AS marketing','shipment.payment_status AS payment_status','shipment.printed AS printed');

        return $items->get($idx);
    }

    /**
     * @author Tantan
     * @description Relation for Shipment
     * @created 26 Aug 2021
     */
    public function details()
    {
        return $this->hasMany(ShipmentDetail::class, 'shipment_id','id');
    }

    public function tracking()
    {
        return $this->hasMany(TrackingShipment::class, 'shipment_id','id');
    }
}