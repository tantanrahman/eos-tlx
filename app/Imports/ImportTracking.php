<?php

namespace App\Imports;

use App\Models\TrackingShipment;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportTracking implements ToModel, WithStartRow
{

    use Importable;

    //Start Row from Excell
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TrackingShipment([
            'shipment_id'       => TrackingShipment::get_connote(),
            'track_time'        => $row[2],
            'status_eng'        => $row[3],
            'status_ind'        => $row[4],
            'apikey'            => TrackingShipment::get_apikey(),
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s')
        ]);
        
    }


}
