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
}