<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
	public function index()
	{
		$this->load->view('login');

	}

    public function login()
	{
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user');
        $this->db->where('username',$username);
        $cek = $this->db->get()->row();
        if($cek == NULL){
            $this->session->set_flashdata('alert', '
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> 
            <i data-feather="alert-octagon" class="w-6 h-6 mr-2">\</i> Username not found!
            </div>
            ');
            redirect('auth');
        } else if($password == $cek->password){
            $data = array(
                'id_user'   => $cek->id_user,
                'nama'      => $cek->nama,
                'username'  => $cek->username,
                'level'     => $cek->level,
            );
            $this->session->set_userdata($data);

            date_default_timezone_set("Asia/Jakarta");
            $user_id = $this->session->userdata('id_user');
            $time = date('Y-m-d H:i:s');
            $timedata = array('recent_login' => $time);
            $this->db->where('id_user', $user_id);
            $this->db->update('user', $timedata);

            redirect('admin/home');
        } else {
            $this->session->set_flashdata('alert', '
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> 
            <i data-feather="alert-octagon" class="w-6 h-6 mr-2">\</i> Your password is wrong!
            </div>
            ');
            redirect('auth');
        }
	}

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}
