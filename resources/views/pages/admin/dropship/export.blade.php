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
                <td align="center">{{ $dropship->resis }}</td>
                <td align="center">{{ $dropship->couriers }}</td>
                <td align="center">{{ $dropship->names }}</td>
                <td align="center">{{ $dropship->category }}</td>
                <td align="center">{{ $dropship->users }}</td>
                <td align="center">{{ $dropship->weight }}</td>
            </tr>
            
        @endforeach
    
    </tbody>
</table>