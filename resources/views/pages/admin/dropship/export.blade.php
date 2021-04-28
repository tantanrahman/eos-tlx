<table>
    <thead>
        <tr>
            <th>DATE</th>
            <th>RESI</th>
            <th>COURIER</th>
            <th>NAME</th>
            <th>CATEGORY</th>
            <th>PIC</th>
            <th>BERAT</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dropships as $dropship)
            <tr>
                <td>{{ $dropship->time }}</td>
                <td>{{ $dropship->resi }}</td>
                <td>{{ $dropship->courier }}</td>
                <td>{{ $dropship->dname }}</td>
                <td>{{ $dropship->jenis_barang }}</td>
                <td>{{ $dropship->marketing }}</td>
                <td>{{ $dropship->berat }}</td>
            </tr>
            
        @endforeach
    
    </tbody>
</table>