<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function simpan()
	{
        $data = array(
            'nama_kategori'        => $this->input->post('nama_kategori'),
        );
        $this->db->insert('kategori', $data);
	}

    public function update()
    {
        $data = array(
            'nama_kategori' 		=> $this->input->post('nama_kategori')
        );
		$where = array(
			'id_kategori' => $this->input->post('id_kategori')
		);
        $this->db->update('kategori', $data, $where);
    }

    public function delete($id)
    {
        $where = array(
            'id_kategori' => $id
        );
        $this->db->delete('kategori', $where);
    }
}
