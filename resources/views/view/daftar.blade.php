<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .table-header {
            background-color: #e6ac00;
            color: #fff;
            padding: 15px;
            border-bottom: 1px solid #ccc;
        }
        .table-body {
            padding: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #e6ac00;
            color: #fff;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .report-button {
            float: right;
            font-size: 16px;
            color: #000 !important;
            padding: 10px 20px;
            background-color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .report-button:hover {
            background-color: #fff;
            
        }
        .home-link {
            color: #000;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
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
