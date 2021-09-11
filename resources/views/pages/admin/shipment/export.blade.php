<table border="1" style="border-collapse: collapse" width="100%">
    <thead>
        <tr>
            <th>DATE</th>
            <th>CONNOTE</th>
            <th>SHIPPER COMPANY NAME</th>
            <th>SHIPPER NAME</th>
            <th>SHIPPER ADDRESS</th>
            <th>SHIPPER CITY</th>
            <th>SHIPPER POSTCODE</th>
            <th>SHIPPER COUNTRY</th>
            <th>SHIPPER PHONE</th>
            <th>CONSIGNEE COMPANY NAME</th>
            <th>CONSIGNEE NAME</th>
            <th>CONSIGNEE ADDRESS</th>
            <th>CONSIGNEE CITY</th>
            <th>CONSIGNEE POSTCODE</th>
            <th>CONSIGNEE COUNTRY</th>
            <th>CONSIGNEE PHONE</th>
            <th>DESCRIPTION</th>
            <th>PCS</th>
            <th>WEIGHT (KG)</th>
            <th>CUST. VALUE</th>
            <th>PARTNER</th>
            <th>MARKETING</th>
            <th>REDOC CONNOTE</th>
            <th>CREATED BY</th>
            <th>MODAL</th>
            <th>ONGKIR</th>
            <th>MARGIN</th>
            <th>PAYMENT</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shipments as $index => $shipment)
            <tr>
                <td align="center">{{ $shipment->time }}</td>
                <td align="center">{{ $shipment->connote }}</td>
                <td align="center">{{ $shipment->ship_company_name }}</td>
                <td align="center">{{ $shipment->ship_name }}</td>
                <td align="center">{{ $shipment->ship_address }}</td>
                <td align="center">{{ $shipment->ship_city_name }}</td>
                <td align="center">{{ $shipment->ship_postal_code }}</td>
                <td align="center">Indonesia</td>
                <td align="center">{{ $shipment->ship_phone }}</td>
                <td align="center">{{ $shipment->con_company_name }}</td>
                <td align="center">{{ $shipment->con_name }}</td>
                <td align="center">{{ $shipment->con_address }}</td>
                <td align="center">{{ $shipment->con_city_name }}</td>
                <td align="center">{{ $shipment->con_postal_code }}</td>
                <td align="center">{{ $shipment->cou_name }}</td>
                <td align="center">{{ $shipment->con_phone }}</td>
                <td align="center">{{ $shipment->description }}</td>
                <td align="center"></td>
                <td align="center">{{ $shipment->actual_weight }}</td>
                <td align="center">{{ $shipment->values }}</td>
                <td align="center">{{ $shipment->partner_name }}</td>
                <td align="center">{{ $shipment->marketing }}</td>
                <td align="center">{{ $shipment->redoc_connote }}</td>
                <td align="center">{{ $shipment->created }}</td>
                <td align="center">{{ $shipment->modal }}</td>
                <td align="center">{{ $shipment->ongkir }}</td>
                <td align="center">{{ $shipment->margin }}</td>
                <td align="center">{{ $shipment->payment_status === "0" ? "UNPAID" : "PAID" }}</td>
            </tr>
            
        @endforeach
    
    </tbody>
</table>