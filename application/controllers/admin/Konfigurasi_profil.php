<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi_profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konfigurasi_profil_model');
        if ($this->session->userdata('level') != 'Admin') {
            redirect('auth');
        };
    }
    public function index()
    {
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'Konfigurasi Profil',
            'konfig'   => $konfig
        );
        $this->template->load('template_admin', 'admin/konfigurasi_profil', $data);
    }

    public function update()
    {
        $this->Konfigurasi_profil_model->update();
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Konfigurasi telah diperbarui! 
        </div>
        ');
        return redirect('admin/konfigurasi_profil');
    }

    public function delete_foto($id)
    {
        // Construct the file path
        $filename = FCPATH.'/assets/upload/profil/'.$id;
    
        // Check if the file exists and delete it
        if (file_exists($filename)) {
            unlink($filename);
        }
    
        // Set 'foto_profil' column to NULL or an empty string
        $data = array(
            'foto_profil' => NULL // or '' depending on your database schema
        );
    
        $where = array(
            'foto_profil' => $id
        );
    
        $this->db->update('konfigurasi', $data, $where);
    
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Foto telah dihapus! 
        </div>
        ');
    
        redirect('admin/konfigurasi_profil');
    }
}
    
