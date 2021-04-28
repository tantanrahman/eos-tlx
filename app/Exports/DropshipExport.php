<?php

namespace App\Exports;

use App\Models\Dropship;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DropshipExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     $dropships = Dropship::join('users','dropship.users_id','=','users.id')
    //                             ->join('courier','dropship.courier_id','=','courier.id')
    //                             ->join('city','dropship.city','=','city.id')
    //                             ->select('dropship.created_at AS time','dropship.resi','courier.name as courier','dropship.name AS dname','dropship.jenis_barang','dropship.berat','city.city as cities','users.name')->get();
    //     return $dropships;
    // }

    // public function headings(): array
    // {
    //     return[
    //         "Date",
    //         "Resi",
    //         "Courier",
    //         "Name",
    //         "Category",
    //         "Weight",
    //         "City",
    //         "Marketing"
    //     ];
    // }

    // public function styles(Worksheet $sheet)
    // {
    //     return[
    //         1 => ['font' => ['bold' => true]]
    //     ];
    // }

    public function view(): View
    {
        return view('pages.admin.dropship.export', [
            'dropships' => Dropship::join('users','dropship.users_id','=','users.id')
                                        ->join('courier','dropship.courier_id','=','courier.id')
                                         ->join('city','dropship.city','=','city.id')
                                         ->select('dropship.created_at AS time','dropship.resi','courier.name as courier','dropship.name AS dname','dropship.jenis_barang','dropship.berat','city.city as cities','users.name as marketing')->whereDate('dropship.created_at', Carbon::today())->get()
        ]);
    }
}
