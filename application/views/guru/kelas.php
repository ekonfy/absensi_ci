<div class="content-body">
    <!-- row -->
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-<?= $this->session->flashdata('flash')['alert'] ?> alert-dismissible alert-alt fade show my-4 mx-5">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong><?= $this->session->flashdata('flash')['alert'] ?>!</strong> <?= $this->session->flashdata('flash')['message']; ?>.
        </div>
    <?php endif; ?>

    <div class="col-xl-12 mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Status</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2">
                        <div class="nav flex-column nav-pills mb-3">
                            <a href="#v-pills-kelas" data-toggle="pill" class="nav-link active show">Status</a>
                        </div>
                    </div>
                    <div class="col-xl-10">
                        <div class="tab-content">
                            <div id="v-pills-kelas" class="tab-pane fade active show">
                                <div class="col-12">
                                    <div class="card shadow">
                                        <a class="btn btn-success col-md-2 offset-md-8 col-5 tambahkelas mt-4 shadow">Tambah</a>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example3" class="display min-w750">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Nama Status</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($kelas as $k) :
                                                            if ($k['type'] == '1') : // Filter hanya menampilkan type 1
                                                        ?>
                                                                <tr>
                                                                    <td><?= $k['id_kelas'] ?></td>
                                                                    <td><?= $k['nama_kelas'] ?></td>
                                                                    <td><?= $k['kelas'] ?></td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <a class="editkelas btn btn-primary shadow btn-xs sharp mr-1" idkelas="<?= $k['id_kelas']; ?>"><i class="fa fa-pencil"></i></a>
                                                                            <a href="<?= base_url(); ?>guru/hapuskelas/<?= base64_encode($k['id_kelas']) ?>" onclick="return confirm('Anda yakin ingin menghapus Status <?= $k['kelas'] ?>')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            endif;
                                                        endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab jurusan -->
                            <div id="v-pills-jurusan" class="tab-pane fade">
                                <div class="col-12">
                                    <div class="card shadow">
                                        <a class="btn btn-success col-md-2 offset-md-8 col-5 tambahjurusan mt-4 shadow">Tambah</a>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example3" class="display min-w750">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Jurusan</th>
                                                            <th>Jurusan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($jurusan as $j) :
                                                        ?>
                                                            <tr>
                                                                <td><?= $j['id_jurusan'] ?></td>
                                                                <td><?= $j['jurusan'] ?></td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a class="editjurusan btn btn-primary shadow btn-xs sharp mr-1" idjurusan="<?= $j['id_jurusan']; ?>"><i class="fa fa-pencil"></i></a>
                                                                        <a href="<?= base_url(); ?>guru/hapusjurusan/<?= base64_encode($j['id_jurusan']) ?>" onclick="return confirm('Anda yakin ingin menghapus jurusan <?= $j['jurusan'] ?>')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of tab jurusan -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal edit & tambah kelas -->
<?php
$csrf = array(
    'name' => $this->security->get_csrf_token_name(),
    'hash' => $this->security->get_csrf_hash()
);
?>
<div class="modal fade" id="modalkelas">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="formkelas" method="POST">
                    <div class="form-row">
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                        <input type="hidden" name="idkelas" class="id_kelas" id="id_kelas">
                        <div class="form-group col-md-12">
                            <label class="labelnama">Nama Status</label>
                            <input type="text" name="nama_kelas" id="namakelas" placeholder="nama status" class="form-control" autofocus required>
                        </div>
                        <div class="form-group col-md-12 form2">
                            <label class="labelkelas">Status</label>
                            <input type="text" name="kelas" class="form-control kelas" placeholder="status">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary buttonsubmit"></button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    //tambah kelas
    $('.tambahkelas').click(function() {
        $('.modal-title').html('Tambah Status')
        $('.buttonsubmit').html('Tambah')
        $('.formkelas').attr('action', '<?= base_url(); ?>guru/tambahkelas')
        $('#modalkelas').modal();
    })
    // edit kelas
    $('.editkelas').click(function() {
        const idkelas = $(this).attr("idkelas");
        $('#id_kelas').attr('value', idkelas)
        $('.modal-title').html('Edit Kelas')
        $('.buttonsubmit').html('Perbarui')
        $('.formkelas').attr('action', '<?= base_url(); ?>guru/editkelas')

        $.ajax({
            type: 'POST',
            url: "<?php echo base_url(); ?>ajax/ambilkelas",
            data: {
                idkelas: idkelas,
            },
            dataType: 'json',
            success: function(data) {
                $('.id_kelas').val(data[0].id_kelas);
                $('#namakelas').val(data[0].nama_kelas);
                $('.kelas').val(data[0].kelas);
                $('#modalkelas').modal();
            },
            error: function() {
                $('.modal-body').html('Kesalahan system')
            }
        });
    })


    // jurusan
    //tambah kelas
    $('.tambahjurusan').click(function() {
        $('.modal-title').html('Tambah Jurusan')
        $('.labelnama').html('Nama Jurusan');
        $('.form2').html('');
        $('#namakelas').attr('placeholder', 'Nama Jurusan');
        $('#namakelas').attr('name', 'namajurusan');

        $('.buttonsubmit').html('Tambah')
        $('.formkelas').attr('action', '<?= base_url(); ?>guru/tambahjurusan')
        $('#modalkelas').modal();
    })
    $('.editjurusan').click(function() {
        const idjurusan = $(this).attr("idjurusan");
        $('.labelnama').html('Nama Jurusan');
        $('.form2').html('');
        $('#id_kelas').attr('value', idjurusan)
        $('#id_kelas').attr('name', 'idjurusan')
        $('.modal-title').html('Edit Jurusan')
        $('.buttonsubmit').html('Perbarui')
        $('#namakelas').attr('name', 'namajurusan');
        $('.formkelas').attr('action', '<?= base_url(); ?>guru/editjurusan')

        $.ajax({
            type: 'POST',
            url: "<?= base_url(); ?>ajax/ambiljurusan",
            data: {
                idjurusan: idjurusan,
            },
            dataType: 'json',
            success: function(data) {
                // console.log(data)
                $('.id_kelas').val(data[0].id_jurusan);
                $('#namakelas').val(data[0].jurusan);

            },
            error: function(e) {
                console.log(e)
                $('.modal-body').html('Kesalahan system')
            }
        });
        $('#modalkelas').modal();
    })
</script>
