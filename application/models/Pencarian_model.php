<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pencarian_model extends CI_Model {
    
    public function cariHasil($query) {
        // Lakukan pencarian di database berdasarkan query
        $this->db->select('*');
        $this->db->from('tabel_konten'); // Ganti dengan nama tabel yang sesuai di database Anda
        $this->db->like('judul', $query); // Anda bisa menyesuaikan dengan kolom yang ingin dicari
        $this->db->or_like('isi', $query);
        $results = $this->db->get()->result_array();

        return $results;
    }
}
