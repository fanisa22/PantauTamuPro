<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<<<<<<< HEAD
    <script src="https://www.google.com/recaptcha/api.js?render=YOUR_SITE_KEY"></script>

=======
>>>>>>> 41debf70c191c87c0448c71d2271b135320f39fc
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title text-center">Formulir Pengunjung</h2>
            </div>
            <div class="card-body">
                <form action="/form" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="keperluan">Keperluan:</label>
                        <input type="text" id="keperluan" name="keperluan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="asal_instansi">Asal Instansi:</label>
                        <input type="text" id="asal_instansi" name="asal_instansi" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor HP:</label>
                        <input type="tel" id="no_hp" name="no_hp" class="form-control" pattern="[0-9]{10,}" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="ttd">Tanda Tangan:</label>
                        <canvas id="ttdCanvas" width="400" height="200" class="border"></canvas>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary mr-2" onclick="clearCanvas()">Hapus Tanda Tangan</button>
                        <button type="button" class="btn btn-primary" onclick="saveSignature()">Simpan Tanda Tangan</button>
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
<<<<<<< HEAD
                <form action="/submit-form" method="POST">
                    <!-- Isi formulir lainnya -->

                    <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY" data-callback="onSubmit"></div>

                    <button type="submit">Submit</button>
                </form>

=======
>>>>>>> 41debf70c191c87c0448c71d2271b135320f39fc
            </div>
        </div>
    </div>

    <script>
    var canvas = document.getElementById('ttdCanvas');
    var ctx = canvas.getContext('2d');
    var drawing = false;
    var signature = '';
    canvas.addEventListener('mousedown', function(e) {
        drawing = true;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.beginPath();
        ctx.moveTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
    });
    canvas.addEventListener('mousemove', function(e) {
        if (drawing === true) {
            ctx.lineTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
            ctx.stroke();
        }
    });
    canvas.addEventListener('mouseup', function() {
        drawing = false;
        signature = canvas.toDataURL(); // Simpan tanda tangan sebagai data URL
    });
    function clearCanvas() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        signature = '';
    }
    function saveSignature() {
        // Simpan tanda tangan, Anda dapat mengirimnya ke server atau melakukan apa pun yang Anda butuhkan di sini
        console.log('Tanda Tangan: ' + signature);
    }
</script>

</body>
</html>