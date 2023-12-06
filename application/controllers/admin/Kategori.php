<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
		if($this->session->userdata('level') == NULL){
		    redirect('auth');
		};
        }
	public function index()
	{
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'judul_halaman'     => 'kategori',
            'kategori'          => $kategori
        );
		$this->template->load('template_admin', 'admin/kategori_index', $data);

	}

    public function tambah(){
        $data = array(
            'judul_halaman' => 'Tambah Kategori'
        );
		$this->template->load('template_admin', 'admin/kategori_tambah', $data);
    }

    public function simpan(){
        $this->db->from('kategori');
        $this->db->where('nama_kategori',$this->input->post('nama_kategori'));
        $cek = $this->db->get()->result_array();
        if($cek <> NULL){
            $this->session->set_flashdata('alert', '
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> 
            <i data-feather="alert-octagon" class="w-6 h-6 mr-2">\</i> Nama Kategori telah ada!
            </div>

            ');
            redirect('admin/kategori');
            
        }
        $this->Kategori_model->simpan();
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Succes! 
        </div>
        ');
        redirect('admin/kategori');
    }

    public function delete_kategori($id) {
        $this->Kategori_model->delete($id);
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Kategori telah dihapus! 
        </div>
        ');
        redirect('admin/kategori');

    }

    public function edit($id){
		$this->db->select('*')->from('kategori');
		$this->db->where('id_kategori', $id);
		$kategori = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Edit Kategori',
            'kategori' => $kategori
            
        );
		$this->template->load('template_admin', 'admin/kategori_edit', $data);
    }

    public function update(){
        $this->Kategori_model->update();
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Kategori telah diganti! 
        </div>
        ');
		return redirect('admin/kategori');

    }
}
