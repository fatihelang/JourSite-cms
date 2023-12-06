<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi_web_model extends CI_Model
{
    public function update()
    {
        // Update data konfigurasi
        $data = array(
            'judul_website' => trim($this->input->post('judul_website') ?? ''),
            'profil_website' => trim($this->input->post('profil_website') ?? ''),
            'instagram' => trim($this->input->post('instagram') ?? ''),
            'link_instagram' => trim($this->input->post('link_instagram') ?? '')
        );
        

        $where = array(
            'id_konfigurasi' => 1
        );

        $this->db->update('konfigurasi', $data, $where);
    }
}
