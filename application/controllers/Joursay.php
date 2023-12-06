<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Joursay extends CI_Controller {

        public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('joursay/index');
        $config['total_rows'] = $this->db->count_all_results('konten');
        $config['per_page'] = 8; 
        $config['uri_segments'] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->result_array();


        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('user c', 'a.username=c.username', 'left');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit($config['per_page'], $page);
        $konten = $this->db->get()->result_array();


        $data = array(
            'konfig'    => $konfig,
            'kategori'    => $kategori,
            'konten'    => $konten,
            'links'     => $this->pagination->create_links(),
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

        $this->load->view('joursay', $data);
    }

    public function artikel($id)
    {
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->result_array();

        
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->where('slug',$id);
        $konten = $this->db->get()->row();
        
        $data = array(
            'judul'     => $konten->judul.' | JourSite',
            'konfig'    => $konfig,
            'kategori'    => $kategori,
            'konten'    => $konten
        );
        
		$this->load->view('detail', $data);
        
    }

    public function search()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('joursay/index');
        $config['total_rows'] = $this->db->count_all_results('konten');
        $config['per_page'] = 4; 
        $config['uri_segments'] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->result_array();


        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('user c', 'a.username=c.username', 'left');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit($config['per_page'], $page);

        $searchTerm = $this->input->get('search');
        $this->db->like('judul', $searchTerm);
        $this->db->or_like('isi', $searchTerm);

        $searchResults = $this->db->get()->result_array();

        foreach ($searchResults as $key => $row) {
            $searchResults[$key]['isi'] = substr($row['isi'], 0, 160);
            if (strlen($row['isi']) > 160) {
                $searchResults[$key]['isi'] .= '.....';
            }
        }

        $data = array(
            'konfig'    => $konfig,
            'kategori'    => $kategori,
            'joursay'      => $searchResults,
            'links'     => $this->pagination->create_links(),
        );

        $this->load->view('joursay', $data);
    }
    
}