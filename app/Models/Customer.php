<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
		'account_code',
		'name',
		'company_name',
		'address',
		'city_id',
		'city_name',
		'country_id',
		'country_name',
		'phone',
		'group',
		'postal_code',
		'apikey',
		'api_passowrd',
		'credit',
		'created_by'
    ];
	
	/** 
	 * @author Tantan
	 * @description Get ID Customer
	 * @created 1 Sep 2021
	*/
	public static function get_customer_id($query)
	{

		$code = self::where('account_code', 'LIKE', "{$query}%")
			->orderBy('account_code', 'desc')
			->select('account_code')
			->first();

		if ( ! isset($code->account_code))
		{
			return $query . '000001';
		}

		return $query . sprintf("%'.06d", (int)str_replace($query, '', $code->account_code) + 1);
	}

	/**
	 * @author Tantan
	 * @description Get ID for Next Customer
	 * @created 1 Sep 2021
	 */
	public static function get_id_shipment()
	{
		
	}

	/**
	 * @author Tantan 
	 * @description Get Query for Shipper
	 * @created 28 Aug 2021
	 */
	public static function get_items_shipper()
	{
		$query = DB::raw("
			customer.id,
			customer.account_code,
			customer.name,
			customer.city_name,
			customer.country_name,
			customer.phone,
			customer.group,
			customer.created_by,
			customer.created_at
		");

		$items = self::join('city','customer.city_id','=','city.id')
			->select($query)->where('group','=','shipper');

		return $items->get();
	}

	/**
	 * @author Tantan 
	 * @description Get Query for Consignee
	 * @created 28 Aug 2021
	 */
	public static function get_items_consignee()
	{
		$query = DB::raw("
			customer.id,
			customer.account_code,
			customer.name,
			customer.city_name,
			customer.country_name,
			customer.phone,
			customer.group,
			customer.created_by
		");

		$items = self::join('country','customer.country_id','=','country.id')
			    ->select($query)->where('customer.group','=','consignee');

		return $items->get();
	}

	/**
	 * @author Tantan 
	 * @description Generate apikey for unique code Customer
	 * @created 26 Aug 2021
	 */
	public static function get_apikey()
	{

		$code = substr(strftime("%Y", time()),2);
		return $code;

	}

	/**
	 * @author Tantan
	 * @description Get Names for City and Country
	 * @param [type] $id
	 * @created 26 Aug 2021
	 */
	public static function get_items_name($id)
	{
		$items_name = self::leftjoin('city','customer.city_id','=','city.id')
				    ->leftjoin('country','customer.country_id','=','country.id')
				    ->select(
					  'customer.id',
					  'customer.account_code',
					  'customer.city_id',
					  'customer.city_name',
					  'customer.country_id',
					  'customer.country_name'
				  )->where('customer.id', $id);

		return $items_name->first();
	}

	/**
	 * @author Tantan
	 * @decription Get Next ID from Auto Increments
	 * @created 2 Sep 2021
	 */
	public static function next_id()
	{
		$id = DB::select("SHOW TABLE STATUS LIKE 'customer'");
		$next_id = $id[0]->Auto_increment;

		return $next_id;

	}
	

	/**
	 * @author Tantan
	 * @description Relation for Customer
	 * @created 26 Aug 2021
	 */
	public function shipper()
	{
		return $this->hasMany(Shipment::class, 'shipper_id','id');
	}

	public function consignee()
	{
		return $this->hasMany(Shipment::class, 'consignee_id','id');
	}
}
