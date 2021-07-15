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
		'postalcode_id',
		'api_passowrd',
		'credit',
		'created_by'
    ];

    // public function countries()
    // {
    //     return $this->hasMany('App\Models\Country');
    // }

	// public static function get_customer_id($query)
	// {

	// 	$query = '622' . date('ym');

	// 	$code = self::where('account_code', 'LIKE', "{$query}%")
	// 		->orderBy('account_code', 'desc')
	// 		->select('account_code')
	// 		->first();

	// 	if ( ! isset($code->account_code))
	// 	{
	// 		return $query . '000001';
	// 	}

	// 	return $query . sprintf("%'.08d", (int)str_replace($query, '', $code->account_code) + 1);
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

		return $query . sprintf("%'.05d", (int)str_replace($query, '', $code->account_code) + 1);
	}

	public static function get_items_shipper()
	{
		$query = DB::raw("
			customer.id,
			customer.account_code,
			customer.name,
			IF(customer.group = 'shipper', city.city, '') as city,
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
			customer.country_name,
			customer.phone,
			customer.group,
			customer.created_by
		");

		$items = self::join('country','customer.country_id','=','country.id')
			->select($query)->where('customer.group','=','consignee');

		return $items->get();
	}
}
