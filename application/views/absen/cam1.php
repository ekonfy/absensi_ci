<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-6 col-sm-12 mb-4"> <!-- Margin bawah pada kolom absen -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Absen</h4>
                    </div>
                    <div class="card-body" id="bodybody">
                        <div class="embed-responsive embed-responsive-21by9">
                            <video src="" id="qr-video" autoplay muted></video>
                        </div>
                        
                        <?php
                        $sqlmasuk = "SELECT * FROM tabel_jam_absen WHERE type = 'Masuk' ";
                        $sqlkeluar = "SELECT * FROM tabel_jam_absen WHERE type = 'Keluar' ";
                        $sqlterlambat = "SELECT * FROM tabel_jam_absen WHERE type = 'Terlambat' ";
                        $masuk = $this->db->query($sqlmasuk)->result_array();
                        $keluar = $this->db->query($sqlkeluar)->result_array();
                        $terlambat = $this->db->query($sqlterlambat)->result_array();

                        $jamskarang = date('H:i:s');
                        $absenmasuk = $masuk[0]['mulai'];
                        $absenberakhirmasuk = $masuk[0]['selesai'];
                        $absenkeluar = $keluar[0]['mulai'];
                        $akhirkeluar = $keluar[0]['selesai'];
                        $telatmasuk = $terlambat[0]['selesai'];
                        ?>
                        
                        <div class="informasi text-center mt-2"></div>
                        <div class="infoHP text-center mt-2 mb-2"></div>
                        
                        <div class="form-group">
                            <label for="scannerInput">Scan QR/Barcode:</label>
                            <input type="text" id="scannerInput" class="form-control" placeholder="Scan QR atau barcode di sini">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12 mb-4"> <!-- Margin bawah pada kolom hasil -->
                <div class="card" id="resultCard" style="display: block;"> <!-- Tampilkan hasil card -->
                    <div class="card-header">
                        <h4 class="card-title">Hasil Absen</h4>
                    </div>
                    <div class="card-body">
                        <div class="fotoprofil text-center mb-3"></div>
                        <div class="namasiswa text-center mb-2"></div>
                        <div class="tanggal text-center mb-2"></div>
                        <div class="textberhasil text-center"></div>
                        <div class="textbelum text-center mt-3" style="display: none;"> <!-- Tampilkan pesan belum di scan -->
                            <h5 class="text-danger">Belum melakukan scan atau ulangi scan.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('scannerInput').addEventListener('input', function(event) {
            const result = event.target.value;
            setResult(result); // Panggil fungsi untuk mengirim hasil scan ke server
            event.target.value = ''; // Reset input field setelah scan
        });

        function setResult(result) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>/ajax/inputabsen", // Ganti dengan URL endpoint server Anda
                data: {
                    nis: result,
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status == 'false') {
                        $('.fotoprofil').html(`<h1 class="text-${data.alert} text-center mt-4">${data.message}</h1>`);
                        $('.namasiswa').html('');
                        $('.tanggal').html('');
                        $('.textbelum').show(); // Tampilkan pesan belum di scan
                    } else if (data.status == 'true') {
                        let image = data['gambar'];
                        let tanggal = new Date().toLocaleString();
                        $('.textberhasil').html('Berhasil absen');
                        $('.fotoprofil').html(
                            `<img src="<?= base_url() ?>assets/images/user/${image}" alt="" width="300" height="300">`
                        );
                        $('.namasiswa').html(data['nama_siswa']);
                        $('.tanggal').html(tanggal);
                        $('.textbelum').hide(); // Sembunyikan pesan belum di scan
                    }
                    $('#resultCard').show(); // Tampilkan kartu hasil
                },
                error: function() {
                    console.log('Kesalahan sistem');
                }
            });
        }
    </script>
</body>
</html>
