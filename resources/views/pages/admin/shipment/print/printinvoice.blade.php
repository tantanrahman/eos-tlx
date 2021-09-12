<html>
<head>
    <title>Shipment | Invoice</title>
    <link rel="stylesheet" href="{{ asset('dist/css/print_style.css') }}">
</head>
<body>
<header>
    <table cellpadding="1" cellspacing="0" style="width:100%">
        <tr>
            <td width="100" rowspan="3"><img src="{{ url("storage/officeprofile/".$getUser[0]->photo) }}" style="width:90;"></td>
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
                        $getShipment[0]->connote, 'C93')}}" height="60" width="300">
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
                        <td width="100">Name : </td>
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
                        <td width="100">Name :</td>
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
            <td width="250">
                <table>
                    <tr>
                        <td width="140">Consignment Number :</td>
                        <td style="border-bottom-style: solid">{{ $getShipment[0]->connote }}
                        </td>
                    </tr>
                    <tr>
                        <td>Unit :</td>
                        <td style="border-bottom-style: solid">
                            @php
                                echo count($getShipment)
                            @endphp
                        </td>
                    </tr>
                    <tr>
                        <td>Total Weight :</td>
                        <td style="border-bottom-style: solid">{{ $getShipment->sum('actual_weight') }} kg
                        </td>
                    </tr>
                    <tr>
                        <td>Total Invoice Value :</td>
                        <td style="border-bottom-style: solid"><b>{{ $getShipment[0]->values }}</b>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center" style="font-size: 22;color: gray">
                {{ $getShipment[0]->partner }}
            </td>
        </tr>
    </table>
    <br />
    <br />
    <table style="width: 100%; border-collapse:collapse;" border="1" cellpadding="1" cellspacing="1">
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
            <td>
                <b>
                @php
                    echo count($getShipment)
                @endphp
                </b>
            </td>
            <td align="right"><b>TOTAL WEIGHT</b></td>
            <td><b>{{ $getShipment->sum('actual_weight') }} kg</b></td>
        </tr>
    </table>
    <p>The Value declared is of customs clearance purpose only no commercial value.</p>
</main>
</body>
</html>