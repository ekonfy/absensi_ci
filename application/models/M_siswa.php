<?php
class M_siswa extends CI_Model
{

    public function datasiswa()
    {
        return  $this->db->select('*')
            ->from('tabel_siswa')
            ->join('tabel_kelas', 'tabel_kelas.id_kelas = tabel_siswa.kode_kelas')
            ->get()->result_array();

        // return  $this->db->get('tabel_siswa')->result_array();
    }
    public function datasiswaByKelas($idkelas)
    {
        $where = [
            'kode_kelas' => $idkelas
        ];
        return  $this->db->select('*')
            ->from('tabel_siswa')
            ->join('tabel_kelas', 'tabel_kelas.id_kelas = tabel_siswa.kode_kelas')
            ->where($where)
            ->get()->result_array();
        // return $this->db->where($where)->get('tabel_siswa')->result_array();

    }
    public function dataspesifiksiswa($nis)
    {
        return  $this->db->select('*')
            ->from('tabel_siswa')
            ->join('tabel_kelas', 'tabel_kelas.id_kelas = tabel_siswa.kode_kelas')
            ->where('nis', $nis)->get()->result_array();
    }
	
	public function inputsiswa()
{
    // Ambil data nomor telepon dari form
    $nohp = $this->input->post('nomor_hp', true); 

    // Siapkan data siswa untuk disimpan
    $datasiswa = [
        'id_siswa' => 'SISWA' . random_int(100, 999),
        'nama_siswa' => $this->input->post('nama', true),
        'nis' => $this->input->post('nis', true),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'jenis_kelamin' => $this->input->post('jeniskelamin', true),
        'alamat' => $this->input->post('alamat', true),
        'no_telepon' => $nohp, // Gunakan nomor telepon dari input form
        'kode_jurusan' => $this->input->post('jurusan', true),
        'kode_kelas' => $this->input->post('kelas', true),
        'gambar' => 'default'
    ];

    // Masukkan data siswa ke database
    $this->db->insert('tabel_siswa', $datasiswa);
}


    public function selectnohp($nomor, $nis)
    {
        return   $this->db->select('no_telepon')
            ->where('nis', $nis)->get('tabel_siswa')->num_rows();
    }

    public function editsiswa($nomorhp)
    {
        $data = [
            'nama_siswa' => $this->input->post('nama', true),
            'nis' => $this->input->post('nis'),
            // 'nisn' => $this->input->post('nisn'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jenis_kelamin' => $this->input->post('jeniskelamin'),
            'alamat' => $this->input->post('alamat', true),
            'no_telepon' => $nomorhp,
            'kode_kelas' => $this->input->post('kelas')

        ];
        $this->db->where('id_siswa', $this->input->post('id_siswa'))
            ->update('tabel_siswa', $data);
    }
    public function deletesiswa($idsiswa)
    {
        $this->db->delete('tabel_siswa', ['id_siswa' => $idsiswa]);
    }

    // absen siswa
    public function CekSiswa($nis)
    {
        return $this->db->where('nis', $nis)
            ->get('tabel_siswa')->num_rows();
    }
    // absen by siswa,
    public function detailsiswa($nis)
    {
        return $this->db->where('nis', $nis)
            ->get('tabel_siswa')->result_array();
    }

    public function DataSiswaByKelasDanJurusan()
    {
        $query = $this->db->query("SELECT DISTINCT kode_kelas FROM tabel_siswa ORDER BY kode_kelas ASC");
        $result = $query->result_array();
        return $result;
    }

    public function import($data)
    {
        $this->db->insert('tabel_siswa', $data);
    }

    public function editsiswa2($nis, $gambar)
    {
        $data = [
            'nama_siswa' => $this->input->post('nama_siswa', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telepon' => $this->input->post('no_telepon', true),
            'gambar' => $gambar,
        ];
        $data2 = [
            'email' => $this->input->post('email', true)
        ];

        $this->db->where('nis', $nis)->update('tabel_siswa', $data);
        $this->db->where('nis_siswa', $nis)->update('login_siswa', $data2);
    }

    public function allSiswa()
    {
        $query = $this->db->get('tabel_siswa');

        return $query->result_array();
    }
}
