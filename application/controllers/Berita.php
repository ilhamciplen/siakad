<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }
  
    public function index()
    {

        $data['berita'] = $this->db->get('berita')->result();

        $this->load->view('layout/v_head');
        
        $this->load->view('v_berita', $data);
      
    }

    public function detail_berita($id)
    {
        $detail_info = $this->db->get_where('berita', array('id' => $id))->row();
        $data['detail'] = $detail_info;

        $this->load->view('layout/v_head');
        
        $this->load->view('v_detailberita', $data);
       
    }
}
