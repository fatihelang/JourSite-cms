<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi_event_model extends CI_Model
{
    public function update()
    {
        // Mengambil nama file event yang baru diunggah
        $event_file = $_FILES['event']['name'];

        // Jika ada file yang diunggah

        $file_extension = pathinfo($event_file, PATHINFO_EXTENSION);
        $namafoto = uniqid() . '_' . time() . '.' . $file_extension;

        // Konfigurasi upload
        $config['upload_path'] = 'assets/upload/event/';
        $config['max_size'] = 3 * 1024 * 1024; // 3Mb
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $namafoto;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('event')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle error jika diperlukan
        }

        // Update data konfigurasi
        $data = array(
            'nama_event' => trim($this->input->post('nama_event') ?? ''),
            'event' => $namafoto // Simpan nama file di database
        );


        date_default_timezone_set("Asia/Jakarta");
        $time = date('Y-m-d');
        $timedata = array('tanggal' => $time);
        $this->db->update('konfigurasi', $timedata);

        $where = array(
            'id_konfigurasi' => 1
        );

        $this->db->update('konfigurasi', $data, $where);
    }
}
