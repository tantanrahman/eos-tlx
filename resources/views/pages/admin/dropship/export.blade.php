<table border="1" style="border-collapse: collapse" width="100%">
    <thead>
        <tr>
            <th>NO</th>
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
        @foreach ($dropships as $index => $dropship)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td align="center">{{ $dropship->time }}</td>
                <td align="center">{{ $dropship->resi }}</td>
                <td align="center">{{ $dropship->courier }}</td>
                <td align="center">{{ $dropship->dname }}</td>
                <td align="center">{{ $dropship->jenis_barang }}</td>
                <td align="center">{{ $dropship->marketing }}</td>
                <td align="center">{{ $dropship->berat }}</td>
            </tr>
            
        @endforeach
    
    </tbody>
</table>