<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Absen</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon.png">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/chartist/css/chartist.min.css">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link type="text/css" href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" crossorigin="anonymous"></script>
    <style>
        .infoHp {
            display: none;
        }
        .card {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Absen</h4>
                        <b>Scan barcode below:</b>
                    </div>
                    <div class="card-body" id="bodybody">
                        <input type="text" id="barcodeInput" class="form-control" placeholder="Scan barcode here" autofocus>
                        
                        <?php
                        $sqlmasuk = "SELECT * FROM tabel_jam_absen WHERE type = 'Masuk'";
                        $sqlkeluar = "SELECT * FROM tabel_jam_absen WHERE type = 'Keluar'";
                        $sqlterlambat = "SELECT * FROM tabel_jam_absen WHERE type = 'Terlambat'";
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
                        <div class="informasi text-center mt-2">
                            <?php
                            echo "Absen masuk dari: " . $absenmasuk . " sampai " . $absenberakhirmasuk;
                            echo "<br>";
                            echo "Absen keluar dari: " . $absenkeluar . " sampai " . $akhirkeluar;
                            ?>
                        </div>
                        <div class="infoHP text-center mt-2 mb-2"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Hasil <span class="textberhasil text-success"> </span></h4>
                    </div>
                    <div class="card-body text-center">
                        <div class="fotoprofil text-center"></div>
                        <div class="infoabsen mt-3">
                            <h2 class="namasiswa"></h2>
                            <h4 class="nis"></h4> <!-- Elemen untuk menampilkan NIS -->
                            <h4 class="tanggal"></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="copyright center">
            <p>Copyright © Designed & Developed by <a href="http://schoolapp.id/" target="_blank">Schoolapp</a> 2024</p>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/vendor/global/global.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/deznav-init.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/owl-carousel/owl.carousel.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins-init/datatables.init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#barcodeInput').on('keypress', function(e) {
                if (e.which === 13) {
                    let barcode = $(this).val();
                    setResult(barcode);
                    $(this).val(''); // Clear the input after reading the barcode
                }
            });
        });

        function setResult(barcode) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>/ajax/inputabsen",
                data: { nis: barcode },
                dataType: 'json',
                success: function(data) {
                    if (data.status == 'false') {
                        $('.fotoprofil').html(`<h1 class="text-${data.alert} text-center mt-4">${data.message}</h1>`);
                        $('.namasiswa').html('');
                        $('.nis').html('');
                        $('.tanggal').html('');
                    } else if (data.status == 'true') {
                        let image = data['gambar'];
                        let tanggal = new Date();
                        let formattedDate = `${tanggal.getDate()} ${bulan(tanggal.getMonth())} ${tanggal.getFullYear()} - ${tanggal.getHours()}:${tanggal.getMinutes()}:${tanggal.getSeconds()}`;
                        $('.textberhasil').html('Berhasil absen');
                        $('.fotoprofil').html(`<img src="<?= base_url() ?>assets/images/user/${image}" alt="" width="300" height="300">`);
                        $('.namasiswa').html(data['nama_siswa']);
                        $('.nis').html('NIS: ' + data['nis']);
                        $('.tanggal').html(formattedDate);
                    }
                },
                error: function() {
                    console.log('kesalahan system');
                }
            });
        }

        function bulan(month) {
            const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            return months[month];
        }
    </script>
</body>

</html>
