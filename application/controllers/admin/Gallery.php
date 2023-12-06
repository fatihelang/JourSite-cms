<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        };
    }

    public function index(){
        $this->db->from('gallery');
        $this->db->order_by('id_foto', 'ASC');
        $gallery = $this->db->get()->result_array();
        $data = array(
            'judul_halaman'     => 'Gallery',
            'gallery'          => $gallery,
        );
        $this->template->load('template_admin', 'admin/gallery_index', $data);

    }

    public function tambah()
    {
        $this->db->from('gallery');
        $this->db->order_by('id_foto', 'DESC');
        $gallery = $this->db->get()->result_array();
        $data = array(
            'judul_halaman'     => 'Gallery',
            'gallery'          => $gallery,
        );
        $this->template->load('template_admin', 'admin/gallery_tambah', $data);
    }

    public function simpan()
    {
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path']          = 'assets/upload/gallery/';
        $config['max_size'] = 5 * 1024 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']        = '*';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $namafoto;
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 5 * 1024 * 1024) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 5MB.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
            redirect('admin/gallery');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'foto'           => $namafoto
        );
        $this->db->insert('gallery', $data);
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Succes! 
        </div>
        ');
        redirect('admin/gallery');
    }

    public function delete_foto($id)
    {
        $filename=FCPATH.'/assets/upload/gallery/'.$id;
        if (file_exists($filename)){
            unlink("./assets/upload/gallery/".$id);
        }
        $where = array(
            'foto' => $id
        );
        $this->db->delete('gallery', $where);
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Foto telah dihapus! 
        </div>
        ');
        redirect('admin/gallery');
    }

}