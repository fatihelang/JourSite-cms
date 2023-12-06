<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_web extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konfigurasi_web_model');
		if($this->session->userdata('level')!='Admin'){
		    redirect('auth');
        };
    }
	public function index()
	{
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'Konfigurasi Website',
            'konfig'   => $konfig
        );
		$this->template->load('template_admin', 'admin/konfigurasi_web', $data);

	}

    public function update(){
        $this->Konfigurasi_web_model->update();
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Konfigurasi telah diperbarui! 
        </div>
        ');
		return redirect('admin/konfigurasi_web');
}
}