<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi_profil_model extends CI_Model
{
    public function update()
    {
        // Mengambil nama file profil yang baru diunggah
        $profil_file = $_FILES['profil']['name'];

        // Jika ada file yang diunggah

        $file_extension = pathinfo($profil_file, PATHINFO_EXTENSION);
        $namafoto = uniqid() . '_' . time() . '.' . $file_extension;

        // Konfigurasi upload
        $config['upload_path'] = 'assets/upload/profil/';
        $config['max_size'] = 3 * 1024 * 1024; // 3Mb
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $namafoto;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profil')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle error jika diperlukan
        }

        // Update data konfigurasi
        $data = array(
            'caption' => trim($this->input->post('caption') ?? ''),
            'foto_profil' => $namafoto // Simpan nama file di database
        );


        $where = array(
            'id_konfigurasi' => 1
        );

        $this->db->update('konfigurasi', $data, $where);
    }
}
