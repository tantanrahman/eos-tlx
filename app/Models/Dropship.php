<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dropship extends Model
{
    use HasFactory;

    protected $table = 'dropship';

    protected $fillable = [
        'resi',
        'name',
        'courier_id',
        'jenis_barang',
        'berat',
        'city',
        'users_id',
        'photo'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function couriers()
    {
        return $this->belongsTo('App\Models\Courier');
    }

    public function cities()
    {
        return $this->belongsTo('App\Models\City');
    }

    public static function get_items($date_start, $date_end, $get_courier)
	{
		$items = self::join('users','dropship.users_id','=','users.id')
			->join('courier','dropship.courier_id','=','courier.id')
			->join('city','dropship.city','=','city.id')
			->select(
				'dropship.id as idx',
				'dropship.created_at AS time',
				'dropship.resi as resis',
				'dropship.name AS names',
				'courier.name as couriers',
				'dropship.jenis_barang as category',
				'dropship.berat as weight',
				'city.city as cities',
				'users.name as users',
				'dropship.photo',
				'courier.active as status'
			);

		if ( ! empty($date_start))
		{
			$items->whereDate('dropship.created_at', '>=', $date_start);
		}

		if ( ! empty($date_end))
		{
			$items->whereDate('dropship.created_at', '<=', $date_end);
		}

		if ( ! empty($get_courier))
		{
			$items->where('courier.active', '=', 1);

			return $items->first();
		}

		return $items->get();
	}

	public static function get_items_name($id)
	{
		$items_name = self::join('users','dropship.users_id','=','users.id')
			->join('courier','dropship.courier_id','=','courier.id')
			->join('city','dropship.city','=','city.id')
			->select(
				'dropship.id as idx',
				'dropship.created_at AS time',
				'dropship.resi as resis',
				'dropship.name AS names',
				'courier.name as couriers',
				'dropship.jenis_barang as category',
				'dropship.berat as weight',
				'city.city as cities',
				'users.name as users',
				'dropship.photo'
			)->where('dropship.id',$id);

		return $items_name->first();
	}
	
}
