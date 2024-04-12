@extends('app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="css/popup.css">
</head>
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h4 class="font-weight-bold mb-0">Manajemen Tamu kunjungan</h4>
    </div>
    <div>
        <p id="reportButton"></p>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mt-3 mb-3">
    <div class="dropdown" style="margin-left: 10px;">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="exportDropdownButton" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px;">
            Rekap
        </button>
        <ul class="dropdown-menu" aria-labelledby="exportDropdownButton">
            <li><a class="dropdown-item" href="#" id="exportPdfButton"><i class="fas fa-file-pdf"></i> PDF</a></li>
            <li><a class="dropdown-item" href="#" id="exportExcelButton"><i class="fas fa-file-excel"></i> Excel</a></li>
        </ul>
    </div>
    <ul>
        <button class="btn btn-dark" type="button" style="padding: 5px 10px; color: #fff; margin-right: 10px;" onclick="togglePopup()">
            <i class="fas fa-plus"></i> &nbsp;Tambah Data 
        </button>
    </ul>
</div>

<!-- CONTAINER TABEL -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table-list">
                                <thead>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Keperluan</th>
                                    <th>Asal Instansi</th>
                                    <th>No HP</th>
                                    <th>Tanggal</th>
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
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION CONTAINER TABEL -->

<!-- POP UP TAMBAH DATA-->
<div id="popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); max-width: 400px;">
    <h4 style="margin-top: 0; margin-bottom: 20px; text-align: center;">Tambah Data Tamu Kunjungan</h4>
    
    <form>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat">
        </div>
        <div class="form-group">
            <label for="keperluan">Keperluan</label>
            <input type="text" class="form-control" id="keperluan" placeholder="Masukkan keperluan">
        </div>
        <div class="form-group">
            <label for="asal_instansi">Asal Instansi</label>
            <input type="text" class="form-control" id="asal_instansi" placeholder="Masukkan asal instansi">
        </div>
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" class="form-control" id="no_hp" placeholder="Masukkan nomor HP">
        </div>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="togglePopup()">Close</button>
        </div>
    </form>
</div>
<!-- END POP UP TAMBAH DATA -->

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

    // Function to toggle popup
    function togglePopup() {
        var popup = document.getElementById('popup');
        if (popup.style.display === 'none') {
            popup.style.display = 'block';
        } else {
            popup.style.display = 'none';
        }
    }
</script>
@endsection