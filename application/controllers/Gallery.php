<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    public function index()
	{
        $this->db->from('gallery');
        $gallery = $this->db->get()->result_array();
        
        $data = array(
            'gallery'    => $gallery
        );

        $this->load->view('gallery', $data);

    }
}