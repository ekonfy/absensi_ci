<!--**********************************
      Bagian Content body start
    ***********************************-->
	<?php
$jam = date("G");
if ($jam >= 0 && $jam <= 11)
    $sapa = "Selamat Pagi";
else if ($jam >= 12 && $jam <= 15)
    $sapa = "Selamat Siang";
else if ($jam >= 16 && $jam <= 18)
    $sapa = "Selamat Sore";
else if ($jam >= 19 && $jam <= 23)
    $sapa = "Selamat Malam";
?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
    <div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card bg-transparent mb-4">
            <div class="card-body d-flex flex-wrap justify-content-between align-items-center">
                <!-- Bagian Tanggal dan Jam -->
                <div class="d-flex flex-column text-center text-md-left mb-3 mb-md-0">
                    <div class="d-flex flex-column align-items-start">
                        <h4 class="flaticon-381-calendar mb-30 mr-20" id="datenow"></h4> <!-- Lebih banyak jarak kanan -->
                        <h4 class="flaticon-381-alarm-clock mb-4" id="clocknow"></h4> <!-- Lebih banyak jarak bawah -->
                    </div>
                </div>

                <!-- Bagian Pilihan Scan Absen -->
                <div class="d-flex flex-column align-items-center text-center">
                    <h4 class="flaticon-381-user mb-4 mr-2">Pilih Scan Absen:</h4> <!-- Lebih banyak jarak kanan dan bawah -->
                    <div class="d-flex justify-content-center">
					    <button type="button" class="btn btn-success mb-2 mr-2 btn-sm" onclick="window.open('<?= base_url(); ?>camera/scanqr', '_blank')">Scanner QR</button>
                        <button type="button" class="btn btn-success mb-2 btn-sm" onclick="window.open('<?= base_url(); ?>camera', '_blank')">Laptop/HP</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






            <div class="col-xl-12 col-xxl-12">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="la la-users"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">Jumlah Siswa</p>
                                        <h3 class="text-white"><?= $this->db->query("SELECT * FROM tabel_siswa")->num_rows() ?></h3>
                                        <div class="progress mb-2 bg-secondary">
                                            <div class="progress-bar progress-animated bg-light" style="width: 100%"></div>
                                        </div>
                                        <small>Seluruh siswa aktif dan tidak aktif</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-warning">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="la la-user"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">Jumlah Pengguna</p>
                                        <?php
                                        $akunpetugas = $this->db->query("SELECT * FROM tabel_user")->num_rows();
                                        $akunsiswa = $this->db->query("SELECT * FROM login_siswa")->num_rows();
                                        ?>
                                        <h3 class="text-white"><?= $akunpetugas + $akunsiswa ?></h3>
                                        <div class="progress mb-2 bg-primary">
                                            <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                                        </div>
                                        <small><?= $akunpetugas . ' Akun staff' . ' dan ' . $akunsiswa . ' Akun siswa' ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6">
                        <div class="widget-stat card bg-secondary">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="mr-3">
                                        <i class="la la-graduation-cap"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">Jumlah Kelas</p>
                                        <h3 class="text-white"><?= $this->db->query("SELECT * FROM tabel_kelas")->num_rows() ?></h3>
                                        <div class="progress mb-2 bg-primary">
                                            <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                                        </div>
                                        <small>dari <?= $this->db->query("SELECT * FROM tabel_jurusan")->num_rows() . ' Jurusan' ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card border-0 pb-0">
                            <div class="card-header border-0 pb-0">
                                <?php
                                $thbulan = date('Y') . '-' . date('m');
                                $querycekizin = "SELECT * FROM tabel_izin JOIN tabel_siswa on tabel_siswa.nis = tabel_izin.nis_siswa WHERE tanggal_izin LIKE '%$thbulan%' ORDER BY tanggal_izin DESC LIMIT 10";
                                $izin = $this->db->query($querycekizin)->result_array();
                                ?>
                                <h4 class="card-title">Permintaan izin bulan ini</h4>
                                <a href="<?= base_url('izin') ?>" class="btn-sm btn btn-primary"> <span class="flaticon-381-view"></span> Lihat semua</a>
                            </div>
                            <div class="card-body">
                                <div id="DZ_W_Todo3" class="widget-media dz-scroll height200">
                                    <?php if (count($izin) == 0) { ?>
                                        <h3 class="text-center text-primary m-auto">Tidak ada izin bulan ini</h1>
                                    <?php } else { ?>
                                        <ul class="timeline">
                                            <?php foreach ($izin as $i) : ?>
                                                <li>
                                                    <div class="timeline-panel">
                                                        <div class="media mr-2">
                                                            <img alt="image" width="50" src="<?= base_url() ?>assets/images/user/<?= $i['gambar']; ?>">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-1"><?= $i['nama_siswa'] ?> <small class="text-muted"><?= $i['tanggal_izin'] ?></small></h5>
                                                            <p class="mb-1"><?= substr($i['keterangan'], 1, 70) ?>....</p>
                                                            <p class="badge badge-secondary"><?= $i['status'] ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pop-up -->
<div class="modal fade" id="scanAbsenModal" tabindex="-1" role="dialog" aria-labelledby="scanAbsenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scanAbsenModalLabel">Konfirmasi Scan Absen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			Pilih Scan Absen dengan (Kamera HP/Laptop) (QR Reader)
            </div>
            <div class="modal-footer">
                <!-- Tombol untuk konfirmasi -->
                <button type="button" class="btn btn-success" onclick="window.open('<?= base_url(); ?>camera', '_blank')">Kamera HP/Laptop</button>
				<button type="button" class="btn btn-success" onclick="window.open('<?= base_url(); ?>camera/scanqr', '_blank')">Scanner</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!--**********************************
    Akhir Content body end
***********************************-->
<script type='text/javascript'>
    function currentTime() {
        var date = new Date(); /* creating object of Date class */
        var hour = date.getHours();
        var min = date.getMinutes();
        var sec = date.getSeconds();
        hour = updateTime(hour);
        min = updateTime(min);
        sec = updateTime(sec);
        document.getElementById("clocknow").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */

        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        var curWeekDay = days[date.getDay()]; // get day
        var curDay = date.getDate(); // get date
        var curMonth = months[date.getMonth()]; // get month
        var curYear = date.getFullYear(); // get year
        var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear; // get full date
        document.getElementById("datenow").innerHTML = date;

        var t = setTimeout(function() {
            currentTime()
        }, 1000); /* setting timer */
    }

    function updateTime(k) { /* appending 0 before time elements if less than 10 */
        if (k < 10) {
            return "0" + k;
        } else {
            return k;
        }
    }
    currentTime(); /* calling currentTime() function to initiate the process */
</script>



<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
