<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class PrintController extends Controller
{

    /**
     * @author Tantan
     * @description Print Connote for Shipment
     * @param Shipment $shipment
     * @created 8 September 2021
     */
    public function printConnote(Shipment $shipment)
    {
        $getShipment        = Shipment::get_items_name($shipment->id);
        $getUser            = User::get_items_name($shipment->id);
        
        $pdf = PDF::loadView('pages.admin.shipment.print.connoteresi', compact('getShipment','getUser'))->setPaper('a4','landscape');

        return $pdf->setOptions(['isHtml5ParserEnabled' => false, 'isRemoteEnabled' => true])->stream('Connote-'.$getShipment[0]['connote'].'.pdf');

    }

    /**
     * @author Tantan
     * @description Print Connote for Shipment
     * @param Shipment $shipment
     * @created 8 September 2021
     */
    public function printLabel(Shipment $shipment)
    {
        $getShipment        = Shipment::get_items_name($shipment->id);
        $getUser            = User::get_items_name($shipment->id);
        
        $pdf = PDF::loadView('pages.admin.shipment.print.labelresi', compact('getShipment','getUser'))->setPaper('a4','potrait');

        return $pdf->stream('Label-'.$getShipment[0]['connote'].'.pdf');

    }

    /**
     * @author Tantan
     * @description Print Connote for Shipment
     * @param Shipment $shipment
     * @created 8 September 2021
     */
    public function printInvoice(Shipment $shipment)
    {
        $getShipment        = Shipment::get_items_name($shipment->id);
        $getUser            = User::get_items_name($shipment->id);
        
        $pdf = PDF::loadView('pages.admin.shipment.print.invoiceresi', compact('getShipment','getUser'))->setPaper('a4','potrait');

        return $pdf->stream('Invoice-'.$getShipment[0]['connote'].'.pdf');

    }
}
