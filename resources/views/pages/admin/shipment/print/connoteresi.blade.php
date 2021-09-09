<style>
    th, td {
    }
    tr {
        page-break-inside:avoid;
    }
    @page {
        margin: 1;
    }
    body {
        padding: 1;
        margin: 1;
    }
</style>
{{-- <table>
    <tr>
        <td rowspan="3"><img src="{{ asset('img/tlx_logo.png') }}" style="width:90;"></td>
        <td width=10></td>
        <th>{{ $getUser->op_name }}</th>
    </tr>
    <tr>
        <td width=10></td>
        <td style="font-size: 8;">{{ $getUser->op_address }}</td>
    </tr>
    <tr>
        <td width=10></td>
        <td style="font-size: 8;">{{ $getUser->op_address }}</td>
    </tr>
</table> --}}

@foreach ($getShipment as $index => $items)
<table border="1" cellpadding="1" style="width: 100%" cellpadding="300">
    <tr>
        <th style="background-color: gray; width:50%; text-align: center;">A. SHIPPER</th>
        <th style="text-align: center;">CONSIGNMENT NOTE</th>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td>A.1. Account</td>
                    <td>:</td>
                    <td>{{ $items['ship_ac'] }} / {{ $getUser->username }}</td>
                </tr>
                <tr>
                    <td>A.2. Name</td>
                    <td>:</td>
                    <td>{{ $items['ship_name'] }} / {{ $getUser->username }}</td>
                </tr>
                <tr>
                    <td>A.3. Address</td>
                    <td>:</td>
                    <td>{{ $items['ship_address'] }}</td>
                </tr>
                <tr>
                    <td>A.4. Phone</td>
                    <td>:</td>
                    <td>{{ $items['ship_phone'] }}</td>
                </tr>
            </table>
        </td>
        <td style="border-top-color: white">
            <center>
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                $items->connote, 'C39')}}" height="45" width="200">
                <br>
                <div style="word-spacing: 10px">{{ $items['connote'] }}</div>
            </center>
        </td>
    </tr>
    <tr>
        <th style="background-color: gray; text-align: center;">B. CONSIGNEE</th>
        <th style="background-color: gray; text-align: center;">D. AUTHORIZATION</th>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td>B.1. Name</td>
                    <td>:</td>
                    <td>{{ $items['con_name'] }}</td>
                </tr>
                <tr>
                    <td>B.2. Address</td>
                    <td>:</td>
                    <td>{{ $items['con_address'] }}</td>
                </tr>
                <tr>
                    <td>B.3. Phone</td>
                    <td>:</td>
                    <td>{{ $items['con_phone'] }}</td>
                </tr>
            </table>
        </td>
        <td rowspan="3" style="border-top-color: white; font-size:6; padding-bottom: -1% !important; padding-right:10px !important; text-align: justify;">
            <ul>
                <li>
                    SAAT PENGIRIM MENGGUNAKAN JASA <b>{{ $getUser->op_name }}</b> BERARTI BAIK PENGIRIM, PENERIMA, DAN ATAU SEMUA PIHAK YANG BERKEPENTINGAN TERHADAP BARANG KIRIMAN TERSEBUT SEPAKAT UNTUK MENYETUJUI SYARAT DAN KETENTUAN YANG BERLAKU DI <b>{{ $getUser->op_name }}</b>.
                </li>
                <li>
                    DILARANG UNTUK MENGIRIM BINATANG HIDUP, UANG TUNAI, SURAT-SURAT BERHARGA,PERHIASAN MEWAH DAN BARANG –BARANG BERHARGA, SENJATA API/TAJAM, NARKOTIKA DAN OBAT-OBATAN TERLARANG, BARANG-BARANG BERACUN, BARANG MUDAH MELEDAK, BARANG-BARANG TERLARANG DAN ATAU YANG MELANGGAR HUKUM DINEGARA ASAL ATAU NEGARA TUJUAN.
                </li>
                <li>
                    ISI BARANG YANG DIKIRIM SEPENUHNYA MENJADI TANGGUNG JAWAB PIHAK PENGIRIM.
                </li>
                <li>
                    <b>{{ $getUser->op_name }}</b> TIDAK BERTANGGUNG JAWAB ATAS SEGALA RESIKO YANG TERJADI SELAMA PROSES PENGIRIMAN BARANG YANG MENYEBABKAN BARANG YANG DIKIRIM MENGALAMI KERUSAKAN SEHINGGA TIDAK BERFUNGSI ATAU BERUBAH FUNGSINYA, BARANG YANG DIKIRIM  MENGALAMI KETERLAMBATAN SEHINGGA MENGHAMBAT/MEMPENGARUHI SITUASI KONDISI TERTENTU, BARANG YANG DIKIRIM DITAHAN/DISITA OLEH INSTANSI PEMERINTAH DINEGARA  ASAL  ATAU NEGARA TUJUAN.
                </li>
                <li>
                    <b>{{ $getUser->op_name }}</b> AKAN BERTANGGUNG JAWAB DENGAN MELAKUKAN PENGGANTIAN SEBESAR NILAI BARANG YANG DI DEKLARASIKAN PADA RESI PENGIRIMAN ATAU MAKSIMUM Rp. 1.000.000,- (SATU JUTA RUPIAH) DAN SEBESAR ONGKOS KIRIM YANG SUDAH DIBAYARKAN ATAU MAKSIMUM Rp.1.000.000,- (SATU JUTA RUPIAH) BILAMANA TERJADI KEHILANGAN YANG SUDAH TERKONFIRMASI ATAS BARANG YANG DIKIRIM.
                </li>
                <li>
                    UNTUK KIRIMAN DENGAN NILAI BARANG TERTENTU YANG DIANGGAP BERNILAI OLEH PENGIRIM, PENGIRIM DISARANKAN MENGASURANSIKAN BARANG KIRIMANNYA DENGAN MENGHUBUNGI PERUSAHAAN ASURANSI YANG MENYEDIAKAN ASURANSI YANG DIPERLUKAN PENGIRIM ATAS BARANG KIRIMANNYA.
                </li>
            </ul>
        </tdr>
    </tr>
    <tr>
        <td style="background-color: gray; height:0px !important; text-align: center;"><b>C. GOODS</b></td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td>C.1. Description</td>
                    <td>:</td>
                    <td>{{ $items['description'] }}</td>
                </tr>
                <tr>
                    <td>C.2. Total Package</td>
                    <td>:</td>
                    <td>@php
                        echo count($getShipment)
                    @endphp</td>
                </tr>
                <tr>
                    <td>C.3. Quantity</td>
                    <td>:</td>
                    <td>@php
                        echo $index + 1
                    @endphp of @php
                        echo count($getShipment)
                    @endphp</td>
                </tr>
                <tr>
                    <td>C.4. Value</td>
                    <td>:</td>
                    <td>{{ $items['values'] }}</td>
                </tr>
                <tr>
                    <td>C.5. Actual Weight</td>
                    <td>:</td>
                    <td>{{ $items['actual_weight'] }}</td>
                </tr>

                <tr>
                    <td>C.6. Volumetric</td>
                    <td>:</td>
                    <td>{{ $items['sum_volume']/5000 }}</td>
                </tr>

                <tr>
                    <td>C.7. Chargeable Weight</td>
                    <td>:</td>
                    <td>
                        @if ($items['sum_volume']/5000 >= $items['actual_weight'])
                            {{ $items['sum_volume']/5000 }}
                        @else
                            {{ $items['actual_weight'] }}
                        @endif
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="border-top-style: hidden; mt:3;">
            <table class="center" border="1" style="width: 100%; solid black; margin-left: 10; margin-right: 10;">
                <tr>
                    <th><b>Quantity</b></th>
                    <th><b>Length</b></th>
                    <th><b>Width</b></th>
                    <th><b>Height</b></th>
                </tr>
            
                @foreach ($getShipment as $index => $details)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $details['length'] }} cm</td>
                        <td>{{ $details['width'] }} cm</td>
                        <td>{{ $details['height'] }} cm</td>
                    </tr>
                @endforeach
            </table>
        </td>
        <td style="background-color: gray; text-align: center;"><b>E. DELIVERY INSTRUCTIONS</b></td>
    </tr>
    <tr>
        <td rowspan="2" style="text-align: center; font-size:14; border-top-style: hidden"><b>{{ $items->partner }}</b></td>
        <td>{{ $items['delivery_intructions'] }}</td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td width="10"></tdw>
                    <td>
                        <b>SHIPPER'S SIGNATURE</b>
                        <br />
                        <br />
                        <br />
                        <br />
                        <b>DATE: {{ date('Y-m-d') }}</b><br />
                        <b>TIME: {{ date('H:i:s') }}</b>
                    </td>
                    
                    <td>
                        <b>CONSIGNEE'S SIGNATURE</b>
                        <br />
                        <br />
                        <br />
                        <br />
                        <b>DATE: </b><br />
                        <b>TIME: </b>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
@endforeach
