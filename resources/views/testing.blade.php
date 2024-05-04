<table border="1">
    <tr>
        <th>NO.</th>
        <th>KODE AGEN</th>
        <th>NAMA AGEN</th>
        <th>ALAMAT</th>
        <th>KECAMATAN</th>
        <th>KABUPTAEN</th>
        <th>KETERANGAN</th>
    </tr>

    @foreach ($data_agen as $w)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $w->kode_agen }}</td>
            <td>{{ $w->nama_agen }}</td>
            <td>{{ $w->alamat }}</td>
            <td>{{ $w->kecamatan }}</td>
            <td>{{ $w->kota }}</td>
            <td>{{ $w->keterangan }}</td>
        </tr>
    @endforeach
</table>