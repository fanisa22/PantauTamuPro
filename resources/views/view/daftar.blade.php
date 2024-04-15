<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css./tamu.css')}}">
</head>
<body>
    <div class="header-container">
        <div>
            <a href="/" class="home-link">Kembali ke Home</a>
        </div>
    </div>
    <div class="table-container">
        <div class="table-header">
            <h4 class="font-weight-bold mb-0">Daftar Tamu Kunjungan</h4>
            <br>
            <button class="report-button" id="reportButton"></button>
            <br>
        </div>
        <div class="table-body">
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
                    @foreach($visitors as $index => $visitor)
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
        </div>
    </div>

    <script>
        // Mendapatkan tombol "Report"
        var reportButton = document.getElementById('reportButton');

        // Mendapatkan tanggal hari ini
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        var yyyy = today.getFullYear();

        today = mm + '/' + dd + '/' + yyyy;

        // Mengganti teks tombol dengan tanggal hari ini
        reportButton.innerHTML = today;

        // Export to PDF
        document.getElementById('exportPdfButton').addEventListener('click', function() {
            // Your logic for exporting to PDF goes here
            console.log('Export to PDF clicked');
        });

        // Export to Excel
        document.getElementById('exportExcelButton').addEventListener('click', function() {
            // Your logic for exporting to Excel goes here
            console.log('Export to Excel clicked');
        });
    </script>
</body>
</html>
