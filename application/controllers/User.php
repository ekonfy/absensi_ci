<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_siswa');
        $this->load->library('form_validation');
        if (!$this->session->userdata('id')) {
            redirect(base_url('dashboard'));
        }
    }
    public function index()
    {
        $datauser = $this->M_user->getUserById($this->session->userdata('id'))[0];
        $url = $this->uri->segment(1);
        verifikasiuser($datauser['role_id'], $url);
        $data = [
            'title' => WEBNAME . 'Data User',
            'webname' => WEBNAME,
            'users' => $this->M_user->datauser(),
            'user' =>  $this->M_user->getUserById($this->session->userdata('id'))[0]
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        if ($this->input->post('id_user') != FALSE) {
            $id_user = $this->input->post('id_user');
            $data_user = $this->M_user->getUserById($id_user)[0];
            $data = [
                'title' => WEBNAME . 'Edit User',
                'webname' => WEBNAME,
                'user' => $data_user
            ];
            $this->load->view('templates/header', $data);
            $this->load->view('user/formedituser');
            $this->load->view('templates/footer');
        } else {
            redirect(base_url() . 'user');
        }
    }

    public function delete()
    {
        if ($this->input->post('id_user') != FALSE) {
            $this->M_user->deleteuser($this->input->post('id_user'));
            $this->session->set_flashdata('flash', ['alert' => 'success', 'message' => 'User berhasil dihapus']);
        }
        redirect(base_url() . 'user');
    }

	public function edituser()
{
    $config['upload_path']   = './assets/images/user';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['file_name']     = $this->input->post('id_user');
    $config['max_size']      = 2000; // 2MB
    $this->load->library('upload', $config);

    // Log input nama untuk debugging
    log_message('debug', 'Input Nama: ' . $this->input->post('nama'));

    // Validasi nama yang mengizinkan huruf, angka, spasi, tanda hubung, dan tanda petik
    $this->form_validation->set_rules('nama', 'Name', 'required|min_length[6]|trim|regex_match[/^[a-zA-Z0-9\s\'\-]+$/u]', [
        'min_length'   => 'Nama minimal 6 karakter',
        'regex_match'  => 'Nama hanya boleh berisi huruf, angka, spasi, tanda hubung, dan tanda petik'
    ]);

    $old_email = $this->M_user->getUserByid($this->input->post('id_user'))[0]['email'];

    // Cek apakah email baru sama dengan email lama
    if ($this->input->post('email') == $old_email) {
        $rules_email = '';
    } else {
        $rules_email = '|is_unique[tabel_user.email]';
    }

    // Validasi email
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email' . $rules_email, [
        'valid_email' => 'Harap masukan email yang valid'
    ]);

    // Cek apakah validasi form berhasil
    if ($this->form_validation->run() == false) {
        // Jika validasi gagal, tampilkan pesan error
        $this->session->set_flashdata('flash', ['alert' => 'danger', 'message' => validation_errors()]);
        redirect(base_url() . 'user');
        return;
    }

    // Cek apakah ada file foto yang diunggah
    if (empty($_FILES['foto']['name'])) {
        // Tidak ada file diunggah, gunakan foto default
        $foto = $this->input->post('fotodefault');
    } else {
        // Ada file diunggah, lakukan proses upload
        if (!$this->upload->do_upload('foto')) {
            // Jika gagal upload, tampilkan error
            $this->session->set_flashdata('flash', ['alert' => 'danger', 'message' => $this->upload->display_errors()]);
            redirect(base_url() . 'user');
            return;
        } else {
            // Jika berhasil upload, ambil nama file dengan ekstensi
            $foto = $this->input->post('id_user') . $this->upload->data('file_ext');
        }
    }

    // Update data user dengan foto baru
    $this->M_user->edituser($foto);

    // Tampilkan pesan berhasil
    $this->session->set_flashdata('flash', ['alert' => 'success', 'message' => 'Berhasil edit user']);
    redirect(base_url() . 'user');
}



	

    public function profile()
    {
        $datauser = $this->M_user->getUserById($this->session->userdata('id'))[0];
        $data = [
            'title' => WEBNAME . 'Data User',
            'webname' => WEBNAME,
            'dataakun' => $datauser,
            'user' =>  $this->M_user->getUserById($this->session->userdata('id'))[0]
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('user/profile');
        $this->load->view('templates/footer');
    }

    public function ubahpassword()
    {

        $datauser = $this->M_user->getUserById($this->session->userdata('id'))[0];
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password1');
        if (!password_verify($current_password, $datauser['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Password Sebelumnya salah !
				</div>');
            redirect('user/profile');
        } else {

            if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Password Baru Tidak Boleh Sama dengan Password yang Lama !
					</div>');
                redirect('user/profile');
            } else {

                // password Nya sudak Bener aliyas validasi yang di atas sudah lulus, maka  Pasword yang di inpukan akan di hash
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('tabel_user');

                $this->session->set_flashdata('message', 'DI EDIT');
                redirect(base_url('user/profile'));
            }
        }
    }

    public function editData()
    {
        if ($this->input->post('cekGambar', true) == "true") {
            $this->load->library('upload');
            // uploda foto
            $config['upload_path'] = './assets/images/user';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 5048;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $data = $this->upload->data();
                $gambar_filename = $data['file_name'];

                // input data
                $data = [
                    'name' => $this->input->post('name', true),
                    'email' => $this->input->post('email', true),
                    'image' => $gambar_filename
                ];

                $this->db->where('id', $this->input->post('id', true))->update('tabel_user', $data);
                $this->session->set_flashdata('flash', ['alert' => 'success', 'message' => 'Berhasil edit data']);
                redirect(base_url('/user/profile'));
            }
        } else {
            $data = $this->upload->data();
            $gambar_filename = $this->input->post('oldGambar', true);

            // input data
            $data = [
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'image' => $gambar_filename
            ];

            $this->db->where('id', $this->input->post('id', true))->update('tabel_user', $data);
            $this->session->set_flashdata('flash', ['alert' => 'success', 'message' => 'Berhasil edit data']);
            redirect(base_url('/user/profile'));
        }
    }


    // page data user siswa
    public function user_siswa()
    {
        $datauser = $this->M_user->getUserById($this->session->userdata('id'))[0];
        $url = $this->uri->segment(1) . '/' . $this->uri->segment(2);
        verifikasiuser($datauser['role_id'], $url);
        $data = [
            'title' => WEBNAME . 'User Login siswa',
            'webname' => WEBNAME,
            'usersiswa' => $this->M_user->getusersiswa(),
            'titleedit' => 'Ubah Log siswa',
            'user' =>  $this->M_user->getUserById($this->session->userdata('id'))[0]
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('user/usersiswa');
        $this->load->view('templates/footer');
    }
    public function editlogsiswa()
    {
        $this->form_validation->set_rules('nis', 'menu', 'required|trim', [
            'required' => 'Menu Tidak Boleh kosong'
        ]);
        $this->form_validation->set_rules('email', 'icon', 'required|trim|valid_email', [
            'required' => 'Icon Tidak Boleh kosong',
            'valid_email' => 'Yang anda masukan bukan email'
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', ['alert' => 'danger', 'message' => validation_errors()]);
        } else {
            $this->M_user->edit();
            $this->session->set_flashdata('flash', ['alert' => 'success', 'message' => 'Berhasil edit Log user siswa']);
        }
        redirect('User/logsiswa');
    }
    public function deletelogsiswa($id)
    {
        //message adalah parameter untuk membuat pesan
        $id = base64_decode($id);
        $this->M_user->deletelog($id);
        $this->session->set_flashdata('flash', ['alert' => 'danger', 'message' => 'Berhasil Hapus']);
        redirect('User/user_siswa');
    }

    public function create()
    {
        $data = [
            'title' => WEBNAME . 'Data User',
            'webname' => WEBNAME,
            'user' =>  $this->M_user->getUserById($this->session->userdata('id'))[0]
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('user/formtambahuser');
        $this->load->view('templates/footer');
    }

    public function createuser()
    {
        $this->form_validation->set_rules('name', 'name', 'required|min_length[6]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[tabel_user.email]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');
        $this->form_validation->set_rules('is_active', 'is_active', 'required');
        if ($this->form_validation->run() === TRUE) {
            // Konfigurasi upload gambar
            $config['upload_path']   = './assets/images/user';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name']     = $this->input->post('name');
            $config['max_size']      = 2000;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                // Gagal upload gambar
                $this->session->set_flashdata('flash', [
                    'alert'   => 'danger',
                    'message' => $this->upload->display_errors()
                ]);
            } else {
                // Berhasil upload gambar
                $foto = $this->upload->data('file_name');
                $this->M_user->tambahuser($foto);
                $this->session->set_flashdata('flash', [
                    'alert'   => 'success',
                    'message' => 'Berhasil tambah user'
                ]);
            }
        } else {
            // Validasi gagal
            $this->session->set_flashdata('flash', [
                'alert'   => 'danger',
                'message' => validation_errors()
            ]);
        }
        redirect(base_url() . 'user');
    }

    public function cetak_kartu()
    {
        $this->load->library('pdf');
        $this->pdf->setPaper('A7', 'portrait');
        $this->pdf->filename = "Kartu_Absen_Semua_Siswa.pdf";

        $this->load->model('M_siswa');
        $data_siswa = $this->M_siswa->allSiswa();

        function encode_img_base64($img_path = false, $img_type = 'png')
        {
            if ($img_path) {
                //convert image into Binary data
                $img_data = fopen($img_path, 'rb');
                $img_size = filesize($img_path);
                $binary_image = fread($img_data, $img_size);
                fclose($img_data);

                //Build the src string to place inside your img tag
                $img_src = "data:image/" . $img_type . ";base64," . str_replace("\n", "", base64_encode($binary_image));

                return $img_src;
            }

            return false;
        }

        $kartu_absen_data = array();

        foreach ($data_siswa as $siswa) {
            generateQrSiswa($siswa['nis'], 'siswa/' . $siswa['nis_siswa'] . '.png');

            $path = './assets/qr/siswa/' . $siswa['nis_siswa'] . '.png';

            $img = encode_img_base64($path);

            $data = [
                'user' => $siswa,
                'webname' => WEBNAME,
                'img' => $img
            ];

            $kartu_absen_data[] = $data;
        }
        // echo var_dump($kartu_absen_data);

        $this->pdf->load_view('student/data/kartuabsens', array('kartu_absen_data' => $kartu_absen_data));

        $this->pdf->output();
    }
}
