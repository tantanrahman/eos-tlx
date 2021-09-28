<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'delivery_intructions',
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

        if (!isset($code->connote)) {
            return $query . '00001';
        }
        return $query . sprintf("%'.05d", (int)str_replace($query, '', $code->connote) + 1);
    }

    /**
     * @author Tantan 
     * @description Get Query For Datatable
     * @created 1 Sep 2021
     */
    public static function get_items($date_start, $date_end, $partner)
    {

        if (Auth::user()->role_id == 11 || Auth::user()->role_id == 9) {
            $items = self::leftjoin('customer', 'shipment.shipper_id', '=', 'customer.id')
                ->leftjoin('customer AS con', 'shipment.consignee_id', '=', 'con.id')
                ->leftjoin('country', 'con.country_id', '=', 'country.id')
                ->leftjoin('country AS neg', 'customer.country_id', '=', 'neg.id')
                ->leftjoin('shipment_details', 'shipment.id', '=', 'shipment_details.shipment_id')
                ->leftjoin('partner', 'shipment.partner_id', '=', 'partner.id')
                ->join('users', 'shipment.marketing_id', '=', 'users.id')
                ->join('users as ac', 'shipment.created_by', '=', 'ac.id')
                ->select('shipment.id AS idx', 'shipment.created_at AS time', 'shipment.connote AS connote', 'con.name AS con_name', 'con.account_code AS con_ac', 'con.address AS con_address', 'con.phone AS con_phone', 'con.city_name AS con_city_name', 'con.postal_code AS con_postal_code', 'con.company_name AS con_company_name', 'neg.name AS ship_cou_name', 'customer.account_code AS ship_ac', 'customer.company_name AS ship_company_name', 'customer.city_name AS ship_city_name', 'customer.postal_code AS ship_postal_code', 'customer.name AS ship_name', 'customer.address AS ship_address', 'customer.phone AS ship_phone', 'customer.account_code AS account_code', 'shipment.description AS description', 'shipment.redoc_connote AS redoc_connote', 'shipment.delivery_intructions AS delivery_intructions', 'shipment.values AS values', 'country.name AS con_cou_name', 'country.alpha2code AS cou_code_dua', 'partner.reff_id AS partner', 'partner.name AS partner_name', 'shipment_details.actual_weight AS actual_weight', 'shipment_details.sum_volume AS sum_volume', 'shipment_details.sum_weight AS weight', 'shipment_details.length AS length', 'shipment_details.width AS width', 'shipment_details.height AS height', 'shipment.created_by AS created', 'ac.username AS ac_username', 'ac.name AS ac_name', 'users.name AS marketing', 'shipment.payment_status AS payment_status', 'shipment.printed AS printed')->orderBy('shipment.created_at', 'DESC')->where('shipment.created_by', Auth::user()->name);
        } else {
            $items = self::leftjoin('customer', 'shipment.shipper_id', '=', 'customer.id')
                ->leftjoin('customer AS con', 'shipment.consignee_id', '=', 'con.id')
                ->leftjoin('country', 'con.country_id', '=', 'country.id')
                ->leftjoin('country AS neg', 'customer.country_id', '=', 'neg.id')
                ->leftjoin('shipment_details', 'shipment.id', '=', 'shipment_details.shipment_id')
                ->leftjoin('partner', 'shipment.partner_id', '=', 'partner.id')
                ->join('users', 'shipment.marketing_id', '=', 'users.id')
                ->join('users as ac', 'shipment.created_by', '=', 'ac.id')
                ->select('shipment.id AS idx', 'shipment.created_at AS time', 'shipment.connote AS connote', 'con.name AS con_name', 'con.account_code AS con_ac', 'con.address AS con_address', 'con.phone AS con_phone', 'con.city_name AS con_city_name', 'con.postal_code AS con_postal_code', 'con.company_name AS con_company_name', 'neg.name AS ship_cou_name', 'customer.account_code AS ship_ac', 'customer.company_name AS ship_company_name', 'customer.city_name AS ship_city_name', 'customer.postal_code AS ship_postal_code', 'customer.name AS ship_name', 'customer.address AS ship_address', 'customer.phone AS ship_phone', 'customer.account_code AS account_code', 'shipment.description AS description', 'shipment.redoc_connote AS redoc_connote', 'shipment.delivery_intructions AS delivery_intructions', 'shipment.values AS values', 'country.name AS con_cou_name', 'country.alpha2code AS cou_code_dua', 'partner.reff_id AS partner', 'partner.name AS partner_name', 'shipment_details.actual_weight AS actual_weight', 'shipment_details.sum_volume AS sum_volume', 'shipment_details.sum_weight AS weight', 'shipment_details.length AS length', 'shipment_details.width AS width', 'shipment_details.height AS height', 'shipment.created_by AS created', 'ac.username AS ac_username', 'ac.name AS ac_name', 'users.name AS marketing', 'shipment.payment_status AS payment_status', 'shipment.printed AS printed')
                ->orderBy('shipment.created_at', 'DESC');
        }

        if (!empty($date_start)) {
            $items->whereDate('shipment.created_at', '>=', $date_start);
        }

        if (!empty($date_end)) {
            $items->whereDate('shipment.created_at', '<=', $date_end);
        }

        if (!empty($partner)) {
            $items->whereIn('partner.id', $partner);
        }

        return $items->get();
    }

    /**
     * @author Tantan 
     * @description Get Query For Preview and Print
     * @created 7 Sep 2021
     */
    public static function get_items_name($id)
    {

        $items = self::leftjoin('customer', 'shipment.shipper_id', '=', 'customer.id')
            ->leftjoin('customer AS con', 'shipment.consignee_id', '=', 'con.id')
            ->leftjoin('country', 'con.country_id', '=', 'country.id')
            ->leftjoin('country AS neg', 'customer.country_id', '=', 'neg.id')
            ->leftjoin('shipment_details', 'shipment.id', '=', 'shipment_details.shipment_id')
            ->leftjoin('partner', 'shipment.partner_id', '=', 'partner.id')
            ->join('users', 'shipment.marketing_id', '=', 'users.id')
            ->join('users as ac', 'shipment.created_by', '=', 'ac.id')
            ->select('shipment.id AS idx', 'shipment.created_at AS time', 'shipment.connote AS connote', 'con.name AS con_name', 'con.account_code AS con_ac', 'con.address AS con_address', 'con.phone AS con_phone', 'con.city_name AS con_city_name', 'con.postal_code AS con_postal_code', 'con.company_name AS con_company_name', 'neg.name AS ship_cou_name', 'customer.account_code AS ship_ac', 'customer.company_name AS ship_company_name', 'customer.city_name AS ship_city_name', 'customer.postal_code AS ship_postal_code', 'customer.name AS ship_name', 'customer.address AS ship_address', 'customer.phone AS ship_phone', 'customer.account_code AS account_code', 'shipment.description AS description', 'shipment.redoc_connote AS redoc_connote', 'shipment.delivery_intructions AS delivery_intructions', 'shipment.values AS values', 'country.name AS con_cou_name', 'country.alpha2code AS cou_code_dua', 'partner.reff_id AS partner', 'partner.name AS partner_name', 'shipment_details.actual_weight AS actual_weight', 'shipment_details.sum_volume AS sum_volume', 'shipment_details.sum_weight AS weight', 'shipment_details.length AS length', 'shipment_details.width AS width', 'shipment_details.height AS height', 'shipment.created_by AS created', 'ac.username AS ac_username', 'ac.name AS ac_name', 'users.username AS marketing', 'shipment.payment_status AS payment_status', 'shipment.printed AS printed')->where('shipment.id', $id);

        return $items->get();
    }



    /**
     * @author Tantan
     * @description Relation for Shipment
     * @created 26 Aug 2021
     */
    public function details()
    {
        return $this->hasMany(ShipmentDetail::class, 'shipment_id', 'id');
    }

    public function tracking()
    {
        return $this->hasMany(TrackingShipment::class, 'shipment_id', 'id');
    }
}
