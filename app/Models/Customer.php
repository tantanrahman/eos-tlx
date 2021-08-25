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

    // public function countries()
    // {
    //     return $this->hasMany('App\Models\Country');
    // }


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
			customer.created_by
		");

		$items = self::join('city','customer.city_id','=','city.id')
			->select($query)->where('customer.group','=','shipper');

		return $items->get();
	}

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

	//GET APIKEY FOR CUSTOMER
	public static function get_apikey()
	{
		$query = DB::raw("
			customer.name,
			customer.company_name,
			customer.address,
			customer.city_id,
			customer.country_id,
			customer.postal_code,
			customer.phone
		");

		$apikey = self::join('country','customer.country_id','=','country.id')
				->join('city','customer.city_id','=','city.id')
				->select($query);

		return $apikey->get();

	}

	//GET City and Country for Customer
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
}
