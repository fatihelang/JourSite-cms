<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        };
    }

    public function index()
    {
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->order_by('tanggal', 'DESC');
        $konten = $this->db->get()->result_array();
        $data = array(
            'judul_halaman'     => 'Konten',
            'kategori'          => $kategori,
            'konten'            => $konten,
        );
        $this->template->load('template_admin', 'admin/konten_index', $data);
    }

    public function tambah()
    {
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Tambah Konten',
            'kategori'      => $kategori,
        );
        $this->template->load('template_admin', 'admin/konten_tambah', $data);
    }

    public function simpan()
    {
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path']          = 'assets/upload/konten/';
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
            redirect('admin/konten');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        $this->db->from('konten');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
            $this->session->set_flashdata('alert', '
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> 
            <i data-feather="alert-octagon" class="w-6 h-6 mr-2">\</i> Judul Konten telah ada!
            </div>

            ');
            redirect('admin/konten');
        }
        $data = array(
            'judul'          => trim($this->input->post('judul')),
            'id_kategori'    => $this->input->post('id_kategori'),
            'isi'            => strip_tags($this->input->post('isi')),
            'tanggal'        => date('Y-m-d'),
            'username'       => $this->session->userdata('username'),
            'foto'           => $namafoto,
            'slug'           => str_replace(' ','-',$this->input->post('judul'))
        );
        $this->db->insert('konten', $data);
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Succes! 
        </div>
        ');
        redirect('admin/konten');
    }

    public function delete_konten($id)
    {
        $filename=FCPATH.'/assets/upload/konten/'.$id;
        if (file_exists($filename)){
            unlink("./assets/upload/konten/".$id);
        }
        $where = array(
            'foto' => $id
        );
        $this->db->delete('konten', $where);
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Konten telah dihapus! 
        </div>
        ');
        redirect('admin/konten');
    }

    public function edit($id)
    {
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();
        $this->db->select('*')->from('konten');
        $this->db->where('id_konten', $id);
        $konten = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Edit konten',
            'konten' => $konten,
            'kategori' => $kategori,
            

        );
        $this->template->load('template_admin', 'admin/konten_edit', $data);
    }

    public function update()
    {
        $namafoto = str_replace(' ', '', $this->input->post('nama_foto'));
        $config['upload_path']          = 'assets/upload/konten/';
        $config['max_size']             = 5 * 1024 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
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
            redirect('admin/konten');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'judul'          => trim($this->input->post('judul')),
            'id_kategori'    => $this->input->post('id_kategori'),
            'isi'            => strip_tags($this->input->post('isi')),
            'slug'           => str_replace(' ','-',$this->input->post('judul')),
        );
        $where = array(
            'foto'  => str_replace(' ', '', $this->input->post('nama_foto')),
        );
        $this->db->update('konten', $data, $where);
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Succes! 
        </div>
        ');
        redirect('admin/konten');
    }
}
