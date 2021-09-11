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
<main>

</main>
</body>
</html>