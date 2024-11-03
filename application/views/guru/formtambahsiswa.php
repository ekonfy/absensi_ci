<div class="content-body">
    <div class="col-xl-12 mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Personal Info</h4>
            </div>

            <div class="card">
                <div class=" card-body">
                    <div class="widget-content nopadding">
                        <form action="<?= base_url() ?>guru/tambahsiswa" method="post" class="form-horizontal">
                            <div class="form-group col-md-12">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                                <label class="control-label">Nama Lengkap:</label>
                                <div class="controls">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Nomor Induk Guru/Karyawan</label>
                                <div class="controls">
                                    <input type="text" class="form-control" minlength="3" maxlength="10" placeholder="NIK" name="nis" required />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Jenis Kelamin</label>
                                <div class="form-group mb-0">
                                    <label class="radio-inline mr-3"><input type="radio" name="jeniskelamin" value="L"> Laki Laki</label>
                                    <label class="rAQadio-inline mr-3"><input type="radio" name="jeniskelamin" value="P"> Perempuan</label>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Tanggal Lahir </label>
                                <div class="controls">
                                    <input type="date" placeholder="dd--mm-yyyy" min="1900-01-01" max="2999-12-31" name="tgl_lahir" class="form-control" required>
                                </div>
                            </div>
								<div class="form-group col-md-12">
									<label class="control-label">Status :</label>
										<div class="controls">
											<select name="kelas" id="kelas" class="form-control" required>
											<option value="0" selected disabled>Pilih Status..</option>
											<?php foreach ($kelas as $k) : ?>
											<?php if ($k['id_kelas'] == 5 || $k['id_kelas'] == 6) : ?>
											<option value="<?= $k['id_kelas']; ?>"><?= $k['kelas']; ?></option>
											<?php endif; ?>
											<?php endforeach; ?>
											</select>
										</div>
								</div>
							
                            <div class="form-group col-md-12">
                                <label for="normal" class="control-label">Nomor Telepon :</label>
                                <div class="controls">
                                    <input type="text" id="mask-phoneExt" name="nomor_hp" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12 n">
                                <label class="control-label">Alamat</label>
                                <div class="controls">
                                    <textarea class="form-control" minlength="10" name="alamat" required></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>s
