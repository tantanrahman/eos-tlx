<?php

namespace App\Exports;

use App\Http\Controllers\Admin\ShipmentDetailController;
use App\Models\Shipment;
use App\Models\ShipmentDetail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ShipmentExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return Shipment::all();
    // }

    public function view(): View
    {
        $date_start         = (!empty($_GET['date_start']) ? $_GET['date_start'] : '');
        $date_end           = (!empty($_GET['date_end']) ? $_GET['date_end'] : '');
        $partner            = (!empty($_GET['partner']) ? $_GET['partner'] : '');
        $shipments          = Shipment::get_items($date_start, $date_end, $partner);

        return view('pages.admin.shipment.export', compact('shipments'));
    }
}
