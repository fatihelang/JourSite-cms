<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {
    public function index()
	{
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->result_array();

        
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->order_by('tanggal', 'DESC');
        $konten = $this->db->get()->result_array();

        foreach ($konten as $key => $row) {
            $konten[$key]['isi'] = substr($row['isi'], 0,160);
            if(strlen($row['isi']) > 160){
                $konten[$key]['isi'] .= '.....';
            }
        }
        
        $data = array(
            'konfig'    => $konfig,
            'kategori'    => $kategori,
            'konten'    => $konten
        );
        
		$this->load->view('tentang', $data);
	}

}