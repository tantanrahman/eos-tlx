<html>
<head>
    <title>Shipment | Label</title>
    <link rel="stylesheet" href="{{ asset('dist/css/print_style.css') }}">
</head>
<body>
<header>
    <table  cellpadding="1" cellspacing="0" style="width:100%">
        <tr>
            <td rowspan="3" style="padding-right: -90px !important"><img src="{{ url("storage/officeprofile/".$getUser[0]->photo) }}" style="width:90;"></td>
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

<div>
    @foreach ($getShipment as $index => $items)
    <hr>
    <table style="font-size: 10; width:100%;">
        <tr>
            <td width="250" style="font-size: 10">SHIPPING DATE: {{ date("d M Y H:i") }}</td>
            <td style="font-size: 12" align="center">ACCOUNT : {{ $items->con_ac }}</td>
        </tr>
        <tr>
            <td><b>SENDER</b>
                <br />
                {{ $items->ship_company_name === null ? $items['ship_name'] ." / ". $getUser[0]->username : $items->ship_company_name ." / ". $items['ship_name'] ." / ". $getUser[0]->username }}
                <br />
                {{ $items['ship_city_name'] ." / ". $items['ship_cou_name'] }}
                <br />PH: {{ $items['ship_phone'] }}
                </td>
            <td height="100">
                <center>
                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                        $items->connote, 'C93')}}" height="70" width="300">
                        <br>
                        <div style="word-spacing: 10px">{{ $items['connote'] }}</div>
                </center>
            </td>
        </tr>
    </table>
    <hr>
    <table style="width: 100%">
        <tr>
            <td style="font-size: 22"><b>DELIVER TO</b></td>
            <td align="right" style="font-size: 22"><b>{{ $items['cou_code_dua'] }}</b></td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 22">{{ $items['con_name'] }}<br />
                {{ $items['con_address'] }}
                {{ $items['con_city_name'] }}
                {{ $items['con_postal_code'] }}
                {{ $items['con_cou_name'] }}
                <br />PHONE: {{ $items['con_phone'] }}
            </td>
        </tr>
    </table>
    <table border="1" style="width:100%; border-collapse:collapse;">
        <tr>
            <td width="120" align="center"><b>DESCRIPTION</b></td>
            <td width="150" align="center"><b>DELIVERY INSTRUCTIONS</b></td>
            <td width="100" align="center"><b>NO. OF PIECES</b></td>
            <td align="center"><b>CONSIGNMENT WEIGHT</b></td>
        </tr>
        <tr>
            <td align="center">
               {{ $items->description }}
            </td>
            <td align="center">{{ $items['delivery_intructions'] }}</td>
            <td style="font-size: 13;" align="center"><b>@php echo $index + 1 @endphp OF @php echo count($getShipment) @endphp</b></td>
            <td style="font-size: 13;" align="center"><b>
                {{ $items['actual_weight'] }} KG</b></td>
        </tr>
        <p class="page-break" style="font-size: 11">I/WE AGREE THAT CARRIERS STANDARD TERMS AND CONDITIONS APPLY TO THIS SHIPMENT AND LIMIT THE
            CARRIERS LIABILITY. THE WARSAW CONVENTION MAY ALSO APPLY.</p>
    </table>
    
    @endforeach
</body>
</html>