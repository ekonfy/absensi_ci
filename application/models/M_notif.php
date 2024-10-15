<?php

class M_notif extends CI_Model
{
    public function send_email($tujuan, $subjek, $message)
    {
        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'asasa@gmail.com',  // Email gmail
            'smtp_pass'   => 'asa',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('tesabsen@absen.com', 'Web Absensi siswa');

        // Email penerima
        $this->email->to($tujuan); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

        // Subject email
        $this->email->subject($subjek);

        // Isi email
        $this->email->message($message);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function send_whatsapp($nomor, $pesan)
{
    $tab = $this->db->get('tabel_api')->result_array();
    $count = count($tab); // Mendapatkan jumlah catatan langsung dari array

    if ($count > 0) { // Memeriksa apakah ada catatan
        $responses = []; // Array untuk menyimpan respons
        foreach ($tab as $tabel_api) {
            $curl = curl_init();
            $target = $nomor;
            $sender = $tabel_api['sender'];
            $apikey = $tabel_api['api_key'];
            $urls = $tabel_api['url'];

            curl_setopt_array($curl, array(
                CURLOPT_URL => $urls,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => array(
                    'api_key' => $apikey,
                    'sender' => $sender,
                    'number' => $target,
                    'message' => $pesan,
                ),
            ));

            $response = curl_exec($curl);

            if (curl_errno($curl)) {
                // Menangani kesalahan cURL
                $error_msg = curl_error($curl);
                $responses[] = ['error' => $error_msg]; // Menyimpan pesan kesalahan
            } else {
                $responses[] = json_decode($response, true); // Menyimpan respons API
            }

            curl_close($curl);
        }
        
        return $responses; // Mengembalikan semua respons
    } else {
        return ['error' => 'Tidak ada konfigurasi API yang ditemukan.']; // Menangani jika tidak ada catatan
    }
}

}
