<style>
    th, td, tr { font-size: 14px; border-collapse: collapse; }
</style>
<table>
    <tr>
        <td rowspan="2"><img src="{{ asset('img/tlx_logo.png') }}" style="width:50%;"></td>
        <td>{{ $getUser->op_name }}</td>
    </tr>
    <tr>
        <td>{{ $getUser->op_address }}</td>
    </tr>
</table>
<table></table>
<table border="1" cellpadding="3">
    <tr>
        <td style="background-color: gray;"><b>A. SHIPPER</b></td>
        <td align="center" style="border-bottom-color: gray;">
            <b>CONSIGNMENT NOTE</b>
            
        </td>
        <td>
            @php
                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            @endphp
            
            {!! $generator->getBarcode($getShipment->connote, $generator::TYPE_CODE_128) !!}
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td width="51">A.1. Account</td>
                    <td width="5">:</td>
                    <td width="225">{{ $getShipment->ship_ac }} / {{ $getUser->username }}</td>
                </tr>
                <tr>
                    <td>A.2. Name</td>
                    <td>:</td>
                    <td>{{ $getShipment->ship_name }} / {{ $getUser->username }}</td>
                </tr>
                <tr>
                    <td>A.3. Address</td>
                    <td>:</td>
                    <td>{{ $getShipment->ship_address }}</td>
                </tr>
                <tr>
                    <td>A.4. Phone</td>
                    <td>:</td>
                    <td>{{ $getShipment->ship_phone }}</td>
                </tr>
            </table>
        </td>
        <td style="border-top-color: white">
        </td>
    </tr>
    <tr>
        <td style="background-color: gray;"><b>B. CONSIGNEE</b></td>
        <td style="background-color: gray;"><b>D. AUTHORIZATION</b></td>
        <tr></tr>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td>B.1. Name</td>
                    <td>:</td>
                    <td>{{ $getShipment->con_name }}</td>
                </tr>
                <tr>
                    <td>B.2. Address</td>
                    <td>:</td>
                    <td>{{ $getShipment->con_address }}</td>
                </tr>
                <tr>
                    <td>B.3. Phone</td>
                    <td>:</td>
                    <td>{{ $getShipment->con_phone }}</td>
                </tr>
            </table>
        </td>
        <td style="font-size: 12px">
            <ol>
                <li>
                    SAAT PENGIRIM MENGGUNAKAN JASA <b>{{ $getUser->op_name }}</b> BERARTI BAIK PENGIRIM, PENERIMA, DAN ATAU SEMUA PIHAK YANG BERKEPENTINGAN TERHADAP BARANG KIRIMAN TERSEBUT SEPAKAT UNTUK MENYETUJUI SYARAT DAN KETENTUAN YANG BERLAKU DI <b>{{ $getUser->op_name }}</b>.
                </li>
                <li>
                    ​​​​DILARANG UNTUK MENGIRIM BINATANG HIDUP, UANG TUNAI, SURAT-SURAT BERHARGA,PERHIASAN MEWAH DAN BARANG –BARANG BERHARGA, SENJATA API/TAJAM, NARKOTIKA DAN OBAT-OBATAN TERLARANG, BARANG-BARANG BERACUN, BARANG MUDAH MELEDAK, BARANG-BARANG TERLARANG DAN ATAU YANG MELANGGAR HUKUM DINEGARA ASAL ATAU NEGARA TUJUAN.
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
            </ol>
        </td>
    </tr>
    <tr>
        <td style="background-color: gray;"><b>C. GOODS</b></td>
    </tr>
    <tr>
        <td style="border-bottom-color: white">
            <table>
                <tr>
                    <td width="96">C.1. Description</td>
                    <td width="5">:</td>
                    <td width="175">{{ $getShipment->description }}</td>
                </tr>
                <tr>
                    <td>C.2. Total Package</td>
                    <td>:</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>C.3. Quantity</td>
                    <td>:</td>
                    <td>1 of 1</td>
                </tr>
                <tr>
                    <td>C.4. Value</td>
                    <td>:</td>
                    <td>{{ $getShipment->values }}</td>
                </tr>
                <tr>
                    <td>C.5. Actual Weight</td>
                    <td>:</td>
                    <td>{{ $getShipment->actual_weight }}</td>
                </tr>

                <tr>
                    <td>C.6. Volumetric</td>
                    <td>:</td>
                    <td>{{ $getShipment->sum_volume/5000 }}</td>
                </tr>

                <tr>
                    <td>C.7. Chargeable Weight</td>
                    <td>:</td>
                    <td>{{ $getShipment->actual_weight }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td rowspan="3" style="border-top-color: white">
            <table border="1" cellpadding="1">
                <tr>
                    <th><b>Quantity</b></th>
                    <th><b>Length</b></th>
                    <th><b>Width</b></th>
                    <th><b>Height</b></th>
                </tr>
                
                <tr>
                    <td>1</td>
                    <td>{{ $getShipment->length }} cm</td>
                    <td>{{ $getShipment->width }} cm</td>
                    <td>{{ $getShipment->height }} cm</td>
                </tr>
               
            </table>
            <p align="center"><b></b></p>
        </td>
        <td style="background-color: gray;"><b>E. DELIVERY INSTRUCTIONS</b></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
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
                        <b>DATE: {{ date('Y-m-d') }}</b><br />
                        <b>TIME: {{ date('H:i:s') }}</b>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>