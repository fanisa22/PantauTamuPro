<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #dddddd;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Data Tamu Kunjungan</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Keperluan</th>
                <th>Asal Instansi</th>
                <th>No HP</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataCetakTamu as $index => $visitor)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $visitor->nama }}</td>
                <td>{{ $visitor->alamat }}</td>
                <td>{{ $visitor->keperluan }}</td>
                <td>{{ $visitor->asal_instansi }}</td>
                <td>{{ $visitor->no_hp }}</td>
                <td>{{ $visitor->tanggal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
    window.print();
</script>
</body>
</html>
