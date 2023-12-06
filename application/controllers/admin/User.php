<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
		if($this->session->userdata('level')!=='Admin'){
		    redirect('auth');
		};
        }
	public function index()
	{
        $this->db->from('user');
        $this->db->order_by('nama', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'User',
            'user'          => $user
        );
		$this->template->load('template_admin', 'admin/user_index', $data);

	}

    public function tambah(){
        $data = array(
            'judul_halaman' => 'Add User'
        );
		$this->template->load('template_admin', 'admin/user_tambah', $data);
    }

    public function simpan(){
        $this->db->from('user');
        $this->db->where('username',$this->input->post('username'));
        $cek = $this->db->get()->result_array();
        if($cek <> NULL){
            $this->session->set_flashdata('alert', '
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> 
            <i data-feather="alert-octagon" class="w-6 h-6 mr-2">\</i> Username already taken!
            </div>

            ');
            redirect('admin/user');
            
        }
        $this->User_model->simpan();
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Succes! 
        </div>
        ');
        redirect('admin/user');
    }

    public function delete_user($id) {
        $this->User_model->delete($id);
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> User has Deleted! 
        </div>
        ');
        redirect('admin/user');

    }

    public function edit($id){
		$this->db->select('*')->from('user');
		$this->db->where('id_user', $id);
		$user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Edit User',
            'user' => $user
            
        );
		$this->template->load('template_admin', 'admin/user_edit', $data);
    }

    public function update(){
        $this->User_model->update();
        $this->session->set_flashdata('alert', '
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> 
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> User has Updated! 
        </div>
        ');
		return redirect('admin/user');

    }
}
