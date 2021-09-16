<html>
<head>
    <title>Shipment | Connote</title>
    <link rel="stylesheet" href="{{ asset('dist/css/print_style.css') }}">
</head>
<body style="background-image: url('img/tlx_logo.png')">
<header>
    <table cellpadding="1" cellspacing="0" style="width:100%">
        <tr>
            <td width="100" rowspan="3"><img src="{{ url("storage/officeprofile/".$getUser[0]->photo ?? url('public/img/tlx_logo.png'))}}" style="width:90;"></td>
            <th style="text-align: left">{{ $getUser[0]->op_name }}</th>
        </tr>
        <tr>
            <td style="font-size: 8;">{{ $getUser[0]->op_address }}</td>
        </tr>
        <tr>
            <td style="font-size: 8;">Phone: {{ $getUser[0]->phone }}</td>
        </tr>
    </table>
</header>
<main>
@foreach ($getShipment as $index => $items)
<table border="1" style="width: 100%" cellpadding="3" cellspacing="0" class="page-break">
    <tr>
        <th style="text-align: left; background-color: gray; width:50%;">A. SHIPPER</th>
        <th style="text-align: center; border-bottom-style: hidden;">CONSIGNMENT NOTE</th>
    </tr>
    <tr>
        <td>
            <table style="width: 100%">
                <tr>
                    <td width="100">A.1. Account</td>
                    <td width="10">:</td>
                    <td>{{ $items['ship_ac'] }} / {{ $getUser[0]->created }}</td>
                </tr>
                <tr>
                    <td>A.2. Name</td>
                    <td>:</td>
                    <td>{{ $items->ship_company_name === null ? $items['ship_name'] ." / ". $items->marketing : $items->ship_company_name ." / ". $items['ship_name'] ." / ". $items->marketing }}</td>
                </tr>
                <tr>
                    <td>A.3. Address</td>
                    <td>:</td>
                    <td>{{ $items['ship_address'] }} {{ $items['ship_city_name'] }} {{ $items['ship_cou_name'] }}</td>
                </tr>
                <tr>
                    <td>A.4. Postal Code</td>
                    <td>:</td>
                    <td>{{ $items['ship_postal_code'] }}</td>
                </tr>
                <tr>
                    <td>A.5. Phone</td>
                    <td>:</td>
                    <td>{{ $items['ship_phone'] }}</td>
                </tr>
            </table>
        </td>
        <td style="border-top-style: hidden">
            <center>
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                $items->connote, 'C93')}}" height="58" width="300">
                {{-- <img src="data:image/png;base64, {{ DNS1D::getBarcodePNG($items->connote, 'C93',5,55,array(5,5,5), true) }}" alt="barcode" height="40" width="500"/> --}}
                <br>
                <div class="letter-space">
                    <b>
                        {{ $items['connote'] }}
                    </b>
                </div>
            </center>
        </td>
    </tr>
    <tr>
        <th style="text-align: left; background-color: gray;">B. CONSIGNEE</th>
        <th style="text-align: left; background-color: gray;">D. AUTHORIZATION</th>
    </tr>
    <tr>
        <td>
            <table style="width: 100%">
                <tr>
                    <td width="100">B.1. Name</td>
                    <td width="10">:</td>
                    <td>{{ $items['con_name'] }}</td>
                </tr>
                <tr>
                    <td>B.2. Address</td>
                    <td>:</td>
                    <td>{{ $items['con_address'] }} {{ $items['con_city_name'] }} {{ $items['con_cou_name'] }}</td>
                </tr>
                <tr>
                    <td>B.3. Postal Code</td>
                    <td>:</td>
                    <td>{{ $items['con_postal_code'] }}</td>
                </tr>
                <tr>
                    <td>B.4. Phone</td>
                    <td>:</td>
                    <td>{{ $items['con_phone'] }}</td>
                </tr>
            </table>
        </td>
        <td rowspan="3" style="border-top-color: white; font-size:7; padding-bottom: -7% !important; padding-top: -1% !important; padding-right:20px !important; text-align: justify;">
            <ul>
                <li>
                    SAAT PENGIRIM MENGGUNAKAN JASA <b>{{ $getUser[0]->op_name }}</b> BERARTI BAIK PENGIRIM, PENERIMA, DAN ATAU SEMUA PIHAK YANG BERKEPENTINGAN TERHADAP BARANG KIRIMAN TERSEBUT SEPAKAT UNTUK MENYETUJUI SYARAT DAN KETENTUAN YANG BERLAKU DI <b>{{ $getUser[0]->op_name }}</b>.
                </li>
                <li>
                    DILARANG UNTUK MENGIRIM BINATANG HIDUP, UANG TUNAI, SURAT-SURAT BERHARGA,PERHIASAN MEWAH DAN BARANG –BARANG BERHARGA, SENJATA API/TAJAM, NARKOTIKA DAN OBAT-OBATAN TERLARANG, BARANG-BARANG BERACUN, BARANG MUDAH MELEDAK, BARANG-BARANG TERLARANG DAN ATAU YANG MELANGGAR HUKUM DINEGARA ASAL ATAU NEGARA TUJUAN.
                </li>
                <li>
                    ISI BARANG YANG DIKIRIM SEPENUHNYA MENJADI TANGGUNG JAWAB PIHAK PENGIRIM.
                </li>
                <li>
                    <b>{{ $getUser[0]->op_name }}</b> TIDAK BERTANGGUNG JAWAB ATAS SEGALA RESIKO YANG TERJADI SELAMA PROSES PENGIRIMAN BARANG YANG MENYEBABKAN BARANG YANG DIKIRIM MENGALAMI KERUSAKAN SEHINGGA TIDAK BERFUNGSI ATAU BERUBAH FUNGSINYA, BARANG YANG DIKIRIM  MENGALAMI KETERLAMBATAN SEHINGGA MENGHAMBAT/MEMPENGARUHI SITUASI KONDISI TERTENTU, BARANG YANG DIKIRIM DITAHAN/DISITA OLEH INSTANSI PEMERINTAH DINEGARA  ASAL  ATAU NEGARA TUJUAN.
                </li>
                <li>
                    <b>{{ $getUser[0]->op_name }}</b> AKAN BERTANGGUNG JAWAB DENGAN MELAKUKAN PENGGANTIAN SEBESAR NILAI BARANG YANG DI DEKLARASIKAN PADA RESI PENGIRIMAN ATAU MAKSIMUM Rp. 1.000.000,- (SATU JUTA RUPIAH) DAN SEBESAR ONGKOS KIRIM YANG SUDAH DIBAYARKAN ATAU MAKSIMUM Rp.1.000.000,- (SATU JUTA RUPIAH) BILAMANA TERJADI KEHILANGAN YANG SUDAH TERKONFIRMASI ATAS BARANG YANG DIKIRIM.
                </li>
                <li>
                    UNTUK KIRIMAN DENGAN NILAI BARANG TERTENTU YANG DIANGGAP BERNILAI OLEH PENGIRIM, PENGIRIM DISARANKAN MENGASURANSIKAN BARANG KIRIMANNYA DENGAN MENGHUBUNGI PERUSAHAAN ASURANSI YANG MENYEDIAKAN ASURANSI YANG DIPERLUKAN PENGIRIM ATAS BARANG KIRIMANNYA.
                </li>
            </ul>
        </tdr>
    </tr>
    <tr>
        <td style="background-color: gray; height:0px !important;"><b>C. GOODS</b></td>
    </tr>
    <tr>
        <td>
            <table style="width: 100%">
                <tr>
                    <td width="150">C.1. Description</td>
                    <td width="10">:</td>
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
                    <td>{{ number_format($items['actual_weight'], 2, '.', '') }} kg</td>
                </tr>

                <tr>
                    <td>C.6. Volumetric</td>
                    <td>:</td>
                    <td>{{ number_format($items['sum_volume']/5000, 2, '.', '') }} kg</td>
                </tr>

                <tr>
                    <td>C.7. Chargeable Weight</td>
                    <td>:</td>
                    <td>
                        @if ($items['sum_volume']/5000 >= $items['actual_weight'])
                            {{ number_format($items['sum_volume']/5000, 2, '.', '') }} kg
                        @else
                            {{ number_format($items['actual_weight'], 2, '.', '') }} kg
                        @endif
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td rowspan="3" style="border-top-style: hidden;">
            <table class="center" border="1" style="width: 100%; solid black; margin-left: 10; margin-right: 10;" cellpadding="3">
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
            <p style="text-align: center; font-size:14; border-top-style: hidden"><b>{{ $items->partner }}</b></p>
        </td>
        <td style="background-color: gray;"><b>E. DELIVERY INSTRUCTIONS</b></td>
        
    </tr>
    <tr>
        
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
@endforeach
</main>
</body>
</html>