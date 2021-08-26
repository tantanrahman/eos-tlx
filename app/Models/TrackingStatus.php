<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrackingStatus extends Model
{
    use HasFactory;

    protected $table = 'tracking_status';

    protected $fillable = [
        'partner_id',
        'status',
        'active',
        'created_by'
    ];

    public static function get_items_name()
	{
		$items_name = self::join('partner','tracking_status.partner_id','=','partner.id')
			->select(
				'tracking_status.id as id',
                'partner.name as partner_id',
				'tracking_status.status as status',
                'tracking_status.active as active',
                'tracking_status.created_by as created_by',
			);

		return $items_name->get();
	}
}