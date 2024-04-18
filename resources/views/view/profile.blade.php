@extends('app')

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <div>
        <h4 class="font-weight-bold mb-0">Manajemen Data Akun User</h4>
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
            <i class="fas fa-plus"></i> &nbsp;Tambah Akun
        </button>
    </ul>
</div>


<!-- SECTION CONTAINER TABEL-->
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
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>TTL</th>
                                    <th>Option</th>
                                </thead>
                                <tbody>
                                    @foreach($profiles as $index => $profile)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $profile->nama }}</td>
                                        <td>{{ $profile->username }}</td>
                                        <td>{{ $profile->email }}</td>
                                        <td>{{ $profile->alamat }}</td>
                                        <td>{{ $profile->no_hp }}</td>
                                        <td>{{ $profile->tanggal_lahir }}</td>
                                        <td>
                                            <button onclick="togglePopupedit({{ $profile->id }})" class="btn btn-success" style="color: white; padding: 5px 10px; height: auto;"> 
                                                <i class="fas fa-edit"></i>&nbsp;Edit
                                            </button><br><br>
                                            <button onclick="konfirmasiHapus({{ $profile->id }})" class="btn btn-danger" style="color: white; padding: 5px 10px; height: auto;">
                                                <i class="fas fa-trash-alt"></i>&nbsp;Delete
                                            </button>
                                        </td>
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



<!-- POP UP TAMBAH DATA -->
<div id="popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); max-width: 700px; ">
    <h4 style="margin-top: 0; margin-bottom: 20px; text-align: center;">Tambah Data Tamu Kunjungan</h4>
    
    <form action="/tambahakun" method="post">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan asal email">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan asal alamat">
        </div>
        <div class="form-group">
            <label for="nohp">No.Hp</label>
            <input type="text" class="form-control" id="nohp" name="no_hp" placeholder="Masukkan asal nohp">
        </div>
        <div class="form-group">
            <label for="ttl">TTL</label>
            <input type="text" class="form-control" id="ttl" name="tanggal_lahir" placeholder="Masukkan asal ttl">
        </div>
        
        <div style="text-align: center;">
            <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="togglePopup()">Close</button>
        </div>
    </form>
</div>
<!-- END POP UP TAMBAH DATA -->

<!-- POP UP EDIT DATA -->
<div id="popupedit" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); max-width: 700px; ">
    <h4 style="margin-top: 0; margin-bottom: 20px; text-align: center;">Edit Data Tamu Kunjungan</h4>
    
    <form action="{{ route('profile.update', $profile->id) }}" method="POST" id="editForm">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama_edit" name="nama">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username_edit" name="username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email_edit" name="email">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat_edit" name="alamat">
        </div>
        <div class="form-group">
            <label for="no_hp">No.Hp</label>
            <input type="text" class="form-control" id="no_hp_edit" name="no_hp">
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">TTL</label>
            <input type="text" class="form-control" id="tanggal_lahir_edit" name="tanggal_lahir">
        </div>
        
        <div style="text-align: center;">
            <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Update</button>
            <button type="button" class="btn btn-secondary" onclick="togglePopupedit()">Close</button>
        </div>
    </form>
</div>
<!-- END POP UP EDIT DATA -->


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

    // Function to toggle popup edit
    function togglePopupedit(id) {
        var popup = document.getElementById('popupedit');
        if (popup.style.display === 'none') {
            popup.style.display = 'block';
            // Mengisi form edit dengan data profil yang sesuai
            var profile = document.querySelector('table').rows[id].cells;
            document.getElementById('nama_edit').value = profile[1].innerText;
            document.getElementById('username_edit').value = profile[2].innerText;
            document.getElementById('email_edit').value = profile[3].innerText;
            document.getElementById('alamat_edit').value = profile[4].innerText;
            document.getElementById('no_hp_edit').value = profile[5].innerText;
            document.getElementById('tanggal_lahir_edit').value = profile[6].innerText;
        } else {
            popup.style.display = 'none';
        }
    }

    function konfirmasiHapus(id) {
        // Menampilkan jendela konfirmasi dengan pesan khusus
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            // Jika pengguna mengklik "OK", lakukan penghapusan
            hapusData(id);
        } else {
            // Jika pengguna mengklik "Batal", tidak lakukan apa-apa
            return;
        }
    }

    function hapusData(id) {
        // Di sini Anda akan menempatkan kode untuk menghapus data
        alert("Data berhasil dihapus dengan ID: " + id); // Contoh pesan konfirmasi
    }
</script>
@endsection
