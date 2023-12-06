<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

	public function simpan()
	{
        $data = array(
            'judul'                 => $this->input->post('judul'),
            'isi'                    => $this->input->post('isi'),
            'id_kategori'          => $this->input->post('id_kategori'),
        );
        $this->db->insert('konten', $data);
	}

    public function update()
    {
        $data = array(
            'judul' 		=> $this->input->post('judul'),
            'isi' 		=> $this->input->post('isi')
        );
		$where = array(
			'id_konten' => $this->input->post('id_konten')
		);
        $this->db->update('kategori', $data, $where);
    }

    public function delete($id)
    {
        $where = array(
            'id_konten' => $id
        );
        $this->db->delete('konten', $where);
    }
}
