<div class="content-body">
    <div class="col-xl-12 mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah User</h4>
            </div>

            <div class="card">
                <div class=" card-body">
                    <div class="widget-content nopadding">
                        <form action="<?= base_url() ?>user/createuser" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                            <div class="row">
                                <div class="form-group col-md">
                                    <label class="control-label">Nama :</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Nama User" name="name" required />
                                    </div>
                                </div>

                                <div class="form-group col-md">
                                    <label class="control-label">Email :</label>
                                    <div class="controls">
                                        <input type="email" class="form-control" placeholder="example@gmail.com" name="email" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md">
                                    <label class="control-label">Password :</label>
                                    <div class="controls">
                                        <input type="password" class="form-control" placeholder="******" name="password" required />
                                    </div>
                                </div>

                                <div class="form-group col-md">
                                    <label class="control-label">Level :</label>
                                    <div class="controls">
                                        <?php
                                        $role = $this->db->query("SELECT * FROM tabel_user_role ")->result_array();
                                        ?>
                                        <select name="role" id="role" class="form-control" required>
                                            <?php foreach ($role as $r) : ?>
                                                <option value="<?= $r['id'] ?>" <?= $user['role_id'] == $r['id'] ? 'selected' : '' ?>><?= $r['role'] ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md">
                                    <label class="control-label">Status :</label>
                                    <div class="controls">
                                        <div class="controls">
                                            <select name="is_active" id="is_active" class="form-control" required>
                                                <option value="1">Aktif</option>
                                                <option value="0">Tidak aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label mb-2">Gambar</label><br>
                                <img id="previewImage" src="#" style="max-width: 100%; max-height: 200px;">
                                <input class="form-control mt-2" id="imageInput" type="file" name="image">
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