<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partner';

    protected $fillable = [
        'reff_id',
        'name',
        'active'
    ];

    /**
     * @author Tantan
     * @description Multiple Filter Shipment
     * @created 7 Sep 2021
     */
    public static function get_partner_filter()
    {
        $items = self::select('name');

        return $items->get();
    }
}
