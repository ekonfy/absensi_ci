<div class="content-body">
    <!-- row -->
    <?php


    ?>
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
                <!-- <li class="breadcrumb-item active"><a href="javascript:void(0)">Data User</a></li> -->
            </ol>
        </div>
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="alert alert-<?= $this->session->flashdata('flash')['alert'] ?> alert-dismissible alert-alt fade show my-4 mx-5">
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <strong><?= $this->session->flashdata('flash')['alert'] ?>!</strong> <?= $this->session->flashdata('flash')['message']; ?>.
            </div>
        <?php endif; ?>


        <div class="row">

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">

                        <div class="profile-blog mb-5">
                            <h5 class="text-primary d-inline">Profil</h5>
                            <img src="<?= base_url() . 'assets/images/user/' . $dataakun['gambar'] ?>" alt="" class="img-fluid mt-4 mb-4 w-100">
                            <h4><a href="post-details.html" class="text-black text-center"><?= $dataakun['nama_siswa'] ?></a></h4>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#profilelengkap" data-toggle="tab" class="nav-link active show">Profile Lengkap</a>
                                    </li>
                                    <li class="nav-item"><a href="#changepw" data-toggle="tab" class="nav-link">Ganti Kata Sandi</a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <!-- profile -->
                                    <div id="profilelengkap" class="tab-pane fade active show">
                                        <div class="my-post-content pt-3">
                                            <?= form_open_multipart('', array('method' => 'post')) ?>
                                            <div class="row mt-3">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Nama Lengkap</label>
                                                        <input type="text" value="<?= $dataakun['nama_siswa'] ?>" firstName" class="form-control" placeholder="Parsley" required name="nama_siswa">
                                                        <small class="text-danger"><?= form_error('nama_siswa') ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Nomor Induk Siswa</label>
                                                        <input type="text" value="<?= $dataakun['nis'] ?>" lastName" class="form-control" name="nis" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Tangal Lahir</label>
                                                        <input type="date" class="form-control" required value="<?= $dataakun['tgl_lahir']; ?>" name="tgl_lahir">
                                                        <small class="text-danger"><?= form_error('tgl_lahir') ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Nomor HP</label>
                                                        <input type="text" name="no_telepon" class="form-control" value="<?= $dataakun['no_telepon'] ?>" required>
                                                        <small class="text-danger"><?= form_error('no_telepon') ?></small>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label class="text-label">Email</label>
                                                        <input type="text" value="<?= $dataakun['email'] ?>" name="email" class="form-control" required>
                                                        <small class="text-danger"><?= form_error('email') ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label class="text-label">Alamat</label>
                                                        <input type="text" value="<?= $dataakun['alamat'] ?>" name="alamat" class="form-control" required>
                                                        <small class="text-danger"><?= form_error('alamat') ?></small>
                                                    </div>
                                                </div>

                                                <div class="mx-3 mb-3">
                                                    <label>Gambar</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="gambar">
                                                        <input type="hidden" value="<?= $dataakun['gambar'] ?>" name="oldGambar">
                                                        <input type="hidden" name="cekGambar" id="cekGambar">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <button type="submit" class="btn btn-primary">Edit Data</button>
                                            </div>
                                            <?= form_close() ?>
                                        </div>
                                    </div>

                                    <!-- ganti psw -->
                                    <div id="changepw" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-12 mt-5 ">
                                                <div class="untukalert"></div>

                                                <div class="formeuy">
                                                    <form action="">
                                                        <div class="form-group">
                                                            <label for=""> Sandi Lama</label>
                                                            <input class="form-control pwold" type="text" name="" id="" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for=""> Sandi Baru</label>
                                                            <input class="form-control pw1" type="password" name="" id="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Konfirmasi Sandi</label>
                                                            <input class="form-control pw2" type="password" name="" id="">
                                                        </div>
                                                        <button class="btn-md btn btn-primary changepass">Ubah Sandi</button>
                                                        <input type="checkbox" class="seepw"> Lihat Sandi
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $('#customFile').change(function() {
        $('#cekGambar').val('true');
    });

    // lihat kata sandi
    $('.seepw').on('change', function() {
        if (this.checked) {
            $('.pw1').attr('type', 'text');
            $('.pw2').attr('type', 'text');
        } else {
            $('.pw1').attr('type', 'password');
            $('.pw2').attr('type', 'passwordss');

        }
    });


    // funtion untuk alert
    function showalert(alert, strong, message) {
        $('.untukalert').html(` <div class="alert alert-${alert} alert-dismissible alert-alt fade show my-4 mx-5">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>${strong}</strong>${message}
        </div>`)
    }
    // ganti password 
    $('.changepass').click(function(e) {
        e.preventDefault();
        let oldpw = $('.pwold').val();
        let newpw = $('.pw1').val();
        let confirmpw = $('.pw2').val();

        if (oldpw.length == 0 || newpw.length == 0 || confirmpw.length == 0) {
            showalert('danger', 'Gagal!', ' Harap isi semua Form')
        } else if (newpw.length < 6) {
            showalert('danger', 'Gagal! ', ' Kata sand minimal 6 karakter');
        } else if (newpw != confirmpw) {
            showalert('danger', 'Gagal! ', 'Kata sandi tidak sesuai');
        } else {

            $.ajax({
                type: 'POST',
                url: "<?= base_url() ?>ajax/change_password_siswa",
                dataType: 'json',
                data: {
                    oldpw: oldpw,
                    newpw: newpw,
                    confirmpw: confirmpw,
                },
                // dataType: 'json',
                success: function(data) {

                    $('.formeuy').show();
                    if (data.status == false) {
                        showalert('danger', 'Gagal !', data.message);
                    } else if (data.status == true) {
                        showalert('success', 'Berhasil !', data.message);

                    }
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }

    })
</script>