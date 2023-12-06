<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		if($this->session->userdata('level')==NULL){
		    redirect('auth');
        };
    }

    public function index()
{
    $this->db->from('user');
    $this->db->where('level', 'Penulis');
    $penulis = $this->db->count_all_results();

    $this->db->from('konten');
    $this->db->where('id_kategori', 5);
    $journews = $this->db->count_all_results();

    $this->db->from('konten');
    $this->db->where('id_kategori', 4);
    $joursay = $this->db->count_all_results();

    // Mengambil data username dan recent_login dari seluruh pengguna
    $this->db->select('username, recent_login');
    $this->db->order_by('recent_login', 'DESC');
    $all_users = $this->db->get('user')->result_array();

    $data = array(
        'judul_halaman' => 'Dashboard',
        'penulis'       => $penulis,
        'journews'      => $journews,
        'joursay'       => $joursay,
        'all_users'     => $all_users // Menambahkan data seluruh pengguna ke data
    );

    $this->template->load('template_admin', 'admin/dashboard', $data);
}




}
