<?php

class Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student/M_auth');
        $this->load->model('M_siswa');
        $this->load->model('student/M_data');
        if (!$this->session->userdata('id_siswa')) {
            redirect(base_url() . 'student/auth');
        }
        if ($this->session->userdata('level') != 'siswa') {
            echo 'Anda tidak diizinkan untuk akses halaman ini';
            exit;
        }
    }

    // dashboard admin
    public function absen()
    {
        $this->load->helper('sf_helper');
        $datauser = array_merge($this->M_auth->getUserByNis($this->session->userdata('nis'))[0], ['level' => $this->session->userdata('level')]);

        $this->load->model('M_absensi');

        $data = [
            'title' => WEBNAME . 'Siswa Dashboard',
            'user' => $datauser,
            'webname' => WEBNAME,
            'siswa' => $this->M_siswa->dataspesifiksiswa($datauser['nis'])
        ];

        $this->load->view('student/templates/header', $data);
        $this->load->view('student/data/absen');
        $this->load->view('student/templates/footer');
    }

    public function libur()
    {
        $this->load->helper('sf_helper');
        $datauser = array_merge($this->M_auth->getUserByNis($this->session->userdata('nis'))[0], ['level' => $this->session->userdata('level')]);

        $datalibur = $this->M_data->datalibur();
        $data = [
            'title' => WEBNAME . 'Siswa Dashboard',
            'user' => $datauser,
            'webname' => WEBNAME,
            'datalibur' => $datalibur
        ];

        $this->load->view('student/templates/header', $data);
        $this->load->view('student/data/libur');
        $this->load->view('student/templates/footer');
    }

    public function cetak_kartu()
    {
        $datauser = array_merge($this->M_auth->getUserByNis($this->session->userdata('nis'))[0], ['level' => $this->session->userdata('level')]);
        $this->load->helper('sf_helper');
        generateQrSiswa($datauser['nis_siswa'], 'siswa/' . $datauser['nis_siswa'] . '.png');
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
        $path = './assets/qr/siswa/' . $datauser['nis_siswa'] . '.png';
        $img = encode_img_base64($path);
        $data = [
            'user' => $datauser,
            'webname' => WEBNAME,
            'img' => $img
        ];
        $this->load->library('pdf');
        $this->pdf->setPaper('A6', 'portrait');
        $this->pdf->filename = "Kartu absen" . $data['user']['nama_siswa'];
        $this->pdf->load_view('student/data/kartuabsen', $data);
        //   $this->load->view('student/data/kartuabsen',$data);
    }


    // profile / pengaturan akun
    public function profile()
    {
        $this->load->helper('sf_helper');
        $this->load->helper('form');

        $datauser = array_merge($this->M_auth->getUserByNis($this->session->userdata('nis'))[0], ['level' => $this->session->userdata('level')]);
        $dataakun = $this->M_data->dataakunsiswa($this->session->userdata('nis'))[0];
        $data = [
            'title' => WEBNAME . 'Siswa Dashboard',
            'user' => $datauser,
            'webname' => WEBNAME,
            'dataakun' => $dataakun
        ];

        if ($this->input->method() == 'post') {
            $this->load->library('form_validation');
            $this->load->library('upload');

            // Set validation rules
            $this->form_validation->set_rules('nama_siswa', 'Nama siswa', 'required');
            $this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
            $this->form_validation->set_rules('no_telepon', 'Nomer telpon', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            // ketika lolos validasi
            if ($this->form_validation->run() == TRUE) {
                if ($this->input->post('cekGambar', true) == "true") {
                    // uploda foto
                    $config['upload_path'] = './assets/images/user';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = 5048;

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('gambar')) {
                        $data = $this->upload->data();
                        $gambar_filename = $data['file_name'];

                        // input data
                        $this->M_siswa->editsiswa2($this->input->post('nis'), $gambar_filename);
                        $this->session->set_flashdata('flash', ['alert' => 'success', 'message' => 'Berhasil edit data']);
                        redirect(base_url('/student/data/profile'));
                    }
                } else {
                    $data = $this->upload->data();
                    $gambar_filename = $this->input->post('oldGambar', true);

                    // input data
                    $this->M_siswa->editsiswa2($this->input->post('nis', true), $gambar_filename);
                    $this->session->set_flashdata('flash', ['alert' => 'success', 'message' => 'Berhasil edit data']);
                    redirect(base_url('/student/data/profile'));
                }
            } else {
                $this->load->view('student/templates/header');
                $this->load->view('student/data/profile');
                $this->load->view('student/templates/footer');
            }
        } else {
            $this->load->view('student/templates/header', $data);
            $this->load->view('student/data/profile');
            $this->load->view('student/templates/footer');
        }
    }
}
