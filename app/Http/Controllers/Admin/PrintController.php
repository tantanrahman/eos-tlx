<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Customer;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Models\ShipmentDetail;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
        
        $pdf = PDF::loadView('pages.admin.shipment.print.printconnote', compact('getShipment','getUser'))->setPaper('a4','landscape');

        return $pdf->setOptions(['isHtml5ParserEnabled' => false, 'isRemoteEnabled' => true])->stream('Connote-'.$getShipment[0]['connote'].'.pdf');

    }

    /**
     * @author Tantan
     * @description Print Label for Shipment
     * @param Shipment $shipment
     * @created 8 September 2021
     */
    public function printLabel(Shipment $shipment)
    {
        $getShipment        = Shipment::get_items_name($shipment->id);
        $getUser            = User::get_items_name($shipment->id);
        
        $pdf = PDF::loadView('pages.admin.shipment.print.printlabel', compact('getShipment','getUser'))->setPaper('a4','potrait');

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
        
        $pdf = PDF::loadView('pages.admin.shipment.print.printinvoice', compact('getShipment','getUser'))->setPaper('a4','potrait');

        return $pdf->stream('Invoice-'.$getShipment[0]['connote'].'.pdf');

    }

    /**
     * @author Tantan
     * @description Print GDEX API
     * @param Shipment $shipment
     * @created 12 Sep 2021
     */
    public function printgdexDev($id)
    {

        $data       = Shipment::where('id', $id)->first();
        $dataDetail = ShipmentDetail::where('shipment_id', $id)->get();
        $consignee  = Customer::where('id', $data->consignee_id)->first();
        $create     = Http::withHeaders([
            'ApiToken' => 'D9eee80b-a1fd-4ee7-b20c-08c0b98b874a',
            'Subscription-Key' => '69ec39d5951c48d9a2bd7d12a4b698c2'
        ])->post('https://myopenapi.gdexpress.com/api/demo/prime/CreateConsignment', [[
            'shipmentType' => "Parcel",
            'totalPiece' => $dataDetail->count(),
            'shipmentWeight' => $dataDetail->sum('actual_weight'),
            'isDangerousGoods' => true,
            'companyName' => $consignee->company_name,
            'receiverName' => $consignee->name,
            'receiverMobile' => $consignee->phone,
            'receiverAddress1' => $consignee->address,
            'receiverPostcode' => $consignee->postal_code,
            'receiverCountry' => 'Malaysia',
        ]]);

        $get = Http::withHeaders([
            "response-type" => 'arraybuffer',
            'ApiToken' => 'D9eee80b-a1fd-4ee7-b20c-08c0b98b874a',
            'Subscription-Key' => '69ec39d5951c48d9a2bd7d12a4b698c2'
        ])->accept('application/zip')->post('https://myopenapi.gdexpress.com/api/demo/prime/GetConsignmentDocument', $create->collect()['r']);

        $a = $get->getBody();

        $response = new StreamedResponse(function () use ($a) {
            while (!$a->eof()) {
                echo $a->read(8192);
            }
        });

        $response->headers->set('Content-Type', 'application/zip');

        return $response;
    }

    /**
     * @author Tantan
     * @description Print GDEX API
     * @param Shipment $shipment
     * @created 12 Sep 2021
     */
    public function printgdexprod($id)
    {

        $data       = Shipment::where('id', $id)->first();
        $dataDetail = ShipmentDetail::where('shipment_id', $id)->get();
        $consignee  = Customer::where('id', $data->consignee_id)->first();
        $create     = Http::withHeaders([
            'ApiToken' => 'D9eee80b-a1fd-4ee7-b20c-08c0b98b874a',
            'Subscription-Key' => '69ec39d5951c48d9a2bd7d12a4b698c2'
        ])->post('https://myopenapi.gdexpress.com/api/demo/prime/CreateConsignment', [[
            'shipmentType' => "Parcel",
            'totalPiece' => $dataDetail->count(),
            'shipmentWeight' => $dataDetail->sum('actual_weight'),
            'isDangerousGoods' => true,
            'companyName' => $consignee->company_name,
            'receiverName' => $consignee->name,
            'receiverMobile' => $consignee->phone,
            'receiverAddress1' => $consignee->address,
            'receiverPostcode' => $consignee->postal_code,
            'receiverCountry' => 'Indonesia',
        ]]);

        $get = Http::withHeaders([
            "response-type" => 'arraybuffer',
            'ApiToken' => 'D9eee80b-a1fd-4ee7-b20c-08c0b98b874a',
            'Subscription-Key' => '69ec39d5951c48d9a2bd7d12a4b698c2'
        ])->accept('application/zip')->post('https://myopenapi.gdexpress.com/api/demo/prime/GetConsignmentDocument', $create->collect()['r']);

        $a = $get->getBody();

        $response = new StreamedResponse(function () use ($a) {
            while (!$a->eof()) {
                echo $a->read(8192);
            }
        });

        $response->headers->set('Content-Type', 'application/zip');

        return $response;
    }
}
