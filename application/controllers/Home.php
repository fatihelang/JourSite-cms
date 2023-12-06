<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pencarian_model');
    }
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

        
        $data = array(
            'konfig'    => $konfig,
            'kategori'    => $kategori,
            'konten'    => $konten
        );

        $journews = array();
        $joursay = array();

        foreach ($konten as $row) {
            if ($row['id_kategori'] == 5) {
                $journews[] = $row;
            } elseif ($row['id_kategori'] == 4) {
                $joursay[] = $row;
            }
        }

        $data['journews'] = $journews;
        $data['joursay'] = $joursay;
        
		$this->load->view('beranda', $data);
	}
}
