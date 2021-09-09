<link rel="stylesheet" href="{{ url('plugins/bootstrap/css/bootstrap.min.css') }}">
<style>
    th, td, tr { 
        font-size: 12px;
        font-family: sans-serif;  
    }
    @page {
        margin: 10;
    }
    body {
        padding: 10;
        margin: 10;
    }
</style>
<table>
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
</table>
<hr>
<table style="width: 100%; border-style: solid;" >
    <tr>
        <td style="font-size: 22; text-align:center;"><b>Commercial Invoice</b></td>
    </tr>
</table>
<br>
<table style="width:100%">
    <tr>
        <td>
            <table>
                <tr>
                    <td style="font-size: 16px;">Shipping Date :</td>
                    <td style="font-size: 16px;"><u><?= date('d/m/Y', strtotime($getShipment[0]->time)) ?></u>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <center>
                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                    $getShipment[0]->connote, 'C39')}}" height="45" width="200">
                    <br>
                    <div style="word-spacing: 10px">{{ $getShipment[0]->connote }}</div>
            </center>
        </td>
    </tr>
    <tr>
        <td style="font-size: 14px;"><b>SHIPPER</b></td>
        <td style="font-size: 14px;"><b>CONSIGNEE</b></td>
    </tr>
    <tr>
        <td>
            <table style="width: 100%">
                <tr>
                    <td>Name : </td>
                    <td style="border-bottom-style: solid">{{ $getShipment[0]->ship_name }}
                    </td>
                </tr>
                <tr>
                    <td>Address :</td>
                    <td style="border-bottom-style: solid">{{ $getShipment[0]->ship_address }}
                    </td>
                </tr>
                <tr>
                    <td>Country :</td>
                    <td style="border-bottom-style: solid">{{ $getShipment[0]->cou_name }}
                    </td>
                </tr>
                <tr>
                    <td>Phone :</td>
                    <td style="border-bottom-style: solid">{{ $getShipment[0]->ship_phone }}
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table style="width: 100%">
                <tr>
                    <td>Name :</td>
                    <td style="border-bottom-style: solid">{{ $getShipment[0]->con_name }}
                    </td>
                </tr>
                <tr>
                    <td>Address :</td>
                    <td style="border-bottom-style: solid">{{ $getShipment[0]->con_address }}
                    </td>
                </tr>
                <tr>
                    <td>Country :</td>
                    <td style="border-bottom-style: solid">{{ $getShipment[0]->cou_name }}
                    </td>
                </tr>
                <tr>
                    <td>Phone :</td>
                    <td style="border-bottom-style: solid">{{ $getShipment[0]->con_phone }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br />
<br />
<br />

<table style="width: 100%">
    <tr>
        <td>
            <table style="width: 100%">
                <tr>
                    <td>Consignment Number :</td>
                    <td style="border-bottom-style: solid">{{ $getShipment[0]->connote }}
                    </td>
                </tr>
                <tr>
                    <td>Unit :</td>
                    <td style="border-bottom-style: solid">1
                    </td>
                </tr>
                <tr>
                    <td>Total Weight :</td>
                    <td style="border-bottom-style: solid">{{ $getShipment[0]->actual_weight }} kg
                    </td>
                </tr>
                <tr>
                    <td>Total Invoice Value :</td>
                    <td style="border-bottom-style: solid"><b>{{ $getShipment[0]->values }}</b>
                    </td>
                </tr>
            </table>
        </td>
        <td align="center" style="font-size: 20;color: gray">
            {{ $getShipment[0]->partner }}
        </td>
    </tr>
</table>
<br />
<br />
<table style="width: 100%" border="1" cellpadding="3">
    <tr align="center">
        <td><b>QUANTITY & DESCRIPTION</b></td>
        <td><b>VOLUME</b></td>
        <td><b>WEIGHT</b></td>
    </tr>
    
    @foreach ($getShipment as $index => $details)
        <tr>
            <td>{{ $index + 1 }} {{ $details->description }}</td>
            <td>{{ $details->length }} cm x {{ $details->width }} cm x {{ $details->height }} cm</td>
            <td>{{ $details->actual_weight }} kg</td>
        </tr>
    @endforeach

    <tr>
        <td><b></b></td>
        <td align="right"><b>TOTAL WEIGHT</b></td>
        <td><b>{{ $getShipment[0]->actual_weight }} kg</b></td>
    </tr>
</table>
<p>The Value declared is of customs clearance purpose only no commercial value.</p>