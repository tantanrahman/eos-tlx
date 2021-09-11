<style>
    th, td, tr { 
        font-size: 12px;
        font-family: sans-serif;  
    }
    @page {
        margin: 1;
    }
    body {
        padding: 1;
        margin: 1;
    }
    .page-break{
        page-break-after: always;
    }
</style>
<table>
    <tr>
        <td rowspan="3"><img src="{{ asset('img/tlx_logo.png') }}" style="width:90;"></td>
        <td width=10></td>
        <th>{{ $getUser[0]->op_name }}</th>
    </tr>
    <tr>
        <td width=10></td>
        <td style="font-size: 8;">{{ $getUser[0]->op_address }}</td>
    </tr>
    <tr>
        <td width=10></td>
        <td style="font-size: 8;">{{ $getUser[0]->op_address }}</td>
    </tr>
</table>
<hr border="1">

@foreach ($getShipment as $index => $items)
<div class="page-break">
    <table style="font-size: 10; width:100%">
        <tr>
            <td style="font-size: 10">SHIPPING DATE: {{ date("d M Y H:i") }}</td>
            <td style="font-size: 12" align="center">ACCOUNT : <b>{{ $items['ship_ac'] }}</b></td>
        </tr>
        <tr>
            <td style="font-size: 10"><b>SENDER</b><br />{{ $items['ship_name'] }}<br />{{ $items['ship_address'] }}<br />{{ $items['cou_name'] }}<br />PH: {{ $items['ship_phone'] }}</td>
            <td>
                <center>
                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                        $items['connote'], 'C93')}}" height="45" width="200">
                        <br>
                        <div style="word-spacing: 10px">{{ $items['connote'] }}</div>
                </center>
            </td>
        </tr>
        <tr>
            <td style="font-size: 22; border-top-color:black !important"><b>DELIVER TO</b></td>
            <td align="right" style="font-size: 22"><b>{{ $items['cou_code_dua'] }}</b></td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 22">{{ $items['con_name'] }}<br />{{ $items['con_address'] }}<br />
                {{ $items['con_postalcode'] }}<br />{{ $items['con_cou_name'] }}<br />{{ $items['con_city'] }}
            <br />PHONE: {{ $items['con_phone'] }}
            </td>
        </tr>
        <table border="1" style="width:100%">
            <tr>
                <td width="177" align="center"><b>DESCRIPTION</b></td>
                <td width="177" align="center"><b>DELIVERY INSTRUCTIONS</b></td>
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
        </table>
    </table>
    <p style="font-size: 8">I/WE AGREE THAT CARRIERS STANDARD TERMS AND CONDITIONS APPLY TO THIS SHIPMENT AND LIMIT THE
        CARRIERS LIABILITY. THE WARSAW CONVENTION MAY ALSO APPLY.</p>
    <h1></h1>
</div>
@endforeach
